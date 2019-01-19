@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/ipd') }}">IPD Management Service</a></li>
                <li class="active">Search IPD</li>
            </ol>
        </div>
        @include('ipd.ipd-nav')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Search IPD</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/ipd/search-ipd') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('patientsearch') ? ' has-error' : '' }}">
                                <label for="patientsearch" class="col-md-4 control-label">Type and Hit Enter to Search</label>

                                <div class="col-md-6">
                                    <input id="patientsearch" type="text" class="form-control" name="patientsearch" value="{{ old('patientsearch') }}"  required>

                                    @if ($errors->has('patientsearch'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('patientsearch') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        @if($patients->count())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>Patient ID</td>
                                        <td>IPD</td>
                                        <td> Name</td>
                                        <td>address</td>
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
                                            <td><a  href="{{ url('ipd/view-ipd',$patient->id) }}" class="btn btn-default">View Details</a></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
