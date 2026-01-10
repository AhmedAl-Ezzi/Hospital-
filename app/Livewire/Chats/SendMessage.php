<?php

namespace App\Livewire\Chats;

use App\Events\MassageSend;
use App\Events\MassageSent;
use App\Events\MassageSent2;
use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Livewire\Component;

class SendMessage extends Component
{

    public $body;
    public $selected_conversation;
    public $receviverUser;
    public $auth_email;
    public $sender;
    public $createdMessage;
    protected $listeners = ['updateMessage', 'dispatchSentMassage', 'updateMessage2'];

    public function mount()
    {

        if (Auth::guard('patient')->check()) {
            $this->auth_email = Auth::guard('patient')->user()->email;
            $this->sender = Auth::guard('patient')->user();
        } else {
            $this->auth_email = Auth::guard('doctor')->user()->email;
            $this->sender = Auth::guard('doctor')->user();
        }
    }

    public function updateMessage(Conversation $conversation, Doctor $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->receviverUser = $receiver;
    }

    public function updateMessage2(Conversation $conversation, Patient $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->receviverUser = $receiver;
    }

    public function sendMessage()
    {
        if ($this->body == null) {
            return null;
        }

        $this->createdMessage = Message::create([
            'conversation_id' => $this->selected_conversation->id,
            'sender_email' => $this->auth_email,
            'receiver_email' => $this->receviverUser->email,
            'body' => $this->body,
        ]);
        $this->selected_conversation->last_time_message = $this->createdMessage->created_at;
        $this->selected_conversation->save();
        $this->reset('body');


            // $this->dispatch('pushMessage', $createMessage->id)->to('chats.chat-box');
            $this->dispatch('pushMessage', $this->createdMessage->id)->to('chats.chat-box');

        $this->dispatch('refresh')->to('chats.chat-list');
        // $this->emitSelf('dispatchSendMassage');
        $this->dispatch('dispatchSendMassage')->self();


            $this->dispatch('loadMessages')->to('chats.chat-box');


    }
    public function dispatchSentMassage()
    {
        if (Auth::guard('patient')->check()) {
            broadcast(new MassageSent(
                $this->sender,
                $this->createdMessage,
                $this->selected_conversation,
                $this->receviverUser
            ));
        } else {
            broadcast(new MassageSent2(
                $this->sender,
                $this->createdMessage,
                $this->selected_conversation,
                $this->receviverUser
            ));
        }
    }


    public function render()
    {
        return view('livewire.chats.send-message');
    }
}
