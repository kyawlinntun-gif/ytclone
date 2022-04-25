<?php

use App\Models\Channel;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Video\AllVideo;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Video\EditVideo;
use App\Http\Livewire\Video\WatchVideo;
use App\Http\Livewire\Video\CreateVideo;
use App\Http\Livewire\Channel\ChannelMain;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //if logged in -- channels that I subscribed to
    if (Auth::check()) {
        $channels = Auth::user()->isSubscripted()->with('videos')->get()->pluck('videos');
    } else {
        // else all videos
        $channels = Channel::get()->pluck('videos');
    }

    return view('welcome', [
        'channels' => $channels
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/channel/{channel}', ChannelMain::class)->name('channel');
    Route::get('/channel/{channel}/edit', [ChannelController::class, 'edit'])->name('channel.edit');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/video/{channel}', AllVideo::class)->name('video.all');
    Route::get('/video/{channel}/create', CreateVideo::class)->name('video.create');
    Route::get('/video/{channel}/{video}/edit', EditVideo::class)->name('video.edit');
});

/* ---------- Start of Video Play ---------- */
Route::get('/watch/{video}', WatchVideo::class)->name('video.watch');
/* ---------- End of Video Play ---------- */

/* ---------- Start of Search ---------- */
Route::get('/search', [SearchController::class, 'search'])->name('search');
/* ---------- End of Search ---------- */
