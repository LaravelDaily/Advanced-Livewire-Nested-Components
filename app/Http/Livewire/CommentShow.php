<?php

namespace App\Http\Livewire;

use App\Models\Vote;
use Livewire\Component;
use App\Models\Comment;

class CommentShow extends Component
{
    public Comment $comment;
    public int $level = 0;

    public function mount(Comment $comment, $level = 0)
    {
        $this->comment = $comment;
        $this->level = $level;
    }

    public function render()
    {
        return view('livewire.comment-show');
    }

    public function vote($vote)
    {
        Vote::create([
            'user_id' => auth()->id(),
            'comment_id' => $this->comment->id,
            'vote' => $vote
        ]);

        $this->comment->increment('rating', $vote);
    }
}
