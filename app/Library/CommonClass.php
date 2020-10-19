<?php
namespace App\Library;

use Illuminate\Support\Facades\DB;

class CommonClass{
    public static function getArticlesRanking(){
        $articles = DB::table('articles')->get();
        foreach($articles as $article){ //多次元配列にデータを用意
            $rankings[] = [$article->id, $article->comment_count + $article->fav_count];
        }

        foreach($rankings as $key => $ranking){ //ソート用
            $sorted[$key] = $ranking[1];
        }
        array_multisort($sorted, SORT_DESC, $rankings); //ソート処理

        foreach($rankings as $ranking){ //記事をとってきて配列に直す
            $articles_ranking[] = DB::table('articles')->where('id', $ranking[0])->first();
        }
        // dd($articles_ranking);
        return($articles_ranking);
//         $comments = DB::table('comments')->get();
//         $favs = DB::table('favs')->get();

//         foreach($comments as $comment){
//             $article_id = $comment->id;
//             $collection = collect();


//             if($collection->has($article_id)){}else{
//                 $collection->put($article_id, 1);
//             }
//             // dd($collection);
//         }
//         $count = collect($comments->id)->countBy();
//         $count_sort = $count->sortDesc();
// dd($count_sort);
//         // $keys = array_keys($count);
//         return ('ok');
    }
}
