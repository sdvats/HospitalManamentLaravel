@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/opd') }}">OPD Management Service</a></li>
                <li class="active">View Patient</li>
            </ol>
        </div>
        @include('opd/opd-nav')
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <div id="alert" class="alert alert-dismissible fade in alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <button id="close" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                @endif
            @endforeach
        </div>
            <div class="col-md-8 col-md-offset-2 text-capitalize">
                <div class="panel panel-default">
                    <div class="panel-heading">View Patient</div>
                    <div class="panel-body">
                      <div class="row">
                          <div class="form-group">
                              <label class="col-md-3 control-label">Patient ID</label>
                              <div class="col-md-3">
                                  {{ $opdpatient -> patient_id }}
                              </div>
                          </div>
                      </div>
                      <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">First Name</label>
                                <div class="col-md-3">
                                    {{ $opdpatient -> first_name }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Last Name</label>
                                <div class="col-md-3">
                                    {{ $opdpatient -> last_name }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Gender</label>
                                <div class="col-md-3">
                                    {{ $opdpatient -> gender }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Age</label>
                                <div class="col-md-3">
                                  {{ Carbon\Carbon::parse($opdpatient -> birth_date)->diff(Carbon\Carbon::now())->format('%y years') }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">City</label>

                                <div class="col-md-6">
                                    {{ $opdpatient -> address }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Country</label>
                                <div class="col-md-3">
                                    {{ $opdpatient-> country }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email</label>
                                <div class="col-md-3">
                                    {{ $opdpatient -> email }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mobile</label>
                                <div class="col-md-3">
                                    {{ $opdpatient -> contact }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mode</label>
                                <div class="col-md-3">
                                    {{ $opdpatient -> mode }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Remarks</label>
                                <div class="col-md-6">
                                    {{ $opdpatient -> remarks }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Created By</label>
                                <div class="col-md-6">
                                    {{ $opdpatient -> created_by }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Date Added</label>
                                <div class="col-md-6">
                                    {{ Carbon\Carbon::parse($opdpatient->created_at)->format('d-m-Y') }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="row">
                                  <div class="col-md-2 col-md-offset-2">
                                      <a  href="{{ url('/opd/edit-patient',$opdpatient->id) }}" class="btn btn-info">Edit Patient</a>
                                  </div>
                                  <div class="col-md-3">
                                    <a  href="{{ url('/opd/make-appointment',$opdpatient->id) }}" class="btn btn-info">Make Appointment</a>
                                  </div>
                                  <div class="col-md-3">
                                    <a  href="{{ url('/ipd/create-ipd',$opdpatient->id) }}" class="btn btn-info">Create IPD</a>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Previous Appointments</div>
                    <div class="panel-body">
                      <div class="row">
                              <label class="col-md-1">No</label>
                              <label class="col-md-2">Date</label>
                              <label class="col-md-3">Estimates and Notes</label>
                              <label class="col-md-2">Created By</label>
                      </div>
                  <hr>
                        @if($appointments->count())
                            @foreach($appointments as $appointment)
                                <div class="panel">
                                        <div class="row">
                                          <label class="col-md-1 control-label">  {{$k++}}</label>
                                          <label class="col-md-2 control-label">  {{$appointment -> appt_datetime}}</label>
                                          <label class="col-md-3 control-label">  {{$appointment -> appt_note}}</label>
                                          <label class="col-md-2 control-label">  {{$appointment -> created_by }}</label>
                                        </div>
                                </div>
                            @endforeach
                        @else
                            <h3>No Appointmentss Available</h3>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Ipd records Informations -->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">IPD Records</div>
                    <div class="panel-body">
                            <div class="row">
                                    <label class="col-md-1">Ipd No</label>
                                    <label class="col-md-2">Attendent Name</label>
                                    <label class="col-md-2">Procedure type</label>
                                    <label class="col-md-3">Admission Date</label>
                                    <label class="col-md-2">Created By</label>
                            </div>
                        <hr>
                        @if($ipdpatients->count())
                            @foreach($ipdpatients as $ipdpatient)
                                <div class="row">
                                        <label class="col-md-1 control-label">{{ $ipdpatient -> ipd_no }}</label>
                                        <label class="col-md-2 control-label">{{ $ipdpatient -> attendent_name }}</label>
                                        <label class="col-md-2 control-label">{{ $ipdpatient -> procedure_type }}</label>
                                        <label class="col-md-3 control-label">{{ $ipdpatient -> admision_date }}</label>
                                        <label class="col-md-2 control-label">{{ $ipdpatient -> created_by }}</label>
                                        <div class="col-md-1">
                                            <td><a  href="{{ url('ipd/view-ipd',$ipdpatient->id) }}" class="btn btn-default">View</a></td>
                                        </div>
                                </div>
                            @endforeach
                        @else
                            <h3>No Ipd Records found for this patient</h3>
                        @endif

                    </div>
                </div>
            </div>
            <!-- Estimate Information ends here -->
            <!-- Estimate Information Informations -->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Estimates Given</div>
                    <div class="panel-body">
                            <div class="row">
                                    <label class="col-md-1">No</label>
                                    <label class="col-md-2">Amount</label>
                                    <label class="col-md-3">Note</label>
                                    <label class="col-md-2">Date</label>
                                    <label class="col-md-2">Created By</label>
                            </div>
                        <hr>
                        @if($estimates->count())
                            @foreach($estimates as $estimate)
                                <div class="row">
                                        <label class="col-md-1 control-label">{{ $i++ }}</label>
                                        <label class="col-md-2 control-label">{{ $estimate -> amount.' '.$estimate->currency }}</label>
                                        <label class="col-md-3 control-label">{{ $estimate -> payment_note }}</label>
                                        <label class="col-md-2 control-label">{{ $estimate -> updated_at }}</label>
                                        <label class="col-md-2 control-label">{{ $estimate -> created_by }}</label>
                                        <div class="col-md-1">
                                            <a  href="{{ url('/opd/edit-estimate',$estimate->id) }}" class="btn btn-info">Edit</a>
                                        </div>
                                </div>
                            @endforeach
                                <hr>
                                <label  class="col-md-3 control-label">Total Amount:</label><label class="col-md-3 control-label"> {{ $estimates -> sum('amount').' '.$estimate->currency }}</label>
                                <br>
                                <hr>
                        @else
                            <h3>No Estimates Added</h3>
                        @endif
                        <div class="row">
                            <div class="col-md-3 col-md-offset-4">
                                <a  href="{{ url('/opd/add-estimate',$opdpatient->id) }}" class="btn btn-info">Add Estimate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Estimate Information ends here -->

            <!-- Payment Received Information Informations -->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Payments Received</div>
                    <div class="panel-body">
                        <div class="row">
                            <label class="col-md-1">No</label>
                            <label class="col-md-2">Amount</label>
                            <label class="col-md-3">Note</label>
                            <label class="col-md-2">Received</label>
                            <label class="col-md-2">By</label>
                        </div>
                        <hr>
                        @if($payments->count())
                            @foreach($payments as $payment)
                                <div class="row">
                                    <label class="col-md-1 control-label">{{ $j++ }}</label>
                                    <label class="col-md-2 control-label">{{ $payment -> amount.' '.$payment->currency }}</label>
                                    <label class="col-md-3 control-label">{{ $payment -> payment_note }}</label>
                                    <label class="col-md-2 control-label">{{ $payment -> updated_at }}</label>
                                    <label class="col-md-2 control-label">{{ $payment -> created_by }}</label>
                                    <div class="col-md-1">
                                        <a  href="{{ url('/opd/edit-payment',$payment->id) }}" class="btn btn-info">Edit</a>
                                    </div>
                                </div>
                            @endforeach
                            <hr>
                            <label  class="col-md-3 control-label">Total Amount:</label><label class="col-md-3 control-label"> {{ $payments -> sum('amount').' '.$payment->currency }}</label>
                            <br>
                            <hr>
                        @else
                            <h3>No Payments Received</h3>
                        @endif
                        <div class="row">
                            <div class="col-md-3 col-md-offset-4">
                                <a  href="{{ url('/opd/add-payment',$opdpatient->id) }}" class="btn btn-info">Add payment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Payment Received Information ends here -->
            <!-- Documents Added-->
            <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Documents Added</div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <div class="row">
                                    <label class="col-md-1">No</label>
                                    <label class="col-md-3">Document</label>
                                    <label class="col-md-2">Link</label>
                                    <label class="col-md-2">Uploaded On</label>
                                    <label class="col-md-2">Uploaded By</label>
                                </div>
                                <hr>
                                @if($documents->count())
                                    @foreach($documents as $document)
                                        <div class="row">
                                            <label class="col-md-1 control-label">{{ $l++ }}</label>
                                            <label class="col-md-3 control-label">{{ $document -> doc_name }}</label>
                                            <label class="col-md-2 control-label"><a href="{{ $document -> doc_url }}" download> View</a></label>
                                            <label class="col-md-2 control-label">{{ $document -> updated_at }}</label>
                                            <label class="col-md-2 control-label">{{ $document -> created_by }}</label>
                                            <div class="col-md-1">
                                                <a  href="{{ url('/opd/delete-document',$document->id) }}" class="btn btn-info">Delete</a>
                                            </div>
                                        </div>
                                        <br>
                                    @endforeach
                                @else
                                    <h3>No Documents Added!</h3>
                                @endif
                            </div>
                            <div class="col-md-3 col-md-offset-4">
                                <a  href="{{ url('/opd/add-document',$opdpatient->id) }}" class="btn btn-info">Add Document</a>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- Documents Added -->
            <!--Itinearary Informations -->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Itinerary</div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <div class="row">
                                <label class="col-md-1">No</label>
                                <label class="col-md-2">Arrival</label>
                                <label class="col-md-2">Departure</label>
                                <label class="col-md-3">Note</label>
                                <label class="col-md-2">created by</label>
                            </div>
                            <hr>
                            @if($itineraries->count())
                                @foreach($itineraries as $itinerary)
                                    <div class="row">
                                        <label class="col-md-1 control-label">{{ $m++ }}</label>
                                        <label class="col-md-2 control-label">{{ Carbon\Carbon::parse($itinerary -> arrival_date)->format('d-m-Y H:i:s') }}</label>
                                        <label class="col-md-2 control-label">{{ Carbon\Carbon::parse($itinerary -> departure_date)->format('d-m-Y H:i:s')  }}</label>
                                        <label class="col-md-3 control-label">{{ $itinerary->note }}</label>
                                        <label class="col-md-2 control-label">{{ $itinerary->created_by }}</label>
                                        <div class="col-md-1">
                                            <a  href="{{ url('/opd/delete-itinerary',$itinerary->id) }}" class="btn btn-info">Delete</a>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            @else
                                <h3>No Itinerary added!</h3>
                                <div class="col-md-3 col-md-offset-4">
                                    <a  href="{{ url('/opd/add-itinerary',$opdpatient->id) }}" class="btn btn-info">Add Itinerary</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Itinearary ends here -->
    </div>
@endsection
