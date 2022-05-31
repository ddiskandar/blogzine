<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class MoreFromTheCategory extends Component
{
    public $take = 3;
    public $post;
    public $posts_count;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->post->load('category');
    }

    public function more()
    {
        $this->take += 3;
    }

    public function render()
    {
        $data = Post::query()
            ->where('category_id', $this->post->category->id)
            ->whereNot('id', $this->post->id)
            ->with('author')
            ->withCount('likes', 'comments');

        $this->posts_count = $data->count();

        $posts = $data->orderBy('published_at', 'desc')
            ->take($this->take)
            ->get();

        return view('livewire.more-from-the-category', [
            'posts' => $posts
        ]);
    }
}
