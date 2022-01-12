<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Vote;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory(5)->create()->each(function($comment) {
            $votes = Vote::factory(5)->create([
                'comment_id' => $comment->id
            ]);
            $comment->update(['rating' => $votes->sum('vote')]);
            Comment::factory(2)->create([
                'comment_id' => $comment->id
            ])->each(function($comment) {
                $votes = Vote::factory(5)->create([
                    'comment_id' => $comment->id
                ]);
                $comment->update(['rating' => $votes->sum('vote')]);
            });
        });
    }
}
