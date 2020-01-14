@extends('layouts.app')

@section('content')

{!! Form::open(['url'=>'contents/update', 'method'=>'put' ]) !!}

{!! Form::hidden('id',$content->id) !!}
{!! Form::label('input1', 'Input-1') !!}
{!! Form::text('input1', $content->input1) !!}

{!! Form::label('input2', 'Input-2') !!}
{!! Form::text('input2', $content->input2) !!}

{!! Form::submit('Submit') !!}
{!! Form::close() !!}



@endsection
