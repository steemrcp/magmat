<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //homepage
    public function home()
    {
      return view ('home.index');
    }

}
