<?php

namespace App\Livewire\Chats;

use Livewire\Component;

class Main extends Component
{
    public function render()
    {
        return view('livewire.chats.main')->extends('dashboard.layouts.master');
    }
}
