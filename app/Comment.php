<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Carbon\Carbon;

class Comment extends Model
{
    use Sortable;

    //ソートに使うよう
    public $sortable = ['id', 'user_id', 'article_id', 'created_at', 'updated_at'];

    protected $fillable = [
        "user_id", "article_id", "detail",
    ];

    //ゲッター↓
    public function getCreatedAtAttribute($date)
    {
        // dd($date);

        return Carbon::parse($date)->format('Y年m月d日 H時i分');//created_atの取得時のフォーマット変更
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
