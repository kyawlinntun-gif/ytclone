@extends('layouts.app')

@section('content')
<div class="container">
    @include('includes.search')
    <div class="row my-3">
        @if (!$channels->count())
            <p>You are not subscribed to any channel!</p>
        @endif
        @foreach ($channels as $channelVideos)
            @foreach ($channelVideos as $video)
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('video.watch', $video) }}" class="card-link">
                        <div class="card mb-4" style="width: 333px; broder: none;">
                            @include('includes.videothumbnail')
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($video->channel->img) }}" height="40px" class="rounded-circle">
                                    <h1 class="ms-3">{{ $video->title }}</h1>
                                </div>
                                <p class="text-gray mt-4 font-weigh" style="line-height: 0.2px">{{ $video->channel->name }}</p>
                                <p class="text-gray mt-4 font-weight-bold" style="line-height: 0.2px">{{ $video->views }} views • {{ $video->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach    
        @endforeach
    </div>
</div>
@endsection
