<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function postForm()
    {

        return view('post');
    }

    public function upload(Request $request)
    {
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

        $imagefile = [
            $request->image1,
            $request->image2,
            $request->image3,
            $request->image4,
            $request->image5,
            $request->image6,
        ];

        for($i=0; $i<6; $i++){
            if($imagefile[$i] != null){
                $path[$i] = $imagefile[$i]->store('public');//シンボリックリンクで画像をstorage内に保存
                $image_path[$i] = basename($path[$i]); //画像名のみ保存
            }else{
                $image_path[$i] = null; //nullを入れないと空になる
            }
        }
        // dd($request);
        // if($imagefile->isValid()){ //正常にアップロードできたか

        $article = [
            'user_id' => 1,
            'title' => 'タイトル４',
            'description' => $request->text1,
            'image' => $image_path[0],
        ];
        DB::table('articles')->insert($article);

        $post = [
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
        DB::table('posts')->insert($post);

        //test
        return redirect('/');
    }
}
