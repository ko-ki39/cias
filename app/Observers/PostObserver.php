<?php

namespace App\Observers;

use App\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        //
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function updating(Post $post)
    {

        $old_post = Post::find($post->id);

        $image_path = [
            $post->image1,
            $post->image2,
            $post->image3,
            $post->image4,
            $post->image5,
            $post->image6,
        ];

        $old_image_path = [
            $old_post->image1,
            $old_post->image2,
            $old_post->image3,
            $old_post->image4,
            $old_post->image5,
            $old_post->image6,
        ];

        for ($i = 0; $i < 6; $i++) {
            if ($old_image_path[$i] != $image_path[$i]) {
                $old_path = "/public/" . $old_image_path[$i]; //画像削除処理
                // dd($old_path);
                Storage::delete($old_path); //画像削除処理
            }
        }
    }
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleting(Post $post)
    {

        $old_post = Post::find($post->id);

        $image_path = [
            $post->image1,
            $post->image2,
            $post->image3,
            $post->image4,
            $post->image5,
            $post->image6,
        ];

        $old_image_path = [
            $old_post->image1,
            $old_post->image2,
            $old_post->image3,
            $old_post->image4,
            $old_post->image5,
            $old_post->image6,
        ];

        for ($i = 0; $i < 6; $i++) {
            if ($old_image_path[$i] != $image_path[$i]) {
                $old_path = "/public/" . $old_image_path[$i]; //画像削除処理
                // dd($old_path);
                Storage::delete($old_path); //画像削除処理
            }
        }
    }
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the post "restored" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
