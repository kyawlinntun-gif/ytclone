<div>

    <div class="bg-primary d-flex align-items-center" style="height: 300px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $channel->name }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">

                    <div class="d-flex align-items-center">
                        <img src="{{ asset($channel->img) }}" alt="" height="150px" width="150px" class="rounded-circle">
                        <div class="ms-3">
                            <h2>{{ $channel->name }}</h2>
                            <p class="text-gray">0 Subscribers</p>
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('channel.edit', ['channel' => $channel]) }}" class="btn btn-primary">Edit Channel</a>
                    </div>

                </div>
            </div>
        </div>

        <div class="row my-4">
            @foreach ($channel->videos as $video)
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('video.watch', $video) }}" class="card-link">
                        <div class="card mb-4" style="width: 333px; broder: none;">
                            <img class="card-img-top" src="{{ asset($video->thumbnail) }}" alt="Card image cap" style="height: 174px; width: 333px;">
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
        </div>
    </div>

</div>
