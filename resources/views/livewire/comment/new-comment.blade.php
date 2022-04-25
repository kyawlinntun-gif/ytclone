<div>
    <div class="d-flex align-items-center">
        <img src="{{ asset($video->channel->img) }}" class="rounded-circle" height="40px">

        <input type="text" wire:model="body" class="comment-form-control" placeholder="Add a public comment...">
    </div>

    @if ($body)

        <div class="d-flex justify-content-end align-items-center mt-3">
            <a href="" wire:click.prevent="resetComment">Cancel</a>
            <a href="" wire:click.prevent="addComment" class="btn btn-secondary mx-2">Comment</a>
        </div>
        
    @endif
</div>
