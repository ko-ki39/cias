<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\Post;
use App\Hashtag;

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

            for ($i = 0; $i < 6; $i++) {
                if ($image_file[$i] != null) {
                    $path[$i] = $image_file[$i]->store('public'); //シンボリックリンクで画像をstorage内に保存
                    $image_path[$i] = basename($path[$i]); //画像名のみ保存
                } else {
                    $image_path[$i] = null; //nullを入れないと空になる
                }
            }

            $hash1 = DB::table('hashtags')->where('hashtag_contents', $request->hash1)->exists(); //データが存在しているか
            $hash2 = DB::table('hashtags')->where('hashtag_contents', $request->hash2)->exists();
            $hash3 = DB::table('hashtags')->where('hashtag_contents', $request->hash3)->exists();

            //  dd($request);
            if($hash1 == false){
                if(isset($request->hash1)){
                    $hashtag = new Hashtag();
                    $hashtag->create([
                        'hashtag_contents' => $request->hash1
                    ]);
                }
            }
            if($hash2 == false){
                if(isset($request->hash2)){
                    $hashtag = new Hashtag();
                    $hashtag->create([
                        'hashtag_contents' => $request->hash2
                    ]);
                }

            }
            if($hash3 == false){
                if(isset($request->hash3)){
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
                'user_id' => 1,
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
        $article = DB::table('articles')->where('id', $id)->first();

        $post = DB::table('posts')->where('id', $id)->first();


        return view('edit', compact('article', 'post'));
    }

    public function update(Request $request, $id)
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

            $image_file = [
                $request->image1,
                $request->image2,
                $request->image3,
                $request->image4,
                $request->image5,
                $request->image6,
            ];

            for ($i = 0; $i < 6; $i++) {
                if ($image_file[$i] != null) {
                    $path[$i] = $image_file[$i]->store('public'); //シンボリックリンクで画像をstorage内に保存
                    $image_path[$i] = basename($path[$i]); //画像名のみ保存
                } else {
                    $image_path[$i] = null; //nullを入れないと空になる
                }
            }

            $update_post = [
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
            ];

            $update_article = [
                'description' => $request->text1,
                'image' => $image_path[0],
                'hash1_id' => $request->hash1,
                'hash2_id' => $request->hash2,
                'hash3_id' => $request->hash3,

            ];
            Article::where('id', $id)->update($update_article);
            Post::where('id', $id)->update($update_post);

            return redirect()->route('top');
        }
        return redirect()->route('top');
    }

    public function delete($id)
    {
        Article::find($id)->delete();

        return redirect()->route('top');
    }
}
