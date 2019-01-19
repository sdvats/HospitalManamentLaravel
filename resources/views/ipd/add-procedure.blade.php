@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">IPD Management System</a></li>
                <li class="active">Add Procedure</li>
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
                        {!! Form::open(array('url' => '/ipd/add-procedure','method'=>'post','class' => 'form-horizontal')) !!}

                        @include('ipd.forms.procedure-form',['submitButtontext'=> 'Add Procedure'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Procedures list (Click on Procedure to edit it)</div>
                    <div class="panel-body">
                      @foreach($ipdprocedures  as $ipdprocedure)
                      <div class="col-lg-4">
                         <a href="{{ url('/ipd/edit-procedure',$ipdprocedure->id) }}" class="btn btn-warning active">{{ $ipdprocedure -> ipdprocedure_name}}</a>
                          <br><br>
                      </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
