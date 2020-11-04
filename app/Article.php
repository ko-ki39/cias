<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
// use App\Events\FavDelete;

class Article extends Model
{
    //
    protected $fillable =[
        'user_id', 'title', 'description',
        'image', 'hash1_id', 'hash2_id', 'hash3_id'
    ];

    // protected $dispatchesEvents = [
    //     'deleted' => FavDelete::class
    // ];

    //ゲッター↓
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d(D)');//created_atの取得時のフォーマット変更
    }

    //リレーション定義↓
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function favs(){
        return $this->hasMany(Fav::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
