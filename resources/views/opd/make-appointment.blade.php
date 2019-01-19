@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">OPD Management Service</a></li>
                <li class="active">Make Appointment</li>
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
                    <div class="panel-heading">Make Appoinment</div>
                    <div class="panel-body">
                        {!! Form::open(array('url' => ['/opd/make-appointment',$opdpatient->id],'method'=>'post','class' => 'form-horizontal')) !!}

                        @include('opd.forms.opd-appointment-form',['submitButtontext'=> 'Make Appointment'])

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
