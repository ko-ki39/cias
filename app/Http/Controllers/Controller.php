<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function user_edit()
    {
        $user = DB::table('users')->where('id', Auth::id())->first();

        return view('auth/user_edit', compact('user'));
    }

    public function user_update(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = DB::table('users')->where('id', Auth::id())->first();
            if($request->user_name == $user->user_name && $request->email == $user->email){
                // バリデーション
                $request->validate([
                    // 'file|image|mimes:jpeg,jpg,png,gif|max:2048' などなど
                    'u_i_input' => 'file|image',
                    'user_name' => 'required|string|max:10',
                    'email' => 'nullable|string|email|max:255',
                    // 'secret_question_id' => 'required|regex:/1|2|3|4|5|6/',
                    'secret_answer' => 'required|string|max:50',
                ]);
            }else if($request->user_name == $user->user_name) {
                $request->validate([
                    // 'file|image|mimes:jpeg,jpg,png,gif|max:2048' などなど
                    'u_i_input' => 'file|image',
                    'user_name' => 'required|string|max:10',
                    'email' => 'nullable|string|email|max:255|unique:users',
                    // 'secret_question_id' => 'required|regex:/1|2|3|4|5|6/',
                    'secret_answer' => 'required|string|max:50',
                ]);
            }else if($request->email == $user->email){
                $request->validate([
                    // 'file|image|mimes:jpeg,jpg,png,gif|max:2048' などなど
                    'u_i_input' => 'file|image',
                    'user_name' => 'required|string|max:10',
                    'email' => 'nullable|string|email|max:255|unique:users',
                    // 'secret_question_id' => 'required|regex:/1|2|3|4|5|6/',
                    'secret_answer' => 'required|string|max:50',
                ]);
            }else {
                $request->validate([
                    // 'file|image|mimes:jpeg,jpg,png,gif|max:2048' などなど
                    'u_i_input' => 'file|image',
                    'user_name' => 'required|string|max:10',
                    'email' => 'nullable|string|email|max:255|unique:users',
                    // 'secret_question_id' => 'required|regex:/1|2|3|4|5|6/',
                    'secret_answer' => 'required|string|max:50|unique:users',
                ]);
            }

            if($request->u_i_input != null){
                $path = $request->u_i_input->store('public'); //シンボリックリンクで画像をstorage内に保存
                $image_path = basename($path); //画像名のみ保存
            }else{
                $image_path = null;
            }

            $update_user = [
                'user_name' => $request->user_name,
                'image' => $image_path,
                'email' => $request->email,
                'secret_question_id' => $request->secret_question_id,
                'secret_answer' => $request->secret_answer,
            ];

            $old_path = "/public/". $user->image; //画像削除処理
            Storage::delete($old_path);//画像削除処理

            User::where('id', Auth::id())->update($update_user);


            return redirect()->route('top');
        }
        return redirect()->route('top');
    }
    // public function fake($id)
    // { //偽物ページ 後で消す
    //     $user = DB::table('users')->where('id', $id)->first();

    //     //user_idが同じarticlesをとってくる
    //     $articles = DB::table('articles')->where('user_id', $id)->get();

    //     return view('fake', compact('user', 'articles'));
    // }
}
