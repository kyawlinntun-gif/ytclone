<?php

namespace App\Http\Livewire\Video;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\Video;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Voting extends Component
{

    public $video;
    public $likes;
    public $dislikes;
    public $likesActive;
    public $dislikesActive;

    protected $listeners = ['load_values' => '$refresh'];

    public function mount(Video $video)
    {
        $this->video = $video;
        $this->checkLikesActive();
        $this->checkDislikesActive();
    }

    public function checkLikesActive()
    {
        $this->video->doesUserLiked() ? $this->likesActive = true : $this->likesActive = false;
    }

    public function checkDislikesActive()
    {
        $this->video->doesUserDisliked() ? $this->dislikesActive = true : $this->dislikesActive = false;
    }

    public function render()
    {
        $this->likes = $this->video->likes()->count();
        $this->dislikes = $this->video->dislikes()->count();
        return view('livewire.video.voting')
                ->extends('layouts.app');
    }

    public function like()
    {
        //Check Login user
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        //Check if user already like the video
        if ($this->video->doesUserLiked()) {
            Like::where('user_id', Auth::user()->id)->where('video_id', $this->video->id)->delete();
            $this->likesActive = false;
        } else {
            $this->video->likes()->create([
                'user_id' => Auth::user()->id
            ]);
            $this->likesActive = true;
            $this->disableDislike();
        }
        $this->emit('load_values');
    }

    public function dislike()
    {
        //Check Login user
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        //Check if user already dislike the video
        if ($this->video->doesUserDisliked()) {
            Dislike::where('user_id', Auth::user()->id)->where('video_id', $this->video->id)->delete();
            $this->dislikesActive = false;
        } else {
            $this->video->dislikes()->create([
                'user_id' => Auth::user()->id
            ]);
            $this->dislikesActive = true;
            $this->disableLike();
        }
        $this->emit('load_values');
    }

    public function disableDislike()
    {
        Dislike::where('user_id', Auth::user()->id)->where('video_id', $this->video->id)->delete();
            $this->dislikesActive = false;
    }

    public function disableLike()
    {
        Like::where('user_id', Auth::user()->id)->where('video_id', $this->video->id)->delete();
            $this->likesActive = false;
    }
}
