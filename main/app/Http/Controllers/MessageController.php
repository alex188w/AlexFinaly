<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\Welcome;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Foundation\Application;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class MessageController extends Controller
{
    public function welcome(Request $request): View|Factory|Application
    {
        $text = '';
        $ipAddress = $request->ip();
        $visitorCountLast = DB::table('visitor_counts')->latest('id')->first();
        $countId = $visitorCountLast->id - 1;
        $visitorCount = DB::table('visitor_counts')->find($countId);

        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=%D0%95%D0%BA%D0%B0%D1%82%D0%B5%D1%80%D0%B8%D0%BD%D0%B1%D1%83%D1%80%D0%B3,RU&units=metric&appid=6c159b3707002416418d81c6dc4553b5&lang=ru";
        $crequest = curl_init();

        curl_setopt($crequest, CURLOPT_HEADER, 0);
        curl_setopt($crequest, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crequest, CURLOPT_URL, $apiUrl);
        curl_setopt($crequest, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($crequest, CURLOPT_VERBOSE, 0);
        curl_setopt($crequest, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($crequest);

        curl_close($crequest);
        $data = json_decode($response);
        $currentTime = time();

        return view('welcome', compact('text'), ['visitorCount' => $visitorCount, 'data' => $data]);
    }

    public function indexAction($action): View|Factory|Application
    {
        if ($action == 'mail') {
            return view('message');
        } elseif ($action == 'chat') {
            return view('chat');
        }

        return response()->json(['message' => 'Invalid action'], 400);
    }

    public function visitors(): View|Factory|Application
    {
        $visitorCount = DB::table('visitor_counts')->orderByDesc('id')->limit(50)->get();
        // $text = '';
        return view('visitors', ['visitors' => $visitorCount]);
    }

    public function chatQuestions(): View|Factory|Application
    {
        $chatQuestions = DB::table('chat_question')->get();

        return view('questions', ['questions' => $chatQuestions]);
    }

    public function weather(Request $crequest): View|Factory|Application
    {
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=%D0%95%D0%BA%D0%B0%D1%82%D0%B5%D1%80%D0%B8%D0%BD%D0%B1%D1%83%D1%80%D0%B3,RU&units=metric&appid=6c159b3707002416418d81c6dc4553b5&lang=ru";
        $crequest = curl_init();

        curl_setopt($crequest, CURLOPT_HEADER, 0);
        curl_setopt($crequest, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crequest, CURLOPT_URL, $apiUrl);
        curl_setopt($crequest, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($crequest, CURLOPT_VERBOSE, 0);
        curl_setopt($crequest, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($crequest);

        curl_close($crequest);
        $data = json_decode($response);
        $currentTime = time();
        return view('weather', ['data' => $data, 'currentTime' => $currentTime]);
    }

    /**
     * @throws Exception
     */
    public function store(Request $request)
    {
        $message = new Message();
        $message->name = $request->name;
        $message->phone = $request->phone;
        $message->email = $request->email;
        $message->text_message = $request->text_message;
        $message->save();

        $mail_adr = env('MAIL_ADDRESS');
        $mail = new Welcome($message);
        Mail::to($mail_adr)->send($mail);

        $chatId = env('TELEGRAM_CHANNEL_ID', '');
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'parse_mode' => 'html',
            'text' => 'Пришло новое сообщение от пользователя: ' . $message->name . ' телефон: ' . $message->phone
        ]);

        $visitorCountLast = DB::table('visitor_counts')->latest('id')->first();
        $countId = $visitorCountLast->id - 1;
        $visitorCount = DB::table('visitor_counts')->find($countId);
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=%D0%95%D0%BA%D0%B0%D1%82%D0%B5%D1%80%D0%B8%D0%BD%D0%B1%D1%83%D1%80%D0%B3,RU&units=metric&appid=6c159b3707002416418d81c6dc4553b5&lang=ru";
        $crequest = curl_init();

        curl_setopt($crequest, CURLOPT_HEADER, 0);
        curl_setopt($crequest, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crequest, CURLOPT_URL, $apiUrl);
        curl_setopt($crequest, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($crequest, CURLOPT_VERBOSE, 0);
        curl_setopt($crequest, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($crequest);

        curl_close($crequest);
        $data = json_decode($response);

        return redirect()->route('welcome')
            ->with([
                'text' => 'Сообщение отправлено!',
                'visitorCount' => $visitorCount,
                'data' => $data
            ]);
    }

    /**
     * @throws Exception
     */
    public function chatStore(Request $request)
    {
        // Валидируем запрос
        $validated = $request->validate([
            'question' => 'required|string|max:500',
        ]);

        $token = env('SECRET_TOKEN');

        if ($request->token === $token) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            ])
                ->post('https://api.proxyapi.ru/openai/v1/chat/completions', [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'user', 'content' => $validated['question']],
                    ]
                ]);

            if ($response->successful()) {
                $answer = $response->json()['choices'][0]['message']['content'];
            } else {
                $answer = 'Ошибка при запросе к OpenAI. Попробуйте позже.';
            }
        } else {
            $answer = 'Ошибка при запросе к OpenAI. Попробуйте позже.';
        }

        $ipAddress = $request->header('X-Forwarded-For') ?? $request->ip();
        DB::table('chat_question')->insert([
            'created_at' => Carbon::now('Asia/Yekaterinburg'),
            'ip' => $ipAddress,
            'question' => $validated['question'],
            'answer' => $answer,
        ]);
        return redirect()->back()->with('answer', $answer);
    }
}
