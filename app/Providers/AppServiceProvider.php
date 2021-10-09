<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Story;
use App\Observers\CommentObserver;
use App\Observers\StoryObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Story::observe(StoryObserver::class);
        Comment::observe(CommentObserver::class);
    }
}
