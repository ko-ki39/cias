<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Article;


class Fav extends Model
{
    protected $fillable =[
        "article_id", "user_id",
    ];

    public function setArticleIdAttribute($value){
        $article = DB::table('articles')->where('id', $value)->first();
        $fav_count = $article->fav_count + 1;

        $update_count = [
            'fav_count' => $fav_count,
        ];

        Article::where('id', $value)->update($update_count);

    }
}
