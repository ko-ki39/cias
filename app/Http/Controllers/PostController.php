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
        $avater = basename($request->avater->store('public'));
        // 新サムネイルをユーザデータに反映
        // User::where('id', Auth::user()->id)->update(['avater' => $avater]);
        return redirect()->route('dashboard.index')->with('message', 'プロフィール画像を更新しました！');
        return redirect()->route('dashboard.index')->with('message', '更新失敗です!!');
    }
}
