<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

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

    public function generate_page()
    { //アカウント生成ページ
        return view('generate');
    }

    public function generate(Request $request)
    { //アカウント生成

        $year = date("Y");
        switch ($request->department) { //user_idに使う
            case 1:
                $department = "ofzen";
                break;
            case 2:
                $department = "ofkou";
                break;
            case 3:
                $department = "ji";
                break;
            case 4:
                $department = "de";
                break;
            case 5:
                $department = "me";
                break;
            case 6:
                $department = "jo";
                break;
            case 7:
                $department = "zo";
                break;
            case 8:
                $department = "so";
                break;
        }
        $join = $year . "_" . $department . "_";

        for ($i = 1; $request->num >= $i; $i++) {
            $user = new User(); //forの中でnewしないとダメ
            $user_id = $join . $i;
            $password = bcrypt(Str::random(16)); //ランダムな16文字生成
            $user->user_id = $user_id;
            $user->department_id = $request->department;
            $user->time_limit = $request->date;
            $user->age = $request->age;
            $user->password = $password;

            $user->save();
        }

        return redirect()->route('admin');
    }

    public function autoAdminChange()
    { //有効期限が過ぎたユーザーの権限変更処理
        $users = User::all();
        $now = new Carbon();
        $now = Carbon::now('Asia/Tokyo'); //日本時間の日付取得
        foreach ($users as $key => $user) {
            if($user->time_limit){//期限が存在する
                if ($now->gte($user->time_limit)) { //期限が過ぎた人
                    if(!Article::where('user_id', $user->id)->first() && !Comment::where('user_id', $user->id)->first()){ // 記事やコメントがないユーザの削除
                        $user->delete();
                    }else{  //権限を3にする
                        $user->time_limit = null;
                        $user->role = 3;
                        $user->update();
                    }
                }
            }
        }
    }
}
