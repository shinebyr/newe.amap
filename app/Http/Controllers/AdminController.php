<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Service;
use App\Comment;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $count = Service::where('status','=','1')->count();

        $services = DB::table('services')->count();
        $comments = DB::table('comments')->count();
        return view('admin', [
          'services' => $services,
          'comments' => $comments

      ]);
    }
}
