<?php

namespace App\Livewire\Chats;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Request;

class ChatList extends Component
{


    public $conversations;
    public $auth_email;
    public $receviverUser, $messages;
    public $selected_conversation;
    protected $listeners = ['chatUserSelected', 'refresh' => '$refresh'];

    public function mount()
    {
        $this->auth_email = auth()->user()->email;
    }


    public function getUser(Conversation $conversation, $request)
    {
        if ($conversation->sender_email == $this->auth_email) {
            $this->receviverUser = Doctor::firstwhere('email', $conversation->receiver_email);
        } else {
            $this->receviverUser = Patient::firstwhere('email', $conversation->sender_email);
        }
        if (isset($request)) {
            return $this->receviverUser->$request;
        }
    }

    public function chatUserSelected(Conversation $conversation, $receiver_id)
    {
        $this->selected_conversation = $conversation;
        $this->receviverUser = Doctor::find($receiver_id);

        // تحديث الرسائل كمقروءة عند فتح المحادثة
        if ($this->selected_conversation) {
            $this->selected_conversation->markAsRead();
        }


        $this->dispatch(
            'load_conversationDoctor',
            conversation: $this->selected_conversation,
            receiver: $this->receviverUser
        )->to('chats.chat-box');



        if (Auth::guard('patient')->check()) {

            $this->dispatch(
                'load_conversationDoctor',
                conversation: $this->selected_conversation,
                receiver: $this->receviverUser
            )->to('chats.chat-box');
        } else {

            $this->dispatch(
                'load_conversationPatient',
                conversation: $this->selected_conversation,
                receiver: $this->receviverUser
            )->to('chats.chat-box');
        }
        $this->dispatch(
            'updateMessage',
            conversation: $this->selected_conversation,
            receiver: $this->receviverUser
        )->to('chats.send-message');

        // تحديث القائمة لإخفاء العداد
        $this->dispatch('updateUnreadCount');
    }


    // ✅ هذه أهم دالة (Ajax)
    public function loadMessages()
    {
        if (!$this->selected_conversation) return;

        $this->messages = Message::where(
            'conversation_id',
            $this->selected_conversation->id
        )->orderBy('id')->get();
    }


    // دالة لتحديث عدد الرسائل غير المقروءة
    public function updateUnreadCount()
    {
        $this->render(); // إعادة تحميل القائمة
    }


    public function render()
    {
        $this->conversations = Conversation::where('sender_email', $this->auth_email)
            ->orwhere('receiver_email', $this->auth_email)->orderBy('id', 'desc')->get();
        return view('livewire.chats.chat-list');
    }
}
