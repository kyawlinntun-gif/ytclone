@extends('layouts.app')

@section('content')
<div class="container">
    @include('includes.search')

    <div class="row my-4">
        @foreach ($videos as $video)
            <div class="col-12">
                <a href="{{ route('video.watch', $video) }}" class="card-link">
                    <div class="card mb-4" style="border: none;">
                        <div class="card-horizontal">
                            @include('includes.videothumbnail')
                            <div class="card-body">
                                <h4 class="ml-3">{{ $video->title }}</h4>
                                <p class="text-gray font-weight-bold">{{ $video->views }} views {{ $video->created_at->diffForHumans() }}</p>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('/images/' . $video->channel->image) }}" alt="" class="rounded-circle">
                                    <p class="text-gray font-weight-">
                                        {{ $video->channel->name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
