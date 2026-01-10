<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Conversation extends Model
{
    protected $guarded = [];

    public function scopechekConversation($query, $auth_email, $receiver_email)
    {

        return $query->where('sender_email', $auth_email)
            ->where('receiver_email', $receiver_email)->orwhere('receiver_email', $auth_email)->where('sender_email', $receiver_email);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    public function unreadMessagesCount()
    {
        return Message::where('conversation_id', $this->id)
            ->where('receiver_email', Auth::user()->email)
            ->where('read', 0)
            ->count();
    }


    public function markAsRead()
    {
        Message::where('conversation_id', $this->id)
            ->where('receiver_email', Auth::user()->email)
            ->where('read', 0)
            ->update(['read' => 1]);
    }


}
