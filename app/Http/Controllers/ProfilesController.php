<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($slug)
    {
      $user = User::where('slug', $slug)->first();
      return view('profiles.profile')
              ->with('user', $user);
    }

    public function edit()
    {
      return view('profiles.edit')->with('info', Auth::user()->profile);
    }

    public function update(Request $r)
    {
      Session::flash('success', 'User successfully created.');

      $this->validate($r, [
      'location' => 'required',
      'about' => 'required|max:255'
    ]);

    Auth::user()->profile()->update([
      'location' => $r->location,
      'about' => $r->about
    ]);

    // dd(Auth::user()->profile);

    if($r->hasFile('avatar'))
    {
      Auth::user()->update([
        'avatar' => $r->avatar->store('public/avatars')
      ]);
    }
    Auth::user()->save();

    Session::flash('success', 'Profile updated.');
    return redirect()->back();

    }

}
