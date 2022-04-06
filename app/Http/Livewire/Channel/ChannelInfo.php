<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChannelInfo extends Component
{
    public $channel;
    public $userSubscribed = false;

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
        if (Auth::user()->isSubscribedTo($this->channel)) {
            $this->userSubscribed = true;
        } else {
            $this->userSubscribed = false;
        }
    }
    
    public function render()
    {
        return view('livewire.channel.channel-info')
                ->extends('layouts.app');
    }
}
