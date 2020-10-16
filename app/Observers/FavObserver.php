<?php

namespace App\Observers;

use App\Fav;

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
        //
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
        //
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
