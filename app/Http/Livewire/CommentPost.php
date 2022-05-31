<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentPost extends Component
{
    public $post;
    public $take = 3;
    public $comments_count;
    public $body;

    protected $listeners = ['saved' => '$refresh'];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function more()
    {
        $this->take += 3;
    }

    public function updatedFilter()
    {
        $this->take = 3;
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        $this->emit('saved');
    }

    public function send()
    {
        $this->validate([
            'body' => 'required|min:4|max:255'
        ]);

        $this->post->comments()->create([
            'body' => $this->body,
            'user_id' => auth()->id(),
        ]);

        $this->body = '';

        $this->emit('saved');
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

    public function markAsSpam($id)
    {
        $comment = Comment::find($id);
        $comment->update([
            'spam_reports' => $comment->spam_reports += 1,
        ]);
    }

    public function notSpam($id)
    {
        $comment = Comment::find($id);
        $comment->update([
            'spam_reports' => 0,
        ]);
    }


    public function render()
    {
        $data = Comment::query()
            ->with('author')
            ->where('post_id', $this->post->id);

        $this->comments_count = $data->count();

        $comments = $data->orderBy('created_at', 'desc')
            ->withCount('likes')
            ->take($this->take)
            ->get();

        return view('livewire.comment-post', [
            'comments' => $comments
        ]);
    }
}
