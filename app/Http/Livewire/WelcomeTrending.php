<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class WelcomeTrending extends Component
{
    public function render()
    {
        $posts = Post::query()
            ->with('author', 'category')
            ->trending()
            ->take(6)->get();

        return view('livewire.welcome-trending', [
            'posts' => $posts
        ]);
    }
}
