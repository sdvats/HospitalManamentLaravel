@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">IPD Management Service</a></li>
                <li class="active">Download Records</li>
            </ol>
        </div>
        @include('ipd/ipd-nav')

        <div class="row">

            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Download Records</div>
                    <div class="panel-body">


                        {!! Form::open(array('url' => '/ipd/filter-download','method'=>'post','class' => 'form-horizontal')) !!}


                        @include('ipd.forms.download-form',['submitButtontext'=> 'Download Records'])

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>
    </div>

@section('jscript')
    <script type="text/javascript">
        $("#from_date").datetimepicker({
            format: "yyyy-mm-dd",
            startDate: "2017-04-01",
            minView: 'month',
            autoclose: true

        });

        $("#to_date").datetimepicker({
            format: "yyyy-mm-dd",
            startDate: "2017-04-01",
            minView: 'month',
            autoclose: true
        });
    </script>
@stop

@endsection
