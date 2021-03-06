<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::all();
      return view('admin.post.view', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.post.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required',
        'subtitle' => 'required',
        'body' => 'required',
        'slug' => 'required',
        'image' => 'required'
      ]);
      if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/post_images');
    }
    $post = new Post;
    $post->title = $request->title;
    $post->subtitle = $request->subtitle;
    $post->slug = $request->slug;
    $post->body = $request->body;
    $post->status = $request->status;
    $post->tag = $request->tag;
    $post->image = $imageName;
    $post->save();
    return redirect(route('post.index'));
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
        $post = Post::where('id',$id)->first();
        return view('admin.post.edit', compact('post'));
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
      $this->validate($request, [
        'title' => 'required',
        'subtitle' => 'required',
        'body' => 'required',
        'slug' => 'required',
      ]);
      if ($request->hasFile('image')) {
            $imageName = $request->images->store('public/post_images');
    }

    $post = Post::find($id);
    $post->title = $request->title;
    $post->subtitle = $request->subtitle;
    $post->slug = $request->slug;
    $post->body = $request->body;
    $post->status = $request->status;
    $post->tag = $request->tag;
    // $post->image = $imageName;
    $post->save();

    return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Post::where('id', $id)->delete();
      return redirect()->back();
    }
}
