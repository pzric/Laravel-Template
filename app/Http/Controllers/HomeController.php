<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function home(){
    return view('login');
  }
  public function panel(){
    return view('panel.dashboard');
  }
}
