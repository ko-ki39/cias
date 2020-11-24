<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
// use App\Events\ImageFileDelete;
use Kyslik\ColumnSortable\Sortable;


class User extends Authenticatable
{
    use Notifiable;
    use Sortable;

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
        'image', 'user_id', 'password', 'user_name', 'email'
    ];

    //ソートに使うよう
    public $sortable = ['id','user_id', 'user_name', 'role', 'department_id', 'created_at', 'updated_at'];

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

    //ゲッター↓
    public function getImageAttribute($image)
    {
        if(!$image){ //画像が無かったらデフォルトの画像を表示させる
            $image = '1603929194_images.png'; //デフォルト画像のパス
        }
        return $image;
    }

    //ゲッター↓
    public function getUserNameAttribute($name)
    {
        if($this->role == 3){
            $name = $name.'（卒業生）';
        }

        return $name;
    }

    // //ゲッター
    // public function getCreatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d(D)');//created_atの取得時のフォーマット変更
    // }

    // セッター
    // public function setCreatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d(D)');//created_atの取得時のフォーマット変更
    // }

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
