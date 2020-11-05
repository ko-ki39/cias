<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
// use App\Events\ImageFileDelete;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    // protected $dispatchesEvents = [
    //     'deleted' => ImageFileDelete::class,
    //     'updating' => ImageFileDelete::class
    // ];
    protected $fillable = [
        'image', 'user_id', 'password', 'user_name', 'email', 'secret_question_id', 'secret_answer',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function getPasswordAttribute($value){
    //     return Crypt::decrypt($value);
    //     // return ucfirst($value);
    // }

    // public function setPasswordAttribute($value){
    //     return Crypt::encrypt($value);
    //     // return ucfirst($value);
    // }

    //リレーション定義↓
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function favs()
    {
        return $this->hasMany(Fav::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function secret_question()
    {
        return $this->belongsTo(SecretQuestion::class);
    }


    // public function findArticle($search){
    //     return $this->with('articles')->where('user_name', 'like', '%'.$search.'%')->get();
    // }
}
