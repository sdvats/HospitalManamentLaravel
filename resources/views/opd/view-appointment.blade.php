@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">OPD Management Service</a></li>
                <li class="active">View Appointment</li>
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

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">View Appointment</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Patient Id</label>

                                <div class="col-md-6">
                                    {{ $appointment -> opdpatient-> patient_id }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    {{ $appointment -> opdpatient -> first_name }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Appointment Date and Time</label>

                                <div class="col-md-6 hi">
                                    {{ $appointment -> appt_datetime }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Appointment Note</label>

                                <div class="col-md-6">
                                    {{ $appointment -> appt_note }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Date Added</label>

                                <div class="col-md-6">
                                    {{ $appointment -> created_at }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-1">
                                    <a  href="{{ url('/opd/view-patient',$appointment->opdpatient->id) }}" class="btn btn-info">View Patient Details</a>
                                </div>
                                <div class="col-md-2 col-md-offset-1">
                                    <a  href="{{ url('/opd/edit-appointment',$appointment->id) }}" class="btn btn-info">Edit Appointment</a>
                                </div>
                                <div class="col-md-2 col-md-offset-1">
                                    <a  href="{{ url('/opd/delete-appointment',$appointment->id) }}" class="btn btn-info">Delete Appointment</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
