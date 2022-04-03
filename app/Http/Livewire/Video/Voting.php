<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Voting extends Component
{

    public $video;
    public $likes;
    public $dislikes;

    public function mount(Video $video)
    {
        $this->video = $video;
    }

    public function render()
    {
        return view('livewire.video.voting')
                ->extends('layouts.app');
    }

    public function like()
    {
        //Check if user already like the video
        $this->video->likes()->create([
            'user_id' => Auth::user()->id
        ]);
    }

    public function dislike()
    {
        //Check if user already dislike the video
        $this->video->dislikes()->create([
            'user_id' => Auth::user()->id
        ]);
    }
}
