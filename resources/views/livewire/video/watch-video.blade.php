<div>
    @push('customs-css')
    <link href="https://vjs.zencdn.net/7.18.1/video-js.css" rel="stylesheet" />
    @endpush
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mx-0 px-0">
                <div class="video-container" wire:ignore>
                    <video controls preload="auto" id="yt-video" class="video-js vjs-fill vjs-styles=defaults vjs-big-play-centered" data-setup='{}' poster="{{ asset('videos/' . $video->uid . '/' . $video->thumbnail_img) }}" >
                        <source src="{{ asset('videos/' . $video->uid . '/' . $video->processed_file) }}"
                            type="application/x-mpegURL">
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">
                                supports HTML5 video
                            </a>
                        </p>
                    </video>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mt-4">{{ $video->title }}</h2>
                        <p class="text-gray">{{ $video->view }} views {{ $video->uploaded_date }}</p>
                    </div>
                    <div>
                        <livewire:video.voting :video="$video">
                    </div>
                </div>
            </div>
        </div>


        <livewire:channel.channel-info :channel="$video->channel" />
        <livewire:comment.all-comments :video="$video">

    </div>
    @push('scripts')
    <script src="https://vjs.zencdn.net/7.18.1/video.min.js"></script>

    <script>
        var player = videojs('yt-video');
        // player.ready(function() {
        //     console.log('Ready');
        // });

        player.on('timeupdate', function() {
            // console.log(this.currentTime());
            if(this.currentTime() > 3) {
                this.off('timeupdate');
                Livewire.emit('videoViewed');
            }
        });
    </script>
    @endpush
</div>
