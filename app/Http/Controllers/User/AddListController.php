<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Category;
use App\Tag;
use App\City;
use App\Amenity;
use App\Price;
use App\ServiceImage;
use Session;
class AddListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Service::all();
        return view('user.useraddlist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('user.useraddlist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request->all();
      Session::flash('success', 'User successfully created.');

        $this->validate($request, [
          'title' => 'required',
          'address' => 'required',
          'description' => 'required',
          'phone' => 'required|max:20',
          'slug' => 'required',
          'images' => 'required',
        ]);

        if ($request->hasFile('images')) {
              $imageName = $request->images->store('public/service_images');
          }

      $addlist = new Service;
      $addlist->title = $request->title;
      $addlist->address = $request->address;
      $addlist->images = $imageName;
      $addlist->description = $request->description;
      $addlist->phone = $request->phone;
      $addlist->website = $request->website;
      $addlist->email = $request->email;
      $addlist->facebook = $request->facebook;
      $addlist->instagram = $request->instagram;
      $addlist->slug = $request->slug;
      $addlist->status = $request->status;
      $addlist->rating = $request->rating;
      $addlist->latitude = $request->latitude;
      $addlist->longitude = $request->longitude;

      //BusinessTime
      $addlist->monday_open = $request->monday_open;
      $addlist->monday_close = $request->monday_close;
      $addlist->tuesday_open = $request->tuesday_open;
      $addlist->tuesday_close = $request->tuesday_close;
      $addlist->wednesday_open = $request->wednesday_open;
      $addlist->wednesday_close = $request->wednesday_close;
      $addlist->thursday_open = $request->thursday_open;
      $addlist->thursday_close = $request->thursday_close;
      $addlist->friday_open = $request->friday_open;
      $addlist->friday_close = $request->friday_close;
      $addlist->saturday_open = $request->saturday_open;
      $addlist->saturday_close = $request->saturday_close;
      $addlist->sunday_open = $request->sunday_open;
      $addlist->sunday_close = $request->sunday_close;
      $addlist->special = $request->special;
      $addlist->save();


      return redirect(route('useraddlist.index'));
    }



}
