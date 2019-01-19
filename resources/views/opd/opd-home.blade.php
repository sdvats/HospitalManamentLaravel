@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li class="active">OPD Management System</li>
            </ol>
        </div>
        @include('opd/opd-nav')
        <div class="row">
            <h3 class="text-center">Welcome to the OPD Managment Service</h3>
            <p class="text-info ">You can now Add Appointment, Manage Appointment(Reschedule,Edit, Delete) and Get detailed information about patient </p>
            <ul>
                <li><a href="{{url('/opd/calendar')}}">Calendar</a></li>
                <li><a href="{{ url('/opd/add-patient') }}">Add Patient</a></li>
                <li><a href="{{ url('/opd/search-patient') }}">Search Patient</a></li>
                <li><a href="{{ url('/opd/upcoming-appointments') }}">Appointments</a></li>
                <li><a href="{{ url('/opd/quick-view') }}">Quick View</a></li>
                <li><a href="{{ url('/opd/daily-estimate-register') }}">Daily Estimate Register</a></li>


            </ul>
        </div>


    </div>

@endsection