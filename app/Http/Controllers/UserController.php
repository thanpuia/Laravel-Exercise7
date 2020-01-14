<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
//use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{

    public function __construct(){
    // $this->middleware('auth');
    //     OR
        $this->middleware('auth')
        ->only(['index','create','store','update']);
        }

    public function index()
    {
        $users = User::paginate(7);
        if( Gate::denies('update-post',$users )){
            //abort(403);
            return redirect()->route('home');
        }

        //$this->authorize('update-post', $users);
        //THE ABOVE IS SHORT HAND. VERY GOOD. BUT THE REDIRECT IS NOT THERE
        return view('user.index',compact('users'));
    }


    public function store(Request $request)
    {
        dd("store");

    }
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' =>    'required',
            'email' =>   'sometimes|required|unique:users,email,'.$id,
            'role' =>    'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:4500',
        ]);

        $user = User::find($id);

        $user->registration_number = $request->registration_number;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->roles_id = $request->role;

       if($request->hasFile('profile_image')){

            $file = $request->file('profile_image');

            $name=$file->getClientOriginalName();
            $url=$request->file('profile_image')->storeAs('profile_picture', $name);
            $user->profile_image = $name;

        }else{
          //  dd("what the");
        }

        $user->save();
        //dd($request->file('profile_image')->getRealPath());
       // $img = Image::make($request->file('profile_image'))->resize(320, 240)->insert('profile_picture_small/thumb_'.$name);

       // User::updateOrCreate($request);
        $request->session()->flash('status_edit','Edit successfully');
//       dd($request->name." ".$request->email);

        return redirect()->route('users.index');
    }

    public function show($id)//THIS EDIT THE USER
    {
       // dd("show");
    //    $rules=[
    //     'name' => ['required', 'string', 'max:255'],
    //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

    // ];

    //     $this->validate($request,$rules);
       //$ulser = User::create(['name' => $request->name, 'email' =>  $request->email]);


    }

    public function destroy(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user -> delete();
        $request->session()->flash('status_delete','Delete successfully');

        return redirect()->route('users.index');
    }

    public function edit($id)
    {

       // dd($id);
       $user = User::findOrFail($id);
       $roles= Role::pluck('name','id');

       //dd($user->name);
        return view('user.edit',compact('user','roles'));
    }




    public function search(Request $request)
    {
        $search_key = $request->search_key;
        $users = User::where('name','like', '%'.$search_key.'%')->orWhere('email','like', '%'.$search_key.'%')->paginate(7);

        return view('user.index',compact('users'));
    }
}
