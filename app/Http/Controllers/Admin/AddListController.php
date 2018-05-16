<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Category;
use App\Tag;
use App\City;
use App\Amenity;
use App\Price;
use App\ServiceReview;
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
      // $cities = City::;
      return view('admin.list.lists', compact('lists', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tags = Tag::all();
      $categories = Category::all();
      $cities = City::all();
      $amenities = Amenity::all();
      // $price = Price::all();
      return view('admin.list.addlist', compact('tags', 'categories', 'cities', 'amenities'));
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
        $this->validate($request, [
          'title' => 'required',
          'address' => 'required',
          'description' => 'required',
          'phone' => 'required|max:20',
          'slug' => 'required',
          'images' => 'required',
        ]);

        if ($request->hasFile('image')) {
              $imageName = $request->image->store('public/service_images');
          }

      $addlist = new Service;
      $addlist->title = $request->title;
      $addlist->address = $request->address;
      $addlist->image = $imageName;
      $addlist->description = $request->description;
      $addlist->phone = $request->phone;
      $addlist->website = $request->website;
      $addlist->email = $request->email;
      $addlist->facebook = $request->facebook;
      $addlist->instagram = $request->instagram;
      $addlist->slug = $request->slug;
      $addlist->status = $request->status;
      $addlist->rating = $request->rating;
      $addlist->tax = $request->tax;
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

      $addlist->categories()->sync($request->categories);
      $addlist->tags()->sync($request->tags);
      $addlist->cities()->sync($request->cities);
      $addlist->amenities()->sync($request->amenities);


      return redirect(route('addlist.index'));


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

      $list = Service::with('categories', 'tags', 'cities','amenities')->where('id', $id)->first();
      $tags = Tag::all();
      $categories = Category::all();
      $cities = City::all();
      $amenities = Amenity::all();
      // $prices = Price::all();
      return view('admin.list.editlist', compact('tags', 'categories', 'list', 'cities', 'amenities'));
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
        'address' => 'required',
        'description' => 'required',
        'phone' => 'required|max:20',
        'slug' => 'required',
      ]);

    $addlist = Service::find($id);
    $addlist->title = $request->title;
    $addlist->address = $request->address;
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

    $addlist->categories()->sync($request->categories);
    $addlist->tags()->sync($request->tags);
    $addlist->cities()->sync($request->cities);
    $addlist->amenities()->sync($request->amenities);
    // $addlist->prices()->sync($request->prices);

    return redirect(route('addlist.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Service::where('id', $id)->delete();
      return redirect()->back();
    }

    public function uploadImages($serviceId, Request $request)
    {

        $lists = Service::find($serviceId);
        //get the file from the post request
        $picture=$request->file('file');
        if($picture){
          $imageName = time(). $picture->getClientOriginalName();
          $picture->move('images/services', $imageName);

          $imagePath= "/images/services/$imageName";
          $lists->pictures()->create(['image_path'=>$imagePath]);
        }
        return "done";

    }

    public function deleteImages($serviceId)
    {
      Session::flash('success', 'User successfully created.');

      $currentService = Service::findOrFail($serviceId);

      $pictures = $currentService->pictures();

      foreach ($currentService->pictures as $picture){
        unlink(public_path($picture->image_path));
      }

      $currentService->pictures()->delete();

      return redirect()->back();
    }

    public function reviews()
    {

            $reviews = ServiceReview::all();
            // $cities = City::;
            return view('admin.reviews', compact('reviews'));
    }

}
