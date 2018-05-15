<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Category;
use App\Tag;
use App\City;
use App\ServiceImage;
use Session;
class ListController extends Controller
{

    public function index()
    {
      $services = Service::where('status',1)->orderBy('created_at','DESC')->paginate(9);
      return view('user/lists', compact('services'));
    }

    public function guest()
    {
        $services = Service::where('special', 1)->orderBy('created_at','DESC')->paginate(9);
        return view('home', compact('services'));
    }

    public function gridView()
    {
      $services = Service::where('status',1)->paginate(9);
      return view('user/gridview', compact('services'));
    }

    public function fullwidth()
    {
      $services = Service::where('status',1)->paginate(9);
      return view('user/full-width', compact('services'));
    }

    public function service(service $service)
    {
     return view('user/service', compact('service'));

     // AHXAAP!!!
      if(!Session::has($service)){
        Service::where('service', $service)->increment('view_count');
        Session::put($service, 1);
      }
    }

    public function tag(tag $tag)
    {
      $services = $tag->services();
      return view('user/gridview', compact('services'));
    }

    public function category(category $category)
    {
      $services = $category->services();
      return view('user/gridview', compact('services'));
    }

    public function city(city $city)
    {
      $services = $city->services();
      return view('user/gridview', compact('services'));
    }

    public function saveLike(request $request)
    {
      // $like = new Like;
      // $like->user_id = Auth::id();
      // $like->service_id = $request->id;
      // $like->save();

      auth()->user()->like()->create($request->all());
      // ServiceReview::create($request->all());

      return back();
    }

}
