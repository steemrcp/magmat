<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //homepage
    public function home()
    {
      return view ('pages.index');
    }

    //Sign up page
    public function signUp()
    {
        return view('pages.sign-up');
    }

}
