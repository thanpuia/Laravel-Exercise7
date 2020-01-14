{{-- @extends('layouts.admin_sidebar') --}}
{{-- @extends('layouts.admin_bootstrap') --}}
@extends('layouts.template')

@section('content')

@if (session('status_edit'))

<div class="container">
    <div class="row justify-content-start">
      <div class="col-12">
        <div class="alert alert-info " role="alert">
            {{ session('status_edit') }}
        </div>

      </div>
    </div>
</div>
@endif

@if (session('status_delete'))

<div class="container">
    <div class="row justify-content-start">
      <div class="col-12">
            <div class="alert alert-danger col-md-8 justify-content-md-center" role="alert">
                {{ session('status_delete') }}
            </div>
      </div>
    </div>
</div>
@endif

    <div class="container">

        <form method="get" action="{{ route('users.search')}}">
                    <input type="text" name="search_key">
                    <input type="submit" value="Search">
        </form>
        <br>

        @if(count($users)==0)
         <h2>Search not found! <a href={{ route('users.index') }}>Back</a></h2>

        @else


            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                                <th scope="col">Sl.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Updated at</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                                <tr>
                                    <td> {{ $user->id }} </td>
                                    <td>  {{ $user->name}}</td>
                                    <td>  {{ $user->email}}</td>
                                    <td>  {{ $user->roles->name}}</td>
                                    <td>  {{ $user->updated_at->diffForHumans()}}</td>
                                    <td>  {{ $user->created_at->diffForHumans()}}</td>
                                    <td>
                                        <div class="container">
                                            <div class="row justify-content-start">
                                                <div class="col-4">

                                                    {{-- edit --}}
                                                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info btn-sm" >Edit</a>

                                                </div>
                                                <div class="col-4">

                                                    {{-- delete --}}

                                                    <form method="Post" class="fm-inline"
                                                        action="{{ route('users.destroy',$user->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"/>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif



    </div>
        <div class="container">
            <div class="paginator">
            {{ $users->appends($_GET)->onEachSide(1)->links() }}
            </div>
        </div>
@endsection







