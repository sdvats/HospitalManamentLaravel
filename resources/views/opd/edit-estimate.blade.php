@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">OPD Management Service</a></li>
                <li class="active">Edit Estimate</li>
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
                    <div class="panel-heading">Edit Estimate</div>
                    <div class="panel-body">
                        {!! Form::model($estimate,array('url' => ['/opd/edit-estimate',$estimate->id],'method'=>'PATCH','class' => 'form-horizontal')) !!}

                        {{ csrf_field() }}

                        @include('opd.forms.add-estimate-form',['submitButtontext'=> 'Edit Estimate'])

                        {!! Form::close() !!}
                        <div class="form-group">
                            @if($estimate->count())
                                <div class="col-md-6 col-md-offset-4">
                                    <a  href="{{ url('/opd/delete-estimate',$estimate->id) }}" class="btn btn-info">Delete Estimate</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
