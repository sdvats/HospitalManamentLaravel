@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/cms') }}">Caller Management Service</a></li>
                <li class="active">Reports</li>
            </ol>
        </div>
        @include('cms/cms-nav')
        <div class="row">
            <h3 class="text-center">Generate and save reports on single click</h3>

            <ul>
                <li><a href="{{ url('/cms/reports/today-call-log') }}">Today's Call Log</a></li>
                <li><a href="{{ url('/cms/reports/today-reminder-log') }}">Today's Reminder Sheet</a></li>
                <li><a href="{{ url('/cms/reports/monthly-call-log') }}">Montly Call Log</a></li>
            </ul>
        </div>


    </div>

@endsection
