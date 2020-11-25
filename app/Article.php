<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
// use App\Events\FavDelete;
use Kyslik\ColumnSortable\Sortable;

class Article extends Model
{
    use Sortable;
    //
    protected $fillable =[
        'user_id', 'title', 'description',
        'image', 'hash1_id', 'hash2_id', 'hash3_id'
    ];

    //ソートに使う
    public $sortable = ['id', 'user_id', 'fav_count', 'comment_count',  'created_at', 'updated_at'];
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

    public function post(){
        return $this->hasOne(Post::class, 'id'); //第二引数で外部キーをオーバーライド
    }
}
