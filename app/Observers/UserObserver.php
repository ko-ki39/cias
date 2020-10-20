<?php

namespace App\Observers;

use App\User;
use Illuminate\Support\Facades\Storage;


class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updating(User $user) //更新前に削除処理
    {
       $user_old = User::find($user->id);
       if($user_old->image != $user->image){//変更があったら
           $old_path = "/public/" . $user_old->image; //画像削除処理
           // dd($old_path);
           Storage::delete($old_path); //画像削除処理
       }
    }
    public function updated(User $user)
    {
    }
    public function creating(User $user)
    {
    }
    public function created(User $user)
    {
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */


    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $user_old = User::find($user->id);
       if($user_old->image != $user->image){//変更があったら
           $old_path = "/public/" . $user_old->image; //画像削除処理
           // dd($old_path);
           Storage::delete($old_path); //画像削除処理
       }
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
