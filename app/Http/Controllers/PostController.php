<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        ]);

        // avaterが送信されているかチェック
        // 新サムネイルをstorageに保存
        // $avater = basename($request->avater->store('public'));
        // 新サムネイルをユーザデータに反映
        // User::where('id', Auth::user()->id)->update(['avater' => $avater]);
        session()->flash('flash_message', '投稿が完了しました');
        return redirect('/');
    }
}
