@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">OPD Management Service</a></li>
                <li class="active">Quick View</li>
            </ol>
        </div>
        @include('opd/opd-nav')

        <div class="row">
            @include('opd/quick-view-left-sidebar')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">All Patienta</div>
                    <div class="panel-body">
                        @if($opdpatients->count())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>First Name</td>
                                        <td>Last Name</td>
                                        <td>Mobile Number</td>
                                        <td>Email</td>
                                        <td>Date</td>
                                        <td>View</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($opdpatients as $opdpatient)
                                        <tr>
                                            <td> {{ $opdpatient -> patient_id }}).</td>
                                            <td>{{ $opdpatient -> first_name  }}</td>
                                            <td>{{ $opdpatient -> last_name  }}</td>
                                            <td>{{ $opdpatient -> contact  }}</td>
                                            <td>{{ $opdpatient -> email  }}</td>
                                            <td>{{ $opdpatient -> created_at  }}</td>
                                            <td><a  href="{{ url('opd/view-patient',$opdpatient->id) }}" class="btn btn-default">View Details</a></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $opdpatients->links() }}
                        @else
                            <h3>No Data to Show Please Try Another String</h3>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
