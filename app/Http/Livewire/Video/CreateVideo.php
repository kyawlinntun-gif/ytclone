<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use App\Models\Channel;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVideo extends Component
{
    
    use WithFileUploads;

    public Channel $channel;
    public Video $video;
    public $videoFile;

    protected $rules = [
        'videoFile' => 'required|mimes:mp4|max:1228800'
    ];

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.video.create-video')
                ->extends('layouts.app');
    }

    public function fileCompleted()
    {
        // Validation rules
        $this->validate();

        // Store the video file
        $path = $this->videoFile->store('videos-tmp');

        // Create video record in db

        $this->video = $this->channel->videos()->create([
            'title' => 'untitled',
            'description' => 'none',
            'uid' => uniqid(true),
            'visibility' => 'private',
            'path' => explode('/', $path)[1]
        ]);

        // Redirect to edit route
        return redirect()->route('video.edit', ['channel' => $this->channel, 'video' => $this->video]);
    }
}
