@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-sm">
                    <h2>Standard: {{ $mStandard }}</h2>
            </div>
            <div class="col-sm">
                    <h2>Date: {{date('d-M-Y', strtotime($mDate))}} </h2>
            </div>
        </div>

        {!! Form::open(['route' => ['attendence.attendence_edit_store']]) !!}
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Registration Number</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($mAttendences as $mStudent)
                    <tr>
                            {!! Form::hidden('users_id[]',$mStudent->id) !!}
                            {!! Form::hidden('date[]',$mDate) !!}
                        <td>{!! Form::label('registration_number[]',$mStudent->users_registration_number) !!}
                            {!! Form::hidden('registration_number[]',$mStudent->users_registration_number)!!}</td>
                        <td>{!! Form::label('name[]',$mStudent->users->name) !!}
                            {!! Form::hidden('name[]',$mStudent->users->name)!!} </td>

                        <td>{!! Form::select('status[]',$status,$mStudent->status) !!}</td>
                        <td>{!! Form::text('remarks[]',$mStudent->remarks) !!}</td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            <input type="submit" value="Submit" class="btn btn-primary">
        {!! Form::close() !!}
    </div>


@endsection
