<div class="my-5">
    
    <div class="row">
        <div class="col-md-8 d-flex justify-content-between align-items-center">

            <div class="d-flex justify-content-center align-items-center">
                <img src="{{ asset($channel->img) }}" alt="" class="rounded-circle">
                <div class="ms-3">
                    <h2>{{ $channel->name }}</h2>
                    <p class="text-gray">{{ $channel->subscribers() }} Subscribers</p>
                </div>
            </div>

            <div>
                <button class="btn btn-lg text-uppercase {{ $userSubscribed ? 'sub-btn-active' : 'sub-btn' }}">
                    {{ $userSubscribed ? 'Subscriber' : 'Subscribe' }}
                </button>
            </div>

        </div>
    </div>

</div>
