@extends('layouts.template')

@section('content')

<div class="container"><h2 class="text-white">User Edit</h2>
    <div class="row justify-content-md-center text-white" style="background-color:#424242;padding:30px">

            {{-- <form method="post" class="fm-inline"   action="{{ route('testusers.update') }}" enctype="multipart/form-data"> --}}
                {!! Form::open(['route' => ['users.update',$user->id],'files' => 'true','multiple' => true, 'method'=>'put']) !!}

                <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-right">Username</label>
                        <div class="col-md-6">

                            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>

                <div class="form-group row">
                        <label for="email" class="col-4 col-form-label text-right">Email</label>
                        <div class="col-md-6">
                            <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>

                <div class="form-group row">
                    <label for="registration_number" class="col-4 col-form-label text-right" >Registration Number</label>
                    <div class="col-md-6">
                    <input id="registration_number" type="text" class="form-control" name="registration_number" value="{{ $user->registration_number}}">
                    </div>
                </div>

                @if(Auth::user()->roles_id==3)
                    {!! Form::hidden('role',3) !!}
                @endif

                @if(Auth::user()->roles_id==1)
                    <div class="form-group row">
                                {!! Form::Label('Role', 'Role',['class'=>'col-4 col-form-label text-right']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('role', $roles, $user->roles_id, ['class' => 'form-control']) !!}
                                </div>
                    </div>
                @endif

                 <div class="form-group row">
                    <label for="profile_image" class="col-md-4 col-form-label text-md-right">Profile Image</label>
                    <div class="col-md-6">
                        <input id="profile_image" type="file" class="form-control" name="profile_image" accept="image/*"  >
                        @if (auth()->user()->image)
                            <code>{{ auth()->user()->image }}</code>
                        @endif
                    </div>
                </div>



                <input type="submit" value="Edit" class="btn btn-primary col-md-4 text-md-center">

                {!! Form::close() !!}

            {{-- </form> --}}
    </div>
</div>
@endsection
