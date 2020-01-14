<?php

namespace App\Http\Controllers;

use Auth;
use App\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    public function index()
    {
        $contents = Content::orderBy('created_at','desc')->paginate();

        //dd($contents[0]->id);
        if(Auth::check()){
            $user = Auth::User()->id;
            return view('home',compact('contents','user'));
        }  else {
            return view('home',compact('contents'));
        }
    }
}
