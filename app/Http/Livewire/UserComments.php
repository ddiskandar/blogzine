<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\User;
use Livewire\Component;

class UserComments extends Component
{
    public $take = 3;
    public $comments_count;
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function more()
    {
        $this->take += 3;
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }

    public function like($id)
    {
        if ( auth()->guest() )
        {
            return to_route('login');
        }

        $comment = Comment::find($id);

        $comment->like(auth()->user());

        $this->emit('saved');
    }

    public function render()
    {
        $data = Comment::query()
            ->where('user_id', $this->user->id);

        $this->comments_count = $data->count();

        $comments = $data
            ->with('post')
            ->withCount('likes')
            ->orderBy('created_at', 'desc')
            ->take($this->take)
            ->get();

        return view('livewire.user-comments', [
            'comments' => $comments
        ]);
    }
}
