<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ServiceController extends Controller
{
    public function index($slug)
    {
      $user = User::where('slug', $slug)->first();
      return view('service.profile')
                  ->with('user', $user);
    }
}
