<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use App\Models\Channel;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class EditVideo extends Component
{
    public Channel $channel;
    public Video $video;

    protected $rules = [
        'video.title' => 'required|max:255',
        'video.description' => 'required|max:1000',
        'video.visibility' => 'required|in:private,public,unlisted'
    ];
    
    public function mount(Channel $channel, Video $video)
    {
        $this->channel = $channel;
        $this->video = $video;
    }

    public function render()
    {
        return view('livewire.video.edit-video')
                ->extends('layouts.app');
    }

    public function update()
    {
        $this->video->update([
            'title' => $this->video->title,
            'description' => $this->video->description,
            'visibility' => $this->video->visibility
        ]);

        Session::flash('message', 'Video was updated');

        return redirect()->route('video.edit', ['channel' => $this->channel, 'video' => $this->video]);
    }
}
