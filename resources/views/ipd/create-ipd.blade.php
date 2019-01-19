@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">IPD Management System</a></li>
                <li class="active">Create IPD</li>
            </ol>
        </div>
        @include('ipd/ipd-nav')
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
                    <div class="panel-heading">Create IPD</div>
                    <div class="panel-body">
                        {!! Form::open(array('url' => ['/ipd/create-ipd',$opdpatient->id],'method'=>'post','class' => 'form-horizontal')) !!}

                        @include('ipd.forms.ipd-form',['submitButtontext'=> 'Create IPD'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('jscript')
        <script type="text/javascript">
            $("#admissiondatetimepicker").datetimepicker({
                pick12HourFormat: false,
                format: "yyyy-mm-dd hh:ii",
                startDate: "2017-04-01",
                minuteStep: 05,
                autoclose: true


            });
            $("#proceduredatetimepicker").datetimepicker({
                format: "yyyy-mm-dd",
                startDate: "2017-04-01",
                minView: 'month',
                autoclose: true,

            });
            $('#procedure_type').change(function() {
                if ($(this).val() == 'Major') {
                    $('#admision_date').prop('disabled', false);
                }else {
                    $('#admision_date').prop('disabled',true);
                }
            });


            $("#js-example-placeholder-multiple").select2({
                placeholder: "Select a Procedure"
            });
        </script>
    @stop

@endsection
