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
    </div>

</div>
