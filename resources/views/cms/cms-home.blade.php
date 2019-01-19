@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li class="active">Call Managment Service</li>
            </ol>
        </div>
        @include('cms/cms-nav')
        <div class="row">
            <h3 class="text-center">Welcome to the Call Managment Service</h3>
            <p class="text-info ">You can now Add Caller, Manage Caller(Edit, Delete,Add reminder, Make Appointment) and Get detailed report on specific filter basis</p>
            <ul>
                <li><a href="{{ url('/cms/add-caller') }}">Add Caller</a></li>
                <li><a href="{{url('/cms/search-caller')}}">Search Caller</a></li>
                <li><a href="{{ url('/cms/reports') }}">Generate Reports</a></li>

            </ul>
        </div>


    </div>

@endsection