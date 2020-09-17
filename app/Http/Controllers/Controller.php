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
    public function top(){
        return view('top');
    }

    public function individual(){ //マイページ
        return view('individual');
    }

    public function article_detail(){ //記事詳細ページ
        return view('article_detail');
    }
    public function fake(){ //偽物ページ 後で消す
        return view('fake');
    }
}
