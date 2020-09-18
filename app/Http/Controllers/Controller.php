<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function index (){
    //     $test = DB::select('select * from users');
    //     return view('fake');
    // }
    public function top()
    {
        $articles = DB::table('articles')->get();
        return view('top', compact('articles'));
    }

    public function article_detail($id)
    { //記事詳細ページ
        $article = DB::table('articles')->where('id', $id)->first();

        $user = DB::table('users')->where('id', $article->user_id)->first();

        return view('article_detail', compact('article', 'user'));
    }

    public function individual($id)
    { //マイページ
        $user = DB::table('users')->where('id', $id)->first();
        $articles = DB::table('articles')->where('user_id', $id)->get();


        return view('individual', compact('user', 'articles'));
    }

    public function fake($id)
    { //偽物ページ 後で消す
        $user = DB::table('users')->where('id', $id)->first();

        //user_idが同じarticlesをとってくる
        $articles = DB::table('articles')->where('user_id', $id)->get();

        return view('fake', compact('user', 'articles'));
    }
}
