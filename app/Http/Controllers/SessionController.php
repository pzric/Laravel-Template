<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SessionController extends Controller
{
  public function login(Request $request){
    $remember = $request->filled('remember');
    /** login */
    $request->validate([
      'username' => ['required'],
      'password' => ['required'],
    ]);
    if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'state' => 1], $remember)){
      $request->session()->regenerate();
      return redirect()->intended('dashboard');
    }
    return back()->withErrors([
      'credentials' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
    ]);
  }
  public function logout(Request $request, Redirector $redirect){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return $redirect->to('/');
  }
}
