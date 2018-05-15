<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Session;
class ContactController extends Controller
{
  public function index()
  {
    $messages = Contact::all();
    return view('admin.messages', compact('messages'));
  }

  public function create()
  {
    return view('contact');
  }

  public function store(Request $request)
  {
    Session::flash('success', 'User successfully created.');

    $this->validate($request, [
      'name'    =>  'required',
      'email'   =>  'required',
      'subject' =>  'required'
    ]);

    $message = new Contact;
    $message->name = $request->name;
    $message->email = $request->email;
    $message->subject = $request->subject;
    $message->comments = $request->comments;
    $message->save();

    return view('layouts.inc.messages');
  }

  public function destroy($id)
  {
    $message = Contact::find($id)->delete();
    return redirect()->route('admin.messages');
  }
}
