<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;


    protected $connection = 'mysql';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'phone', 
        'email',
        'text_message'
    ];
    // public static function createMessage(array $data): void
    // {
    //         $message = new Message();
    //         $message->name = $data['name'];
    //         $message->phone = $data['phone'];
    //         $message->email = $data['email'];
    //         $message->text_message = $data['text_message'];
    //         $message->save();

    // }
}
