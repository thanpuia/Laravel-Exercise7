@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8" style="background-color:#f0f0f5;"> --}}
        <div>
            @if (session('status_delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('status_delete') }}
            </div>
            @endif
            @if (session('status_edit'))
            <div class="alert alert-success" role="alert">
                {{ session('status_edit') }}
            </div>
            @endif



            {{-- <img src={{ asset('storage/2020NewYear/dcoffice.jpg') }}></a> --}}

            @foreach($contents as $content)
                    <div class="card" style="width: 38rem;">
                    <h5 class="card-title">
                            <img src={{ asset('storage/profile_picture/'.$content->users->profile_image ) }} height="33" width="30" style="border-radius:50%">

                        {{ $content->users->name }}</h5>
                        <h6 class="card-subtitle mb-1 text-muted">{{ $content->updated_at->diffForHumans() }}</h6>
                        <div class="card-body">
                          <p class="card-text">
                                {{ $content->input1 }} <br>
                                {{ $content->input2 }}

                                @guest
                                 @else
                                     @if($content->users->id== $user)
                                          <a class="button" href="{{ route('contents.edit', $content->id) }}">edit</a>
                                     @endif
                                 @endguest

                          </p>
                        </div>

                    </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
