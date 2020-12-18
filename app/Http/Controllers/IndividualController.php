<?php

namespace App\Http\Controllers;

use App\User;
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
            ->limit(25)->get();

        $userImage = [];
        $userName = [];
        foreach($comFavGet as $cfg){
            // $getImage = DB::table("users")->where("id", "=", $cfg->user_id)->first()->image;
            // $getName = DB::table("users")->where("id", "=", $cfg->user_id)->first()->user_name;

            $getImage = User::find($cfg->user_id)->image;
            $getName = User::find($cfg->user_id)->user_name;
            array_push($userImage, $getImage);
            array_push($userName, $getName);
        }

        // $getImage = DB::table("users")->where("id", "=", $comFavGet[0]->user_id)->first()->image;
        // array_push($userImage, $getImage);
        // dd($comFavGet[0]->user_id);
        // dd($userImage);

        // return response()->json([
        //     "message1" => gettype($buttonType),
        //     "message2" => gettype($articleID),
        // ]);
        return response()->json([
                $comFavGet, $userImage, $userName
            ]);
    }
}
