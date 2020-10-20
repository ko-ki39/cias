<?php

namespace app\Library;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HamburgerNotice
{
    public static function callDB()
    {
        $user_id = Auth::id();
        // $a_u_id = DB::raw('(SELECT id FROM articles WHERE user_id = ?)', array($user_id));

        // $favs_first = DB::table('favs')
        //     ->select('article_id', 'user_id', DB::raw('null as type'), 'created_at')
        //     ->where($a_u_id);
    
        // $comments_union = DB::table('comments')
        //     ->select('article_id', 'user_id', 'detail', 'created_at')
        //     ->where($a_u_id)
        //     ->union($favs_first)
        //     ->orderByDesc('created_at')
        //     ->get()
        //     ->whereNotIn('user_id', [$user_id]);

        $comments_union = DB::table("articles")->where($user_id)->get();
        // dd($user_id, $comments_union);

        return $comments_union;
    }
}

?>