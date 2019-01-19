@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/old-ipd') }}">Old IPD Management Service</a></li>
                <li class="active">View Old Patient</li>
            </ol>
        </div>
        @include('old-ipd/old-ipd-nav')
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <div id="alert" class="alert alert-dismissible fade in alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <button id="close" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                @endif
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">View Old Patient</div>
                    <div class="panel-body">



                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">IPD No</label>

                                <div class="col-md-6">
                                    {{ $oldpatient -> ipd_no }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Date</label>

                                <div class="col-md-6">
                                    {{ $oldpatient -> date }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    {{ $oldpatient -> first_name }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    {{ $oldpatient -> last_name }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Age</label>

                                <div class="col-md-6 hi">
                                    {{ $oldpatient -> age }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    {{ $oldpatient -> gender }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Contact #1</label>

                                <div class="col-md-6">
                                    {{ $oldpatient -> contact_1 }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Contact #2</label>

                                <div class="col-md-6">
                                    @if(count($oldpatient->contact_2) == 0)
                                        Null
                                    @else
                                        {{ $oldpatient->contact_2}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Country</label>
                                <div class="col-md-6">
                                        {{ $country[0] }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">State</label>

                                <div class="col-md-6">
                                    @if(count($state) == 0)
                                        Null
                                        @else
                                        {{ $state[0] }}
                                        @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Remarks</label>

                                <div class="col-md-6">
                                    {{ $oldpatient -> remarks }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Procedure</label>

                                <div class="col-md-6">
                                        @foreach($oldpatient -> procedures as $procedure)
                                            <li>{{ $procedure -> procedure_name }}</li>
                                            @endforeach
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-5">
                                    <a  href="{{ url('/old-ipd/edit-patient',$oldpatient->id) }}" class="btn btn-info">Edit Patient</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
