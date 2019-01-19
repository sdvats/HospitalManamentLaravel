@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">OPD Management Service</a></li>
                <li class="active">Calender</li>
            </ol>
        </div>
        @include('opd/opd-nav')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Search Patient</div>
                    <div class="panel-body">
                        {!! $calendar->calendar() !!}
                        {!! $calendar->script() !!}

                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
