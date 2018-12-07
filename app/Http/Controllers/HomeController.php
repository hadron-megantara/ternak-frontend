<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        // $user = null;
        // if(Session::has('user')){
        //     $user = session('user');
        // }

        return view('home');
    }
}
