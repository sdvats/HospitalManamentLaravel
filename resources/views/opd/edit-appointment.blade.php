@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">OPD Management Service</a></li>
                <li class="active">Edit Appointment</li>
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
                    <div class="panel-heading">Edit Appoinment</div>
                    <div class="panel-body">
                        {!! Form::model($appointment,array('url' => ['/opd/edit-appointment',$appointment->id],'method'=>'PATCH','class' => 'form-horizontal')) !!}

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('patient_id') ? ' has-error' : '' }}">
                            <label for="Patient ID" class="col-md-4 control-label">Patient ID</label>

                            <div class="col-md-6">
                                {!! Form::text('patient_id',$appointment->opdpatient->patient_id,array('class' => 'form-control','disabled')) !!}
                                @if ($errors->has('patient_id'))
                                    <span class="help-block">
                <strong>{{ $errors->first('patient_id') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('patient_name') ? ' has-error' : '' }}">
                            <label for="Patient ID" class="col-md-4 control-label">Patient Name</label>

                            <div class="col-md-6">
                                {!! Form::text('patient_name',$appointment->opdpatient->first_name.'  '.$appointment->opdpatient-> last_name,array('class' => 'form-control','disabled')) !!}
                                @if ($errors->has('patient_name'))
                                    <span class="help-block">
                <strong>{{ $errors->first('patient_name') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('appt_datetime') ? ' has-error' : '' }}">
                            <label for="Datetime" class="col-md-4 control-label">Date and Time</label>

                            <div class="col-md-6">
                                <div class="input-append date" id="datetimepicker" data-date="12-02-2012">
                                    {!! Form::date('appt_datetime',null,array('class' => 'form-control')) !!}
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                                @if ($errors->has('appt_datetime'))
                                    <span class="help-block">
                <strong>{{ $errors->first('appt_datetime') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('appt_note') ? ' has-error' : '' }}">
                            <label for="Patient ID" class="col-md-4 control-label">Appointment Notes</label>

                            <div class="col-md-6">
                                {!! Form::textarea('appt_note',null,array('class' => 'form-control','rows'=>'3')) !!}
                                @if ($errors->has('appt_note'))
                                    <span class="help-block">
                <strong>{{ $errors->first('appt_note') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Edit Appointment',array('class'=>'btn btn-primary')) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('jscript')
    <script type="text/javascript">
        var today = "<?php echo $today ?>"
        $("#datetimepicker").datetimepicker({
            todayHighlight: true,
            format: "yyyy-mm-dd hh:ii",
            autoclose: true,
            todayBtn: true,
            startDate: today,
            daysOfWeekDisabled: [0,6],
            hoursDisabled:[00,01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,20,21,22,23],
            minuteStep: 30,
            setDefault:"Asia/Kolkata",


        });


    </script>
@stop


@endsection
