<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateBioForm extends Component
{
    public $user;
    public $twitter;
    public $bio;

    public function mount()
    {
        $this->user = auth()->user();
        $this->twitter = $this->user->profile->twitter;
        $this->bio = $this->user->profile->bio;
    }

    public function update()
    {
        $this->validate([
            'twitter' => 'required|string|min:2|max:64',
            'bio' => 'required|string|min:2|max:255',
        ]);

        $this->user->profile()->update([
            'twitter' => $this->twitter,
            'bio' => $this->bio,
        ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.update-bio-form');
    }
}
