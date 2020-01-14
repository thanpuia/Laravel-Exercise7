@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="">

        </div>
        <table class="table">
            <tr>
                <thead>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Remark</th>
                </thead>
            </tr>
            <tbody>
                @foreach ($singleStudentData as $data)
                    <tr>
                        <td>{{$data->date}}</td>
                        <td>{{$data->status}}</td>
                        <td>{{$data->remarks}}</td>
                @endforeach


@endsection
