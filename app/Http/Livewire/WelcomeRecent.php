<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class WelcomeRecent extends Component
{
    public $take = 3;

    public function more()
    {
        $this->take += 3;
    }

    public function render()
    {
        $posts = Post::query()
            ->with('author', 'category')
            ->withCount('likes', 'comments')
            ->trending()
            ->take($this->take)->get();

        return view('livewire.welcome-recent', [
            'posts' => $posts
        ]);
    }
}
