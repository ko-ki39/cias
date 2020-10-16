<?php

namespace App\Providers;

use App\Article;
use App\Comment;
use App\Fav;
use App\Library\CommonClass;
use App\Observers\UserObserver;
use App\User;
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
        User::observe(UserObserver::class);
        Article::observe(Article::class);
        Comment::observe(Comment::class);
        Fav::observe(Fav::class);
    }
}
