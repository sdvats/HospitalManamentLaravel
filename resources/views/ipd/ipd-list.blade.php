@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/ipd') }}">IPD Management Service</a></li>
                <li class="active">IPD List</li>
            </ol>
        </div>
        @include('ipd.ipd-nav')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">IPD List</div>
                    <div class="panel-body">

                        @if($patients->count())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>Patient ID</td>
                                        <td>IPD</td>
                                        <td>Name</td>
                                        <td>Address</td>
                                        <td>Date</td>
                                        <td>View</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($patients as $patient)
                                        <tr>
                                            <td>{{ $patient -> opdpatient -> patient_id  }}</td>
                                            <td>{{ $patient ->  ipd_no }}</td>
                                            <td>{{ $patient -> opdpatient -> first_name .' '. $patient -> opdpatient -> last_name }}</td>
                                            <td>{{ $patient -> opdpatient -> address  }}</td>
                                            <td>{{ $patient -> procedure_date  }}</td>
                                            <td><a  href="{{ url('ipd/view-ipd',$patient->id) }}" class="btn btn-default">View Details</a></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $patients -> links()   }}
                            </div>
                        @else
                            <h3>No Data to Show Please Try Another String</h3>
                        @endif

                    </div>
                </div>
            </div>



        </div>



    </div>

@endsection
