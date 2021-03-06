<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Livewire\Component;

class ChannelMain extends Component
{

    public $channel;

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.channel.channel-main')
                ->extends('layouts.app');
    }
}
