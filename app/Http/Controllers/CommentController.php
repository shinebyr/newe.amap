<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        Session::flash('success', 'User successfully created.');
      $this->validate($request, array(
      'name'       => 'required|max:100',
      'email'      => 'required|email|max:100',
      'comment'    => 'required|max:500',
      'post_id' => 'required|max:255',
      ));
//#1
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->save();

        return redirect()->back();


      // $comment = new Comment;
      // $comment->comment = $request->comment;
      // $comment->service_id = $request->service_id;
      // $comment->user_id = Auth::id();
      // $service_id->comments()->save($comment);
      // // $comment->save();
      // return redirect()->back();
//#2
      // $service = Service::findOrFail($service_id)
      // $comment = $service->comments()->create(['comment'=>$request->comment]);
      // $comment->user_id = Auth::user()->id;
      // $comment->save;
      // return redirect()->back();
#3

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
