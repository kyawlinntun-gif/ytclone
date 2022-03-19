<div>
    <form wire:submit.prevent="update">

        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" wire:model="channel.name">
            @error('channel.name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" wire:model="channel.slug">
            @error('channel.slug')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea id="description" rows="5" class="form-control" wire:model="channel.description"></textarea>
            @error('channel.description')
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
