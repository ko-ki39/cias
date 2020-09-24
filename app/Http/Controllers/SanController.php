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

    public function loginPage(Request $request)
    {
        return view("auth.login");
    }

    public function registerPage(Request $request)
    {
        return view("auth.register");
    }
}
