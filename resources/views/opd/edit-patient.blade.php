@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">OPD Management Service</a></li>
                <li class="active">Edit Patient</li>
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
                    <div class="panel-heading">Edit Patient</div>
                    <div class="panel-body">
                        {!! Form::model($opdpatient,array('url' => ['/opd/edit-patient',$opdpatient -> id],'method'=>'PATCH','class' => 'form-horizontal')) !!}

                        @include('opd.forms.opd-patient-form',['submitButtontext'=> 'Edit Patient'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('jscript')




    <script>
        $("#js-example-placeholder-multiple").select2({
            placeholder: "Select a Procedure"
        });
    </script>
@stop
@endsection
