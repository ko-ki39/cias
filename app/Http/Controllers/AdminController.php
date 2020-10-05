<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index(){
        $users = DB::table('users')->get();
        $articles = DB::table('articles')->get();
        $comments = DB::table('comments')->get();

        return view('admin', compact('users', 'articles', 'comments'));
    }
}
