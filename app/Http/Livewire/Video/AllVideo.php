<?php

namespace App\Http\Livewire\Video;

use Livewire\Component;
use Livewire\WithPagination;

class AllVideo extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.video.all-video', [
            'videos' => Auth()->user()->channel->videos()->paginate(1)
        ])->extends('layouts.app');
    }
}
