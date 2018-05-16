<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Category;
use App\Tag;
use App\City;
use App\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('special', 1)->orderBy('created_at','DESC')->paginate(9);
        $newses = Post::orderBy('created_at', 'desc')->take(3)->get();

        return view('home', compact('services'))->with('newses', $newses);
    }
}
