<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SanController extends Controller
{
    public function welcomePage(Request $request)
    {
        return view("welcome");
    }

    public function topBlogPage(Request $request)
    {
        return view("top");
    }
}
