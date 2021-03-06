<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use App\Models\Channel;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AllVideo extends Component
{

    use WithPagination;
    use AuthorizesRequests;

    protected $paginationTheme = 'bootstrap';

    public $channel;

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.video.all-video', [
            'videos' => $this->channel->videos()->paginate(3)
        ])->extends('layouts.app');
    }

    public function deleted(Video $video)
    {

        // Auther can only delete
        $this->authorize('delete', $video);

        // Deleted Video Folder
        $deleted = Storage::disk('videos')->deleteDirectory($video->uid);

        if ($deleted) {
            $video->delete();
        }

        return back();
    }
}
