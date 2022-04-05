<div>
    <div class="d-flex justify-content-between align-items-center">

        <div class="text-gray d-flex justify-content-center align-items-center">
            <i class="material-icons me-1 @if($this->likesActive) text-primary @endif" style="font-size: 2rem; cursor: pointer;" wire:click.prevent="like">thumb_up</i>
            <span>{{ $this->likes }}</span>
        </div>

        <div class="text-gray d-flex justify-content-center align-items-center ms-4">
            <i class="material-icons me-1 @if($this->dislikesActive) text-primary @endif" style="font-size: 2rem; cursor: pointer;" wire:click.prevent="dislike">thumb_down</i>
            <span>{{ $this->dislikes }}</span>
        </div>

    </div>
</div>
