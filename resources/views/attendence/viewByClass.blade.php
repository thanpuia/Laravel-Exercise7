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

        <table class="table">
            <thead>
                <tr>
                    <th>Registration Number</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($selectStudents as $student)
                    <tr>
                        <td>{{ $student->users_registration_number }}</td>
                        <td>{{ $student->users->name }}</td>
                        <td>{{ $student->status }}</td>
                        <td>{{ $student->remarks }}</td>

                    </tr>
                @endforeach
                </tbody>
        </table>
    </div>


@endsection
