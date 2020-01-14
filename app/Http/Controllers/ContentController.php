<?php

namespace App\Http\Controllers;

use App\Content;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\HomeController;


class ContentController extends Controller
{

    public function __construct(){

        $this->middleware('auth')
            ->only(['create','store']);

    }
    public function create(){

        return view ('contents.create');
    }

    public function store(Request $request){
        $user = Auth::User();
     //   dd($user->id);
        Content::create([
            'input1' => $request['input1'],
            'input2' => $request['input2'],

            'users_id'=> $user->id,

            ]);

            //$contents = Content::paginate();
            //return view('home',compact('contents'));

            $homeControllerObj = new HomeController;
           //return $homeControllerObj->index();
           return redirect()->route('home');

    }

    public function edit($id){

        $content= Content::find($id);

        return view('contents.edit',compact('content'));
    }

    public function update(Request $request){

       // dd($request->id);
        $content= Content::find($request->id);
        $content->input1 = $request->input1;
        $content->input2 = $request->input2;
        $content->save();

        $homeControllerObj = new HomeController;
        $request->session()->flash('status_edit','Edit successfully');

        return $homeControllerObj->index();
        // return view('home',compact('content'));
    }

}
