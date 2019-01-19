@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li class="active">OLD IPD Management System</li>
            </ol>
        </div>
        @include('old-ipd/old-ipd-nav')
        <div class="row">
            <h3 class="text-center">Welcome to the OLD IPD Management System</h3>
            <p class="text-info ">You can now Add patient from old IPD records here, Edit patient and Get detailed report on specific filter basis</p>
            <ul>
                <li><a href="{{ url('/old-ipd/add-patient') }}">Add Patient</a></li>
                <li><a href="{{url('/old-ipd/search-patient')}}">Search Patient</a></li>
                <li><a href="{{ url('/old-ipd/reports') }}">Generate Reports</a></li>

            </ul>
        </div>


    </div>

@endsection