<?php

namespace App\Http\Livewire\Comment;

use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewComment extends Component
{
    public $video;
    public $body;
    public $col;

    public function mount(Video $video, $col)
    {
        $this->video = $video;
        $col == 0 ? $this->col = null : $this->col = $col;
    }

    public function render()
    {
        return view('livewire.comment.new-comment')
                    ->extends('layout.app');
    }

    public function addComment()
    {
        // Validation

        Auth::user()->comments()->create([
            'video_id' => $this->video->id,
            'reply_id' => $this->col,
            'body' => $this->body
        ]);

        $this->body = '';

        // emit events to refresh
    }
}
