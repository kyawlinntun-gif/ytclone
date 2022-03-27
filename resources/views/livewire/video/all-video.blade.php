<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach ($videos as $video)
                <div class="card my-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ asset($video->thumbnail) }}" alt="{{ $video->title }}" class="img-fluid">
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
                                <button class="btn btn-light">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $videos->links() }}
        </div>

    </div>
</div>