@extends('layouts.app')

@section('content')
<div class="alert alert-info " role="alert">
        {{ session('status_already_enter') }}
    </div>
<div class="container">
    <h3>Enter attendence</h3>
        <div class="row">
            {!! Form::open(['route'=> ['attendence.postCreate']]) !!}

            <div class="form-group row">
                {!! Form::Label('Standard') !!} <br>
                {!! Form::select('standard',$standards,['class' => 'form-control','required']) !!}
            </div>

            <div class="form-group row">
                    {!! Form::Label('Date') !!}
                    {!! Form::date('date',today(),['class' => 'form-control','required']) !!}
            </div>

            <input type = "submit" value="Submit" class="btn btn-primary">
            {!! Form::close() !!}
        </div>

        <br><br>
        <h3>Edit attendence</h3>
        <div class="row" >
            {!! Form::open(['route'=> ['attendence.attendence_edit']]) !!}

            <div class="form-group row">
                {!! Form::Label('Standard') !!} <br>
                {!! Form::select('standard',$standards,['class' => 'form-control','required']) !!}
            </div>

            <div class="form-group row">
                    {!! Form::Label('Date') !!}
                    {!! Form::date('date',today(),['class' => 'form-control','required']) !!}
            </div>

            <input type = "submit" value="Edit" class="btn btn-primary">
            {!! Form::close() !!}
        </div>

        <br><br>
        <h3>View By Class</h3>
        <div class="row" >
            {!! Form::open(['route'=> ['attendence.viewByClass']]) !!}

            <div class="form-group row">
                {!! Form::Label('Standard') !!} <br>
                {!! Form::select('standard',$standards,['class' => 'form-control','required']) !!}
            </div>

            <div class="form-group row">
                    {!! Form::Label('Date') !!}
                    {!! Form::date('date',today(),['class' => 'form-control','required']) !!}
            </div>

            <input type = "submit" value="View Class" class="btn btn-primary">
            {!! Form::close() !!}
        </div>

        <br><br>
        <h3>View By Individual</h3>
        <div class="row">
            {!! Form::open(['route' =>['attendence.viewByRegistration']]) !!}
                <div class="form-group row">
                    {!! Form::Label('Enter Registration Number') !!}
                    {!! Form::text('registration_number') !!}
                    {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>



<div>

@endsection



