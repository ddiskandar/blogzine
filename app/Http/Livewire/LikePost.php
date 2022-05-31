<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikePost extends Component
{
    public $post;

    protected $listeners = ['saved' => '$refresh'];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function like()
    {
        if ( auth()->guest() )
        {
            return to_route('login');
        }

        $this->post->like(auth()->user());

        $this->emit('saved');
    }

    public function render()
    {
        $this->post->loadCount('likes');

        return view('livewire.like-post');
    }
}
