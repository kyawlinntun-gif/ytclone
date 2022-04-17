<div>
    <h4>{{ $video->countComments() }} comments</h4>

    @include('includes.recursive', ['comments' => $video->comments])
    
</div>
