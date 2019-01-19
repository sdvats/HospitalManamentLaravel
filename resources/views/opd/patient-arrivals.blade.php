@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">OPD Management Service</a></li>
                <li class="active">Patient Arrivals</li>
            </ol>
        </div>
        @include('opd/opd-nav')

        <div class="row">
            @include('opd/quick-view-left-sidebar')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Scheduled Arrivals of Patients</div>
                    <div class="panel-body">
                        @if($itineraries->count())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>First Name</td>
                                        <td>Last Name</td>
                                        <td>Mobile Number</td>
                                        <td>Email</td>
                                        <td>Arriving On</td>
                                        <td>View</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($itineraries as $itinerary)
                                        <tr>
                                            <td> {{ $itinerary->opdpatient -> patient_id }}).</td>
                                            <td>{{ $itinerary->opdpatient -> first_name  }}</td>
                                            <td>{{ $itinerary->opdpatient -> last_name  }}</td>
                                            <td>{{ $itinerary->opdpatient -> contact  }}</td>
                                            <td>{{ $itinerary->opdpatient -> email  }}</td>
                                            <td>{{ $itinerary->arrival_date  }}</td>
                                            <td><a  href="{{ url('opd/view-patient',$itinerary->opdpatient->id) }}" class="btn btn-default">View Details</a></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                            {{ $itineraries -> links() }}

                        @else
                            <h3>No Data to Show Please Try Another String</h3>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
