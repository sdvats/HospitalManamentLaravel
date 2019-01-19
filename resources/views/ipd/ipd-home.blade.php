@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li class="active">IPD Management System</li>
            </ol>
        </div>
        @include('ipd.ipd-nav')
        <div class="row">
            <h3 class="text-center">Welcome to the  IPD Management System</h3>
            <p class="text-info ">You can now Add patient from  IPD records here, Edit patient and Get detailed report on specific filter basis</p>
            <ul>
                <li><a href="{{url('/ipd/search-ipd')}}">Search IPD</a></li>
                <li><a href="{{url('/ipd/ipd-list')}}">IPD List</a></li>
                <li><a href="{{url('/ipd/ipd-minor')}}">IPD Minor</a></li>
                <li><a href="{{url('/ipd/ipd-major')}}">IPD Major</a></li>
                <li><a href="{{ url('/ipd/download-records') }}">Download Records</a></li>
                @if(Entrust::hasRole('admin'))
                <li><a href="{{ url('/ipd/add-procedure') }}">Add procedure</a></li>
                @endif




            </ul>
        </div>


    </div>

@endsection
