<div class="container" wire:poll>
    <div class="row">
        
        @if ($videos->count())
            <div class="col-md-12">
                @foreach ($videos as $video)
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="{{ route('video.watch', $video) }}">
                                        <img src="{{ asset($video->thumbnail) }}" alt="{{ $video->title }}" class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <h5>{{ $video->title }}</h5>
                                    <p>{{ $video->description }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p>{{ $video->visibility }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p>{{ $video->updated_at->format('d/m/Y') }}</p>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('video.edit', [$channel, $video]) }}" class="btn btn-light" >Edit</a>
                                    <button class="btn btn-danger" wire:click.prevent="deleted('{{ $video->uid }}')" >Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $videos->links() }}
            </div>
        @else

            <h1>No videos Uploaded</h1>
            
        @endif

    </div>
</div>
