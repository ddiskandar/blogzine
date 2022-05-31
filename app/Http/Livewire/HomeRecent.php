<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class HomeRecent extends Component
{
    public $take = 3;
    public $filter = 'Resent';
    public $posts_count;

    protected $queryString = [
        'filter' => ['except' => 'Resent'],
    ];

    public function more()
    {
        $this->take += 3;
    }

    public function updatedFilter()
    {
        $this->take = 3;
    }

    public function markAsSpam($id)
    {
        $post = Post::find($id);
        $post->update([
            'spam_reports' => $post->spam_reports += 1,
        ]);
    }

    public function notSpam($id)
    {
        $post = Post::find($id);
        $post->update([
            'spam_reports' => 0,
        ]);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
    }

    public function render()
    {
        $data = Post::query()
            ->with('author', 'category')
            ->withCount('likes', 'comments')
            ->when($this->filter == 'Popular', function($query){
                $query->popular();
            })
            ->when($this->filter == 'Trending', function($query){
                $query->trending();
            })
            ->when($this->filter == 'Spam', function($query){
                $query->where('spam_reports', '>', '0')
                    ->orderBy('spam_reports', 'desc');
            });

        $this->posts_count = $data->count();

        $posts = $data->orderBy('published_at', 'desc')
            ->take($this->take)
            ->get();

        return view('livewire.home-recent', [
            'posts' => $posts
        ]);
    }
}
