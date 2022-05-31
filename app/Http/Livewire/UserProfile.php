<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public $take = 3;
    public $posts_count;
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
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
            ->where('user_id', $this->user->id)
            ->with('category')
            ->withCount('likes', 'comments');

        $this->posts_count = $data->count();

        $posts = $data
            ->orderBy('published_at', 'desc')
            ->take($this->take)
            ->get();

        return view('livewire.user-profile', [
            'posts' => $posts
        ]);
    }
}
