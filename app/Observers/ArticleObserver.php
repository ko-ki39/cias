<?php

namespace App\Observers;

use App\Article;
use App\Post;
use App\User;

class ArticleObserver
{
    /**
     * Handle the article "created" event.
     *
     * @param  \App\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        //
        $update_user = User::find($article->user_id);

        $update_user->article_count += 1;

        $update_user->save();
    }

    /**
     * Handle the article "updated" event.
     *
     * @param  \App\Article  $article
     * @return void
     */


    public function updated(Article $article)
    {
    }

    /**
     * Handle the article "deleted" event.
     *
     * @param  \App\Article  $article
     * @return void
     */
    public function deleting(Article $article){
    }
    public function deleted(Article $article)
    {
        $update_user = User::find($article->user_id);

        $update_user->article_count -= 1;

        $update_user->save();
    }

    /**
     * Handle the article "restored" event.
     *
     * @param  \App\Article  $article
     * @return void
     */
    public function restored(Article $article)
    {
        //
    }

    /**
     * Handle the article "force deleted" event.
     *
     * @param  \App\Article  $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        //
    }
}
