@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">OPD Management Service</a></li>
                <li class="active">Recently added</li>
            </ol>
        </div>
        @include('opd/opd-nav')

        <div class="row">
            @include('opd/quick-view-left-sidebar')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Recently Added Patient</div>
                    <div class="panel-body">
                        @if($appointments->count())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>First Name</td>
                                        <td>Last Name</td>
                                        <td>Mobile Number</td>
                                        <td>Email</td>
                                        <td>Visited On</td>
                                        <td>View</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($appointments as $appointment)
                                        <tr>
                                            <td> {{ $appointment->opdpatient -> patient_id }}).</td>
                                            <td>{{ $appointment->opdpatient -> first_name  }}</td>
                                            <td>{{ $appointment->opdpatient -> last_name  }}</td>
                                            <td>{{ $appointment->opdpatient -> contact  }}</td>
                                            <td>{{ $appointment->opdpatient -> email  }}</td>
                                            <td>{{ $appointment->appt_datetime  }}</td>
                                            <td><a  href="{{ url('opd/view-patient',$appointment->opdpatient->id) }}" class="btn btn-default">View Details</a></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            {{ $appointments -> links() }}

                        @else
                            <h3>No Data to Show Please Try Another String</h3>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
