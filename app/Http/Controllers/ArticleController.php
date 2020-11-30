<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\Comment;
use App\Fav;
use App\Good;
use App\Post;
use App\Hashtag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use InterventionImage;

class ArticleController extends Controller
{
    public function postForm()
    {

        return view('post');
    }

    public function upload(Request $request)
    {
        if ($request->isMethod('post')) {

            // バリデーション
            $request->validate([
                // 'file|image|mimes:jpeg,jpg,png,gif|max:2048' などなど
                'image1' => 'file|image|mimes:jpeg,jpg,png,gif',
                'image2' => 'file|image|mimes:jpeg,jpg,png,gif',
                'image3' => 'file|image|mimes:jpeg,jpg,png,gif',
                'image4' => 'file|image|mimes:jpeg,jpg,png,gif',
                'image5' => 'file|image|mimes:jpeg,jpg,png,gif',
                'image6' => 'file|image|mimes:jpeg,jpg,png,gif',
            ]);
            // dd($request);
            $image_file = [
                $request->image1,
                $request->image2,
                $request->image3,
                $request->image4,
                $request->image5,
                $request->image6,
            ];
            $quality = 90;
            $storagePath = '/app/public/';
            for ($i = 0; $i < 6; $i++) {
                if ($image_file[$i] != null) {
                    $fileName = time() . "_" . $image_file[$i]->getClientOriginalName();
                    $resizeImage = InterventionImage::make($image_file[$i])
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
                    $image_path[$i] = basename($fileName); //画像名のみ保存
                } else {
                    $image_path[$i] = null; //nullを入れないと空になる
                }
            }

            // $hash1 = DB::table('hashtags')->where('hashtag_contents', $request->hash1)->exists(); //データが存在しているか
            // $hash2 = DB::table('hashtags')->where('hashtag_contents', $request->hash2)->exists();
            // $hash3 = DB::table('hashtags')->where('hashtag_contents', $request->hash3)->exists();

            $hash1 = Hashtag::where('hashtag_contents', $request->hash1)->exists(); //データが存在しているか
            $hash2 = Hashtag::where('hashtag_contents', $request->hash2)->exists(); //データが存在しているか
            $hash3 = Hashtag::where('hashtag_contents', $request->hash3)->exists(); //データが存在しているか


            //  dd($request);
            if ($hash1 == false) {
                if (isset($request->hash1)) {
                    $hashtag = new Hashtag();
                    $hashtag->create([
                        'hashtag_contents' => $request->hash1
                    ]);
                }
            }
            if ($hash2 == false) {
                if (isset($request->hash2)) {
                    $hashtag = new Hashtag();
                    $hashtag->create([
                        'hashtag_contents' => $request->hash2
                    ]);
                }
            }
            if ($hash3 == false) {
                if (isset($request->hash3)) {
                    $hashtag = new Hashtag();
                    $hashtag->create([
                        'hashtag_contents' => $request->hash3
                    ]);
                }
            }

            // $hash1_id =  DB::table('hashtags')->where('hashtag_contents', $request->hash1)->value('id');
            // $has2_id =  DB::table('hashtags')->where('hashtag_contents', $request->hash2)->value('id');
            // $hash3_id =  DB::table('hashtags')->where('hashtag_contents', $request->hash3)->value('id');

            // dd($hash1_id);
            // dd($request);
            // if($imagefile->isValid()){ //正常にアップロードできたか

            $article = new Article();
            $article->create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'hash1_id' => $request->hash1,
                'hash2_id' => $request->hash2,
                'hash3_id' => $request->hash3,
                'description' => $request->text1,
                'image' => $image_path[0],
            ]);

            $post = new Post();
            $post->create([
                'image1' => $image_path[0],
                'image2' => $image_path[1],
                'image3' => $image_path[2],
                'image4' => $image_path[3],
                'image5' => $image_path[4],
                'image6' => $image_path[5],

                'text1' => $request->text1,
                'text2' => $request->text2,
                'text3' => $request->text3,
                'text4' => $request->text4,
                'text5' => $request->text5,
                'text6' => $request->text6,
            ]);
            return redirect()->route('top');
        } else {
            return redirect()->route('top');
        }
    }

    public function edit($id)
    {
        // $article = DB::table('articles')->where('id', $id)->first();
        // $article = Article::where('id', $id)->first();

        $article = Article::find($id);

        // dd($article);
        if ($article->user_id == Auth::id()) {
            //編集する人が本人か
            // $post = DB::table('posts')->where('id', $id)->first();
            // $post = Post::where('id', $id)->first();

            $post = Post::find($id);

            return view('edit', compact('article', 'post'));
        } else {
            return redirect()->route('top');
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            // $article = DB::table('articles')->where('id', $id)->first();
            $article = Article::find($id);

            if ($article->user_id != Auth::id()) {
                return redirect()->route('top');
            }

            // バリデーション
            $request->validate([
                // 'file|image|mimes:jpeg,jpg,png,gif|max:2048' などなど
                'image1' => 'file|image|mimes:jpeg,jpg,png,gif',
                'image2' => 'file|image|mimes:jpeg,jpg,png,gif',
                'image3' => 'file|image|mimes:jpeg,jpg,png,gif',
                'image4' => 'file|image|mimes:jpeg,jpg,png,gif',
                'image5' => 'file|image|mimes:jpeg,jpg,png,gif',
                'image6' => 'file|image|mimes:jpeg,jpg,png,gif',
            ]);

            // $hash1 = DB::table('hashtags')->where('hashtag_contents', $request->hash1)->exists(); //データが存在しているか
            // $hash2 = DB::table('hashtags')->where('hashtag_contents', $request->hash2)->exists();
            // $hash3 = DB::table('hashtags')->where('hashtag_contents', $request->hash3)->exists();

            $hash1 = Hashtag::where('hashtag_contents', $request->hash1)->exists(); //データが存在しているか
            $hash2 = Hashtag::where('hashtag_contents', $request->hash2)->exists(); //データが存在しているか
            $hash3 = Hashtag::where('hashtag_contents', $request->hash3)->exists(); //データが存在しているか

            //  dd($request);
            if ($hash1 == false) {
                if (isset($request->hash1)) {
                    $hashtag = new Hashtag();
                    $hashtag->create([
                        'hashtag_contents' => $request->hash1
                    ]);
                }
            }
            if ($hash2 == false) {
                if (isset($request->hash2)) {
                    $hashtag = new Hashtag();
                    $hashtag->create([
                        'hashtag_contents' => $request->hash2
                    ]);
                }
            }
            if ($hash3 == false) {
                if (isset($request->hash3)) {
                    $hashtag = new Hashtag();
                    $hashtag->create([
                        'hashtag_contents' => $request->hash3
                    ]);
                }
            }

            $image_file = [
                $request->image1,
                $request->image2,
                $request->image3,
                $request->image4,
                $request->image5,
                $request->image6,
            ];
            $quality = 90;
            $storagePath = '/app/public/';
            for ($i = 0; $i < 6; $i++) {
                if ($image_file[$i] != null) {
                    if ($image_file[$i] != null) {
                        $fileName = time() . "_" . $image_file[$i]->getClientOriginalName();
                        $resizeImage = InterventionImage::make($image_file[$i])
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
                        $image_path[$i] = basename($fileName); //画像名のみ保存
                    } else {
                        $image_path[$i] = null; //nullを入れないと空になる
                    }
                } else {
                    $image_path[$i] = null; //nullを入れないと空になる
                }
            }

            // $update_post = [
            //     'image1' => $image_path[0],
            //     'image2' => $image_path[1],
            //     'image3' => $image_path[2],
            //     'image4' => $image_path[3],
            //     'image5' => $image_path[4],
            //     'image6' => $image_path[5],

            //     'text1' => $request->text1,
            //     'text2' => $request->text2,
            //     'text3' => $request->text3,
            //     'text4' => $request->text4,
            //     'text5' => $request->text5,
            //     'text6' => $request->text6,
            // ];
            // Post::where('id', $id)->update($update_post);

            $post = Post::find($id);
            $image_list = [
                $post->image1,
                $post->image2,
                $post->image3,
                $post->image4,
                $post->image5,
                $post->image6,
            ];

            for ($i = 0; $i < count($image_path); $i++) {
                if (!$image_path[$i]) { //画像が入れられていなかった場合
                    $image_path[$i] = $image_list[$i]; //元の画像を入れる
                }
            }
            $post->image1 = $image_path[0];
            $post->image2 = $image_path[1];
            $post->image3 = $image_path[2];
            $post->image4 = $image_path[3];
            $post->image5 = $image_path[4];
            $post->image6 = $image_path[5];
            $post->text1 = $request->text1;
            $post->text2 = $request->text2;
            $post->text3 = $request->text3;
            $post->text4 = $request->text4;
            $post->text5 = $request->text5;
            $post->text6 = $request->text6;

            $post->save();

            // $update_article = [
            //     'description' => $request->text1,
            //     'image' => $image_path[0],
            //     'hash1_id' => $request->hash1,
            //     'hash2_id' => $request->hash2,
            //     'hash3_id' => $request->hash3,

            // ];
            // Article::where('id', $id)->update($update_article);
            $article = Article::find($id);
            $article->title = $request->title;
            $article->description = $request->text1;
            $article->image = $image_path[0];
            $article->hash1_id = $request->hash1;
            $article->hash2_id = $request->hash2;
            $article->hash3_id = $request->hash3;

            $article->save();

            return redirect()->route('top');
        }
        return redirect()->route('top');
    }

    public function delete($id)
    {
        // $article = DB::table('articles')->where('id', $id)->first();
        $article = Article::find($id);

        // dd(DB::table('articles'));
        if ($article->user_id == Auth::id()) { //本人か確認
            Article::find($id)->delete();
        }
        return redirect()->route('top');
    }

    public function favOperation(Request $request)
    {
        // ログインしてなかったら
        if (Auth::id() == null) {
            return response()->json([
                "message" => "ログインしてないゾ(脅迫)",
                "success_flag" => "plz_login",
            ]);
            // ログインしていたら
        } else if (Auth::id() != null) {
            $p_article_id = $request->input("p_article_id");
            $p_method = $request->input("p_method");
            $a_d_message = "";
            $query = Fav::where("article_id", "=", $p_article_id)->where("user_id", "=", Auth::id())->first();
            // 過去にお気に入りしていたら、テーブルから削除する
            if ($p_method == "create" && $query != null) {
                $a_d_message = "お気に入りを削除ゾ";
                $p_method = "exists";
                $article = Fav::find($query->id);
                $article->delete();
                // responsがcreateで、favsテーブル上でexistsじゃなかったら、追加する
            } else if ($p_method == "create" && $query == null) {
                // Log::debug('エラー');

                $a_d_message = "お気に入りに追加ゾ";
                $fav = new Fav();
                $fav->create([
                    "article_id" => $p_article_id,
                    "user_id" => Auth::id(),
                ]);
                // responseがdeleteだったら、削除する
            } else if ($p_method == "delete") {
                $a_d_message = "お気に入りを削除ゾ";

                // $a_d_message = $query->article_id;
                $article = Fav::find($query->id);
                $article->delete();

                // curlなどで直接侵入してきたら、弾く
            } else {
                $p_method = "不正！";
            }

            return response()->json([
                "user_id" => Auth::id(),
                "p_article_id" => $p_article_id,
                "p_method" => $p_method,
                "message" => $a_d_message,
                "success_flag" => "ok",
            ]);
        } else {
            return response()->json([
                "message" => "不正ゾ！！！",
                "success_flag" => "omg",
            ]);
        }
    }

    public function commnetAdd(Request $request)
    {
        $comment_forcus_id = $request->comment_forcus_id;
        $user_id = Auth::id();
        // $article_id = substr(url()->previous(), -1);
        $article_id = $request->article_id;

        $detailValidate = Validator::make(
            $request->all(),
            [
                "c_a_u_comment" => ["required", "max:400"],
            ],
            [
                "c_a_u_comment.required" => "コメントが空です！",
                "c_a_u_comment.max" => "コメントが400文字を超えています！",
            ]
        );

        $forcus = $article_id . $comment_forcus_id;
        if ($detailValidate->fails()) {
            return redirect()
                ->route('articleDetailForcus', ['id' => $forcus])
                ->withErrors($detailValidate);
        }
        $detail = $request->c_a_u_comment;

        $comment = new Comment;
        $comment->create([
            "user_id" => $user_id,
            "article_id" => $article_id,
            "detail" => $detail,
        ]);
        return redirect()->route('articleDetailForcus', ['id' => $forcus]);
    }

    // public function articleDetailForcus($id)
    // {
    //     $id = substr($id, -14, 1);
    //     // $article = DB::table('articles')->where('id', $id)->first();
    //     $article = Article::find($id);
    //     dd('od');

    //     $user = DB::table('users')->where('id', $article->user_id)->first();
    //     $post = DB::table('posts')->where('id', $id)->first();
    //     $comments = DB::table("comments")->where("article_id", $id)->latest()->get();
    //     // dd($comments);

    //     $image = [$post->image1, $post->image2, $post->image3, $post->image4, $post->image5, $post->image6]; //bladeで変数宣言するのはよくない？
    //     $text = [$post->text1, $post->text2, $post->text3, $post->text4, $post->text5, $post->text6,];

    //     return view('article_detail', compact('article', 'user', 'post', 'image', 'text', 'comments'));
    // }

    // public function commentArticle(){
    //     // dd(Auth::id());
    //     $comments = Comment::where('user_id', Auth::id())->get();

    //     foreach($comments as $key => $comment){
    //         $a_comments[$key] = $comment->article_id;
    //     }

    //     foreach($a_comments as $key => $a_comment){
    //         $articles[$key] = Article::find($a_comment);
    //     }
    //     if(empty($articles)){
    //         // なかった場合の表示
    //         $comment = 'null';
    //         $articles = null;
    //     }
    //     return view('')
    // }

    public function favArticle()
    {
        $favs = Fav::where('user_id', Auth::id())->get();

        foreach ($favs as $key => $fav) {
            $articles[$key] = Article::find($fav->article_id);
        }

        if (empty($articles)) {
            // なかった場合の表示
            $comment = 'null';
            $articles = null;
            // dd();
        }

        return view('article_individual', compact('articles'));
    }

    public function goodComment(Request $request){
        if ( $request->input('good_comment') == 0) {
            //ステータスが0のときはデータベースに情報を保存
            // $message = '保存';
            Good::create([
                'comment_id' => $request->input('comment_id'),
                 'user_id' => Auth::id(),
            ]);
           //ステータスが1のときはデータベースに情報を削除
        } elseif ( $request->input('good_comment')  == 1 ) {
            // $message = '削除';
            $good = Good::where('comment_id', $request->input('comment_id'))
               ->where('user_id', Auth::id())->first();
            Good::find($good->id)->delete();
       }
        return  $request->input('good_comment');
    }
}
