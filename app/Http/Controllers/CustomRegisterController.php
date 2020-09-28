<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomRegisterController extends Controller
{
    public function signUp(){
        return view("auth.custom_register");
    }
}
