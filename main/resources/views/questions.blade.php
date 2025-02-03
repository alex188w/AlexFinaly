<!doctype html>
<html lang="en">

<head>
    <!-- /Yandex.Metrika counter -->
    <meta charset="utf-8" />
    <title>Alex18w</title>
    <link rel="shortcut icon" href="./img/LogoA.JPG">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css2/style3.css" rel="stylesheet" type="text/css" id="theme-opt" />
</head>

<body>
    @foreach ($questions as $question)
    <div class="questions-table">
        <div class="guestion-time">
            <p>{{ $question->id }}</p>
            <p>Время: {{ $question->created_at }}</p>
            <p>Адрес: {{ $question->ip }}</p>
        </div>
        <p class="guestion-question">Вопрос: {{ $question->question }}</p>
        <p class="guestion-answer">Ответ: {{ $question->answer }}</p>
    </div>
    @endforeach
</body>