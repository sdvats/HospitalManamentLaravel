@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/ipd') }}">IPD Management System</a></li>
                <li class="active">Ipd Reports</li>
            </ol>
        </div>
        @include('ipd.ipd-nav')
        <div class="row">
            <h3 class="text-center">Welcome to the reporting section of IPD Management System</h3>
            <ul>
                <li><a href="{{url('/ipd/ipd-list')}}">IPD List</a></li>
                <li><a href="{{url('/ipd/ipd-minor')}}">IPD Minor</a></li>
                <li><a href="{{url('/ipd/ipd-major')}}">IPD Major</a></li>
                <li><a href="{{ url('/ipd/download-records') }}">Download Records</a></li>
            </ul>
        </div>


    </div>

@endsection
