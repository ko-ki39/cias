<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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
                $department_name = "オフィスビジネス科（前期）";
                break;
            case 2:
                $department = "ofkou";
                $department_name = "オフィスビジネス科（後期）";

                break;
            case 3:
                $department = "ji";
                $department_name = "自動車整備科";

                break;
            case 4:
                $department = "de";
                $department_name = "電気システム科";

                break;
            case 5:
                $department = "me";
                $department_name = "メディア・アート科";

                break;
            case 6:
                $department = "jo";
                $department_name = "情報システム科";

                break;
            case 7:
                $department = "zo";
                $department_name = "造園ガーデニング科";

                break;
            case 8:
                $department = "so";
                $department_name = "総合実務科（知的障がい者対象）";

                break;
        }
        if ($request->age == 2) { //2年だったら去年の年を出す
            $year -= 1;
        }

        $join = $year . "_" . $department;
        $file_name_join = $year . "_" . $department_name;
        $user_id_join = $join . "_";
        $file_name = $file_name_join . ".csv";

        // $headers = [ //ヘッダー情報
        //     'Content-type' => 'text/csv',
        //     'Content-Disposition' => 'attachment; filename=user.csv',
        //     'Pragma' => 'no-cache',
        //     'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
        //     'Expires' => '0',
        // ];

        $columns = [ //1行目の情報
            'ユーザーID',
            'パスワード',
            '有効期限',
        ];
        $file = fopen("../storage/app/user_info/".$file_name, 'w');
        mb_convert_variables('SJIS-win', 'UTF-8', $columns); //文字化け対策

        fputcsv($file, $columns); //1行目の情報を追記

        for ($i = 1; $request->num >= $i; $i++) {
            $user = new User(); //forの中でnewしないとダメ
            $user_id = $user_id_join . $i;
            $password = Str::random(16); //ランダムな16文字生成

            $csv = [ //csvで出力する情報
                $user_id,
                $password,
                $request->date,
            ];
            mb_convert_variables('SJIS-win', 'UTF-8', $csv); //文字化け対策
            fputcsv($file, $csv); //ファイルに追記する

            $password = bcrypt($password);
            $user->user_id = $user_id;
            $user->department_id = $request->department;
            $user->time_limit = $request->date;
            $user->age = $request->age;
            $user->password = $password;

            $user->save();
        }

        fclose($file); //ファイルを閉じる

        return redirect()->route('download');
    }

    public function download()
    {
        $headers = ['Content-Type' => 'text/plain'];
        $filename = 'test.txt';
        return Storage::download('user_info/test.txt', $filename, $headers);
    }

    public function autoAdminChange()
    { //有効期限が過ぎたユーザーの権限変更処理
        $users = User::all();
        $now = new Carbon();
        $now = Carbon::now('Asia/Tokyo'); //日本時間の日付取得
        foreach ($users as $key => $user) {
            if ($user->time_limit) { //期限が存在する
                if ($now->gte($user->time_limit)) { //期限が過ぎた人
                    if (!Article::where('user_id', $user->id)->first() && !Comment::where('user_id', $user->id)->first()) { // 記事やコメントがないユーザの削除
                        $user->delete();
                    } else {  //権限を3にする
                        $user->time_limit = null;
                        $user->role = 3;
                        $user->update();
                    }
                }
            }
        }
    }
}
