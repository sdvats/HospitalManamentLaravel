@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">IPD Management System</a></li>
                <li class="active">Edit Procedure</li>
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
                    <div class="panel-heading">Add Procedure</div>
                    <div class="panel-body">
                        {!! Form::model($ipdprocedure,array('url' => ['/ipd/edit-procedure',$ipdprocedure->id],'method'=>'post','class' => 'form-horizontal')) !!}

                        @include('ipd.forms.procedure-form',['submitButtontext'=> 'Update Procedure'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
