<div>
    @foreach ($comments as $comment)
        <div class="media d-flex my-3" x-data="{open : false}">
            <img class="mr-3 rounded-circle" src="{{ asset($comment->user->channel->img) }}" alt="Generic placeholder image" width="80px" height="80px">
            <div class="media-body ms-3">
                <h5 class="mt-0">
                    {{ $comment->user->name }}
                    <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                </h5>
                {{ $comment->body }}

                @if($comment->replies->count())

                    <a href="" @click.prevent="open = !open">{{ $comment->replies->count() }} replies</a>

                    <div x-show="open">
                        @include('includes.recursive', ['comments' => $comment->replies])
                    </div>

                @endif
            </div>
        </div>
    @endforeach
</div>
