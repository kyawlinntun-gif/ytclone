<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset($this->video->thumbnail) }}" alt="" class="img-thumbnail">
                        </div>
                        <div class="col-4">
                            Processing: ({{ $this->video->processing_percentage }})
                        </div>
                    </div>

                    <form wire:submit.prevent="update">

                        <div class="mb-3">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="title" wire:model="video.title">
                            @error('video.title')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea id="description" rows="5" class="form-control"
                                wire:model="video.description"></textarea>
                            @error('video.description')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label for="visibility">Visibility</label>
                            <select id="visibility" wire:model="video.visibility" class="form-control">
                                <option value="private">Private</option>
                                <option value="public">Public</option>
                                <option value="unlisted">Unlisted</option>
                            </select>
                            @error('video.visibility')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
    
                        @if (Session::has('message'))
                        <div class="alert alert-success mt-3">{{ Session::get('message') }}</div>
                        @endif
    
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
