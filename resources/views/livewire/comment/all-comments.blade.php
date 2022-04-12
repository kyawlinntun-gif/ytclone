<div>
    <h4>{{ $video->countComments() }} comments</h4>

    @foreach ($video->comments as $comment)
        <div class="media d-flex align-items-center my-3">
            <img class="mr-3 rounded-circle" src="{{ asset($comment->user->channel->img) }}" alt="Generic placeholder image" width="80px" height="80px">
            <div class="media-body ms-3">
                <h5 class="mt-0">
                    {{ $comment->user->name }}
                    <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                </h5>
                {{ $comment->body }}
            </div>
        </div>
    @endforeach)
</div>
