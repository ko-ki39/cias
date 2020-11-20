<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    //ソートに使うよう
    public $sortable = ['id', 'user_id', 'article_id', 'created_at', 'updated_at'];

    protected $fillable = [
        "user_id", "article_id", "detail",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
