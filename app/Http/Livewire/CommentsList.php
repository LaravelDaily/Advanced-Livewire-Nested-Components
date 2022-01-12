<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CommentsList extends Component
{
    public Collection $comments;

    public function render()
    {
        $this->comments = Comment::query()
            ->whereNull('comment_id')
            ->with(['user', 'comments'])
            ->orderBy('rating', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.comments-list');
    }
}
