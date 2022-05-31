<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class MeShow extends Component
{
    public $take = 3;
    public $filter = 'Draft';
    public $posts_count;

    protected $queryString = [
        'filter' => ['except' => 'Draft'],
    ];

    public function more()
    {
        $this->take += 3;
    }

    public function updatedFilter()
    {
        $this->take = 5;
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
            ->where('user_id', auth()->id())
            ->with('category')
            ->withCount('likes', 'comments')
            ->when($this->filter == 'Draft', function($query){
                $query->draft()->orderBy('created_at', 'desc');
            })
            ->when($this->filter == 'Published', function($query){
                $query->published()->orderBy('published_at', 'desc');
            });

        $this->posts_count = $data->count();

        $posts = $data
            ->take($this->take)
            ->get();

        return view('livewire.me-show', [
            'posts' => $posts
        ]);
    }
}
