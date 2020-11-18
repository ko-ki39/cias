<?php

namespace App\Http\Controllers;

use App\Article;
use App\Hashtag;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use App\View\Components\article as ComponentsArticle;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use InterventionImage;

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
        // $articles = DB::table('articles')->latest()->paginate(5);
        $articles = Article::latest()->paginate(9);

        return view('top', compact('articles'));
    }

    public function article_detail($id)
    { //記事詳細ページ
        // $article = DB::table('articles')->where('id', $id)->first();
        $article = Article::find($id);

        //modelのリレーションを利用したデータの取り出し↓
        $comments = $article->comments()->latest()->get();
        $user = $article->user()->first();
        $post = $article->post()->first();

        //↑との比較用
        // $user = DB::table('users')->where('id', $article->user_id)->first();
        // $post = DB::table('posts')->where('id', $id)->first();
        // $comments = DB::table("comments")->where("article_id", $id)->latest()->get();

        $image = [$post->image1, $post->image2, $post->image3, $post->image4, $post->image5, $post->image6]; //bladeで変数宣言するのはよくない？
        $text = [$post->text1, $post->text2, $post->text3, $post->text4, $post->text5, $post->text6,];

        return view('article_detail', compact('article', 'user', 'post', 'image', 'text', 'comments'));
    }

    public function individual($id)
    { //マイページ
        // $user = DB::table('users')->where('id', $id)->first();
        $user = User::find($id);
        $articles = Article::where('user_id', $id)->get();
        // $articles = DB::table('articles')->where('user_id', $id)->get();

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
        $user = User::find(Auth::id());
        // $user = DB::table('users')->where('id', Auth::id())->first();

        return view('auth/user_edit', compact('user'));
    }

    public function user_update(Request $request)
    {
        if ($request->isMethod('post')) {
            // $user = DB::table('users')->where('id', Auth::id())->first();
            $user = User::find(Auth::id());
            if ($request->user_name == $user->user_name && $request->email == $user->email) {
                // バリデーション
                $request->validate([
                    // 'file|image|mimes:jpeg,jpg,png,gif|max:2048' などなど
                    'now_password' => 'required|now_password',
                    'u_i_input' => 'file|image',
                    'user_name' => 'required|string|max:10',
                    'email' => 'nullable|string|email|max:255',
                    // 'secret_question_id' => 'required|regex:/1|2|3|4|5|6/',
                    'secret_answer' => 'required|string|max:50',
                ]);
            } else if ($request->user_name == $user->user_name) {
                $request->validate([
                    // 'file|image|mimes:jpeg,jpg,png,gif|max:2048' などなど
                    'now_password' => 'required|now_password',
                    'u_i_input' => 'file|image',
                    'user_name' => 'required|string|max:10',
                    'email' => 'nullable|string|email|max:255|unique:users',
                    // 'secret_question_id' => 'required|regex:/1|2|3|4|5|6/',
                    'secret_answer' => 'required|string|max:50',
                ]);
            } else if ($request->email == $user->email) {
                $request->validate([
                    // 'file|image|mimes:jpeg,jpg,png,gif|max:2048' などなど
                    'now_password' => 'required|now_password',
                    'u_i_input' => 'file|image',
                    'user_name' => 'required|string|max:10|unique:users',
                    'email' => 'nullable|string|email|max:255|unique:users',
                    // 'secret_question_id' => 'required|regex:/1|2|3|4|5|6/',
                    'secret_answer' => 'required|string|max:50',
                ]);
            } else {
                $request->validate([
                    // 'file|image|mimes:jpeg,jpg,png,gif|max:2048' などなど
                    'now_password' => 'required|now_password',
                    'u_i_input' => 'file|image',
                    'user_name' => 'required|string|max:10|unique:users',
                    'email' => 'nullable|string|email|max:255|unique:users',
                    // 'secret_question_id' => 'required|regex:/1|2|3|4|5|6/',
                    'secret_answer' => 'required|string|max:50',
                ]);
            }
            $quality = 90;
            $storagePath = '/app/public/';
            if ($request->u_i_input != null) {
                $image = request()->file('u_i_input');
                $fileName = time() . "_" . $image->getClientOriginalName();
                $resizeImage = InterventionImage::make($image)
                    ->resize(350, 350, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                // 20KB未満まで圧縮する。
                // if($resizeImage->filesize() > 20000){
                //     do{
                //         if($quality < 15){
                //             // dd($quality);
                //             break;
                //         }
                //         $quality = $quality - 5;
                //         $resizeImage->save(storage_path($storagePath . $fileName), $quality);
                //     }while($resizeImage->filesize() > 20000);
                // }
                $resizeImage->save(storage_path($storagePath . $fileName), $quality);
                $image_path = basename($fileName); //画像名のみ保存
            } else {
                $image_path = $request->current_image;
            }

            // $update_user = [
            //     'user_name' => $request->user_name,
            //     'image' => $image_path,
            //     'email' => $request->email,
            //     'secret_question_id' => $request->secret_question_id,
            //     'secret_answer' => $request->secret_answer,
            // ];


            $update_user = User::find(Auth::id());
            $update_user->user_name = $request->user_name;
            $update_user->image = $image_path;
            $update_user->email = $request->email;
            $update_user->secret_question_id = $request->secret_question_id;
            $update_user->secret_answer = $request->secret_answer;

            $update_user->save();
            // $user->save();


            return redirect()->route('top');
        }
        return redirect()->route('top');
    }
    // public function fake($id)
    // { //偽物ページ 後で消す
    //     $user = DB::table('users')->where('id', $id)->first();

    public function password_edit()
    {
        return view('auth/passwords/password_edit');
    }

    public function login_password_change(ChangePasswordRequest $request)
    {
        $validator = $request->getValidator();
        if ($request->isMethod('post') == false) {
            return redirect()->route('top');
        } else if ($validator->failed()) {
            // dd($validator);
            return redirect('/top/password_edit')->withErrors($validator)->withInput(); //失敗した時の通常の処理
        } else {
            $update_user = User::find(Auth::id());
            $update_user->password = Hash::make($request->password);
            $update_user->save();
            return redirect()->route('user_edit');
        }
    }

    public function search(Request $request)
    {

        $search = $request->input('search');
        if (isset($search)) {
            $hash = substr($request->search, 0, 1);
            if ($hash == '#') {
                //ハッシュタグをつけて検索した場合
                $hash_search = substr($request->search, 1);

                // $articles = DB::table('articles')->where('hash1_id', $hash_search)->orWhere('hash2_id', $hash_search)->orWhere('hash3_id', $hash_search)->latest()->paginate(5);

                $articles = Article::Where('hash1_id', $hash_search)->orWhere('hash2_id', $hash_search)->orWhere('hash3_id', $hash_search)->latest()->paginate(5);
            } else {
                $search_condition = $request->search_condition;
                if ($search_condition == 1) { //タイトルで検索

                    // $articles = DB::table('articles')->where('title', 'like', '%' . $search . '%')->latest()->paginate(5);

                    $articles = Article::where('title', 'like', '%' . $search . '%')->latest()->paginate(5);
                } else if ($search_condition == 2) { //説明で検索

                    // $articles = $articles = DB::table('articles')->where('description', 'like', '%' . $search . '%')->latest()->paginate(5);

                    $articles = Article::where('description', 'like', '%' . $search . '%')->latest()->paginate();
                } else if ($search_condition == 3) { //ユーザー名で検索

                    $articles = Article::whereHas('user', function ($query) use ($search) {  //whereHasでuserの条件一致を探す
                        $query->where('user_name', 'like', '%' . $search . '%');
                    })->latest()->paginate(5);

                } else {
                    //全検索
                    $articles = Article::whereHas('user', function($query) use ($search){

                        $query->where('user_name', 'like', '%' . $search . '%');
                    })->orWhere('title', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->latest()->paginate();

                }
            }
            $message = null;
            if (empty($articles[0])) {
                $message = '「' . $request->search . '」<br>の検索結果が見つかりませんでした。';
            }

            return view('top', compact('articles', 'message'));
        } else {
            return redirect()->route('top');
        }
    }

    public function hashtag()
    { //hashtagのajax受け取りと受け渡し処理
        $hashtag = $_GET['hashtag'];
        // $hash = DB::table('hashtags')->where('hashtag_contents', 'like', '%' . $hashtag . '%')->get();
        $hash = Hashtag::where('hashtag_contents', 'like', '%' . $hashtag . '%')->get();
        return response()->json($hash);
    }

    public function hashtagResult($hash)
    { //hashtagをクリックした時の遷移先
        // $articles = DB::table('articles')->where('hash1_id', $hash)->orWhere('hash2_id', $hash)->orWhere('hash3_id', $hash)->latest()->paginate(5);

        $articles = Article::where('hash1_id', $hash)->orWhere('hash2_id', $hash)->orWhere('hash3_id', $hash)->latest()->paginate(5);

        return view('top', compact('articles'));
    }
}
