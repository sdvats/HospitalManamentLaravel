@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">IPD Management System</a></li>
                <li class="active">Edit IPD</li>
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
                    <div class="panel-heading">Edit Procedure</div>
                    <div class="panel-body">
                        {!! Form::model($ipdpatient,array('url' => ['/ipd/edit-ipd',$ipdpatient->id],'method'=>'post','class' => 'form-horizontal')) !!}

                        @include('ipd.forms.ipd-form',['submitButtontext'=> 'Update IPD'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('jscript')
    <script type="text/javascript">
        $("#admissiondatetimepicker").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            startDate: "2009-01-01 10:00",
            minuteStep: 5,
        });
        $("#proceduredatetimepicker").datetimepicker({
            format: "yyyy-mm-dd",
            startDate: "2009-01-01 10:00",
            minuteStep: 60,
        });

        $('#procedure_type').change(function() {
            if ($(this).val() == 'Major') {
                $('#admision_date').prop('disabled', false);
            }else {
                $('#admision_date').prop('disabled', true);
            }
        });

        $("#js-example-placeholder-multiple").select2({
            placeholder: "Select a Procedure"
        });
    </script>
@endsection
