<?php

namespace App\Observers;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class CommentObserver
{

    public function saved(comment $comment)
    {
        Log::info("new comment added ('.$comment->comment.')");
    }
}
