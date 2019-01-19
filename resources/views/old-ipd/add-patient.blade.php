@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/old-ipd') }}">OLD IPD Management Service</a></li>
                <li class="active">Add Patient</li>
            </ol>
        </div>
        @include('old-ipd/old-ipd-nav')
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
                    <div class="panel-heading">Add New Patient</div>
                    <div class="panel-body">

                        {!! Form::open(array('url' => '/old-ipd/add-patient','method'=>'post','class' => 'form-horizontal')) !!}

                        @include('old-ipd.form.patient-form-old-ipd',['submitButtontext'=> 'Add Patient'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>



        </div>


    </div>
@section('jscript')
    <script type="text/javascript">
        $("#datetimepicker").datetimepicker({
            format: "yyyy-mm-dd",
            startDate: "2009-01-01 10:00",
            minuteStep: 60,
        });


    </script>

    <script>
        $('#country').change(function() {
            if ($(this).val() == '99') {
                $('#state').prop('disabled', false);
            }else {
                $('#state').prop('disabled',true);
            }
        });

        $("#js-example-placeholder-multiple").select2({
            placeholder: "Select a Procedure"
        });
    </script>
@stop

@endsection
