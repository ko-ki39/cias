<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function index (){
    //     $test = DB::select('select * from users');
    //     return view('fake');
    // }
    public function test()
    {
        // $articles = DB::table('articles')->get();


        return view('test');
    }
    public function top()
    {
        $articles = DB::table('articles')->get();
        $favs = DB::table("favs")->get();

        return view('top', compact('articles', 'favs'));
    }

    public function article_detail($id)
    { //記事詳細ページ
        $article = DB::table('articles')->where('id', $id)->first();

        $user = DB::table('users')->where('id', $article->user_id)->first();

        $post = DB::table('posts')->where('id', $id)->first();
        // dd($post);

        $image = [$post->image1, $post->image2, $post->image3, $post->image4, $post->image5, $post->image6]; //bladeで変数宣言するのはよくない？
        $text = [$post->text1, $post->text2, $post->text3, $post->text4, $post->text5, $post->text6,];

        return view('article_detail', compact('article', 'user', 'post', 'image', 'text'));
    }

    public function individual($id)
    { //マイページ
        $user = DB::table('users')->where('id', $id)->first();
        $articles = DB::table('articles')->where('user_id', $id)->get();

        if (Auth::id() == $id) {
            //本人だった場合
            return view('individual', compact('user', 'articles'));
        } else {
            // 他人の場合
            return view('fake', compact('user', 'articles'));
        }
    }



    // public function fake($id)
    // { //偽物ページ 後で消す
    //     $user = DB::table('users')->where('id', $id)->first();

    //     //user_idが同じarticlesをとってくる
    //     $articles = DB::table('articles')->where('user_id', $id)->get();

    //     return view('fake', compact('user', 'articles'));
    // }
}
