<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditChannel extends Component
{
    use AuthorizesRequests;

    public $channel;

    protected function rules()
    {
        return [
            'channel.name' => 'required|max:255|unique:channels,name,' . $this->channel->id,
            'channel.slug' => 'required|max:255|unique:channels,name,' . $this->channel->id,
            'channel.description' => 'nullable|max:1000'
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

        Session::flash('message', 'Channel updated');

        return redirect()->route('channel.edit', ['channel' => $this->channel]);
    }
}
