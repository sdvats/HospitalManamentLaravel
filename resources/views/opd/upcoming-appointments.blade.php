@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">OPD Management Service</a></li>
                <li class="active">Upcoming Appointments</li>
            </ol>
        </div>
        @include('opd/opd-nav')
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <div id="alert" class="alert alert-dismissible fade in alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <button id="close" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                @endif
            @endforeach
        </div>

        <div class="row">
            @include('opd/quick-view-left-sidebar')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Appointment Scheduled</div>
                    <div class="panel-body">
                        @if($appointments->count())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>First Name</td>
                                        <td>Mobile Number</td>
                                        <td>Email</td>
                                        <td>Appointment Date/Time</td>
                                        <td>View</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($appointments as $appointment)

                                        <tr>
                                            <td>{{ $i++ }}).</td>
                                            <td>{{ $appointment->opdpatient -> first_name  }}</td>
                                            <td>{{ $appointment->opdpatient->contact  }}</td>
                                            <td>{{ $appointment->opdpatient->email  }}</td>
                                            <td>{{ $appointment -> appt_datetime  }}</td>
                                            <td><a  href="{{ url('opd/view-appointment',$appointment->id) }}" class="btn btn-default">View Details</a></td>

                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h3>No Appointment is Scheduled</h3>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
