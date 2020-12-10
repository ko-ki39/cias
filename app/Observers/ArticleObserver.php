<?php

namespace App\Observers;

use App\Article;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Storage;

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


    public function updating(Article $article) //更新前に削除処理
    {
        $article_old = Article::find($article->id);
        if (!empty($article_old->image)) {
            if ($article->image) {
                if ($article_old->image != $article->image) { //変更があったら
                    $old_path = "/public/" . $article_old->image; //画像削除処理
                    // dd($old_path);
                    Storage::delete($old_path); //画像削除処理
                }
            } else {
                $old_path = "/public/" . $article_old->image; //画像削除処理
                // dd($old_path);
                Storage::delete($old_path); //画像削除処理
            }
        }
    }
    public function updated(Article $article)
    {
    }

    /**
     * Handle the article "deleted" event.
     *
     * @param  \App\Article  $article
     * @return void
     */
    public function deleting(Article $article)
    {
        //画像削除
        $article_old = Article::find($article->id);
        $old_path = "/public/" . $article_old->image; //画像削除処理
        // dd($old_path);
        Storage::delete($old_path); //画像削除処理
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
