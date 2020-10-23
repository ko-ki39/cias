<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IndividualController extends Controller
{
    function commentFavAjax(Request $request)
    {
        $user_id = Auth::id();

        $buttonType = $_GET["buttonType"];
        $articleID = $_GET["articleID"];
        // $buttonType = "comments";
        // $articleID = "4";

        $comFavGet = DB::table($buttonType)
            ->where("article_id", "=", $articleID)
            ->whereNotIn("user_id", [$user_id])
            ->orderByDesc("created_at")
            ->get();

        // return response()->json([
        //     "message1" => gettype($buttonType),
        //     "message2" => gettype($articleID),
        // ]);
        return response()->json($comFavGet);
    }
}
