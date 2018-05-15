<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class ServiceLoginController extends Controller
{
    public function showLoginForm()
    {
      return view('auth.service-login');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
      ]);

      //
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        return redirect()->intended(route('service.profile'));
      }

      //
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
