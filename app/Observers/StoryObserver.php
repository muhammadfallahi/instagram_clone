<?php

namespace App\Observers;

use App\Jobs\StoryDeleter;
use App\Models\Story;


class StoryObserver
{
    public function created(Story $story)
    {
        dispatch(new StoryDeleter($story))->delay(now()->addDay());
    }
}
 