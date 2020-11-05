<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')->get();
        // $articles = DB::table('articles')->get();
        // $comments = DB::table('comments')->get();

        $users = User::all();
        $articles = Article::All();
        $comments = Comment::All();

        return view('admin', compact('users', 'articles', 'comments'));
    }

    public function adminChange(Request $request, $id) //権限変更用
    {
        $admin_change = [
            'role' => $request->authority,
        ];

        User::where('id', $id)->update($admin_change);
        return redirect()->route('admin');
    }

    public function userDelete($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin');
    }

    public function articleDelete($id)
    {
        Article::find($id)->delete();
        return redirect()->route('admin');
    }

    public function commentDelete($id)
    {
        Comment::find($id)->delete();
        return redirect()->route('admin');
    }
}
