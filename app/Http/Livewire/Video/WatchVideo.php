<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class WatchVideo extends Component
{

    public $video;

    protected $listeners = ['videoViewed' => 'countView'];

    public function mount(Video $video)
    {
        return $this->video = $video;
    }

    public function render()
    {
        return view('livewire.video.watch-video')
                ->extends('layouts.app');
    }

    public function countView()
    {
        $this->video->update([
            'view' => $this->video->view + 1
        ]);
    }
}
