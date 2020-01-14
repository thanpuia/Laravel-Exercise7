@extends('layouts.app')

@section('content')

{!! Form::open(['url'=>'contents/store', 'method'=>'post' ]) !!}

{!! Form::label('input1', 'Input-1') !!}
{!! Form::text('input1') !!}

{!! Form::label('input2', 'Input-2') !!}
{!! Form::text('input2') !!}

{!! Form::submit('Submit') !!}
{!! Form::close() !!}



@endsection
