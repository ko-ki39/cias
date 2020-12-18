<?php

namespace app\Library;

use App\Comment;
use App\Fav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HamburgerNotice
{
    public static function callDB()
    {
        $user_id = Auth::id();

        $favUnion = Fav::select('article_id', 'user_id', DB::raw('null as type'), 'created_at')
            ->whereRaw('(SELECT id FROM articles WHERE user_id = ?)', [$user_id])
            ->whereNotIn('user_id', [$user_id]);

        $comUnionExe = Comment::select('article_id', 'user_id', 'detail', 'created_at')
            ->whereRaw('(SELECT id FROM articles WHERE user_id = ?)', [$user_id])
            ->whereNotIn('user_id', [$user_id])
            ->union($favUnion)
            ->orderByDesc('created_at')
            ->get();

        // dd($user_id, $comUnionExe);

        return $comUnionExe;
    }
}

?>
