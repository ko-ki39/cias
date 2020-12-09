<?php

namespace App\Observers;

use App\Comment;
use App\Good;

class GoodObserver
{
    /**
     * Handle the good "created" event.
     *
     * @param  \App\Good  $good
     * @return void
     */
    public function created(Good $good)
    {
        //
        $update_comment = Comment::find($good->comment_id);

        $update_comment->good_count += 1;

        $update_comment->save();
    }

    /**
     * Handle the good "updated" event.
     *
     * @param  \App\Good  $good
     * @return void
     */
    public function updated(Good $good)
    {
        //
    }

    /**
     * Handle the good "deleted" event.
     *
     * @param  \App\Good  $good
     * @return void
     */
    public function deleted(Good $good)
    {
        //
        $update_comment = Comment::find($good->comment_id);

        $update_comment->good_count -= 1;

        $update_comment->save();
    }

    /**
     * Handle the good "restored" event.
     *
     * @param  \App\Good  $good
     * @return void
     */
    public function restored(Good $good)
    {
        //
    }

    /**
     * Handle the good "force deleted" event.
     *
     * @param  \App\Good  $good
     * @return void
     */
    public function forceDeleted(Good $good)
    {
        //
    }
}
