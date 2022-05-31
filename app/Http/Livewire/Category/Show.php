<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Show extends Component
{
    public $category;
    public $take = 5;
    public $filter = 'Resent';
    public $posts_count;

    protected $queryString = [
        'filter' => ['except' => 'Resent'],
    ];

    public function mount(Category $categorySlug)
    {
        $this->category = $categorySlug;
    }

    public function updatedFilter()
    {
        $this->take = 5;
    }

    public function more()
    {
        $this->take += 3;
    }

    public function markAsSpam($id)
    {
        $post = Post::find($id);
        $post->update([
            'spam_reports' => $post->spam_reports += 1,
        ]);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
    }

    public function notSpam($id)
    {
        $post = Post::find($id);
        $post->update([
            'spam_reports' => 0,
        ]);

    }

    public function render()
    {
        $data = Post::query()
            ->where('category_id', $this->category->id)
            ->with('author', 'category')
            ->withCount('likes', 'comments')
            ->when($this->filter == 'Comment', function($query){
                $query->orderBy('comments_count', 'desc');
            })
            ->when($this->filter == 'View', function($query){
                $query->orderBy('views_count', 'desc');
            })
            ->when($this->filter == 'Like', function($query){
                $query->orderBy('likes_count', 'desc');
            })
            ->when($this->filter == 'Spam', function($query){
                $query->where('spam_reports', '>', '0')
                    ->orderBy('spam_reports', 'desc');
            });

        $this->posts_count = $data->count();

        $posts = $data->orderBy('published_at', 'desc')
            ->take($this->take)
            ->get();

        return view('livewire.category.show', [
            'posts' => $posts,
        ]);
    }
}
