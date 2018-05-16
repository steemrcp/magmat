<?php

namespace App\Http\Controllers;

use Auth;
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

    public function index()
    {
        // Takes user to complete sign up if some details haven't been supplied
        if(empty(Auth::user()->first_name))
        {
            return view('pages.signup-update');
        }

        // If user is not activated, diabled links and menus
        if(Auth::user()->active == 0){
            return view('pages.beforeactivation_index');
        }

        return view('home.index');
    }

    //Sign in page
    public function signIn()
    {
        return view('pages.sign-in');
    }

}
