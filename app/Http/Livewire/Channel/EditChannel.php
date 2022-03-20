<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;
use Image;

class EditChannel extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $channel;
    public $image;

    protected function rules()
    {
        return [
            'channel.name' => 'required|max:255|unique:channels,name,' . $this->channel->id,
            'channel.slug' => 'required|max:255|unique:channels,name,' . $this->channel->id,
            'channel.description' => 'nullable|max:1000',
            'image' => 'nullable|image|max:1024'
        ];
    }

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.channel.edit-channel');
    }

    public function update()
    {
        $this->authorize('update', $this->channel);

        $this->validate();

        $this->channel->update([
            'name' => $this->channel->name,
            'slug' => $this->channel->slug,
            'description' => $this->channel->description
        ]);

        // Check the file is submitted
        if ($this->image) {
            // Store the image into Storage
            $image = $this->image->storeAs('images', $this->channel->uid . '.png');
            $imageName = explode('/', $image)[1];

            // Resize and convert to png
            Image::make(storage_path() . '/app/' . $image)
                    ->encode('png')
                    ->fit(80, 80, function ($constraint) {
                        $constraint->upsize();
                    })
                    ->save();

            // Store the image into Database
            $this->channel->update([
                'image' => $imageName
            ]);
        }

        Session::flash('message', 'Channel updated');

        return redirect()->route('channel.edit', ['channel' => $this->channel]);
    }
}
