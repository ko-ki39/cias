<?php

namespace App\Observers;

use App\Fav;
use App\Article;

class FavObserver
{
    /**
     * Handle the fav "created" event.
     *
     * @param  \App\Fav  $fav
     * @return void
     */
    public function created(Fav $fav)
    {
        $update_article = Article::find($fav->article_id);

        $update_article->fav_count += 1;

        $update_article->save();
    }

    /**
     * Handle the fav "updated" event.
     *
     * @param  \App\Fav  $fav
     * @return void
     */
    public function updated(Fav $fav)
    {
        //
    }

    /**
     * Handle the fav "deleted" event.
     *
     * @param  \App\Fav  $fav
     * @return void
     */
    public function deleted(Fav $fav)
    {
        $update_article = Article::find($fav->article_id);

        $update_article->fav_count -= 1;

        $update_article->save();
    }

    /**
     * Handle the fav "restored" event.
     *
     * @param  \App\Fav  $fav
     * @return void
     */
    public function restored(Fav $fav)
    {
        //
    }

    /**
     * Handle the fav "force deleted" event.
     *
     * @param  \App\Fav  $fav
     * @return void
     */
    public function forceDeleted(Fav $fav)
    {
        //
    }
}
