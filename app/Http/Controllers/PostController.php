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

        dd($request->image1);
        $imagefile = $request->image1;
        if($imagefile->isValid()){ //正常にアップロードできたか
            $path = $imagefile->store('public');
            $image_path = basename($path); //画像名のみ保存

            $param = [
                'user_id' => 1,
                'title' => 'タイトル４',
                'description' => $request->text1,
                'image' => $image_path,

            ];
            DB::table('articles')->insert($param);
        }
        // avaterが送信されているかチェック
        // 新サムネイルをstorageに保存
        // $avater = basename($request->avater->store('public'));
        // 新サムネイルをユーザデータに反映
        // User::where('id', Auth::user()->id)->update(['avater' => $avater]);
        // session()->flash('flash_message', '投稿が完了しました');
        return redirect('/');
    }
}
