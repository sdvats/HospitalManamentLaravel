@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/cms') }}">Caller Management Service</a></li>
                <li class="active">View Caller</li>
            </ol>
        </div>
        @include('cms/cms-nav')
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
                    <div class="panel-heading">View Caller</div>
                    <div class="panel-body">



                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    {{ $caller -> first_name }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    {{ $caller -> last_name }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6 hi">
                                    {{ $caller -> gender }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">City</label>

                                <div class="col-md-6">
                                    {{ $caller -> city }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Country</label>

                                <div class="col-md-6">
                                    {{ $caller -> country }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    {{ $caller -> email }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Mobile</label>

                                <div class="col-md-6">
                                    {{ $caller -> mobile }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Mode</label>

                                <div class="col-md-6">
                                    {{ $caller -> mode }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Procedure</label>

                                <div class="col-md-6">
                                    {{ $caller -> procedure }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Detail</label>

                                <div class="col-md-6">
                                    {{ $caller -> detail }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    {{ $caller -> gender }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phase</label>

                                <div class="col-md-6">
                                    {{ $caller -> phase }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Remarks</label>

                                <div class="col-md-6">
                                    {{ $caller -> remarks }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Reminder</label>

                                <div class="col-md-6">
                                    @if($caller -> reminder == 1)
                                        Yes
                                        @else
                                        No
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">First Reminder</label>

                                <div class="col-md-6">
                                    {{ $caller -> first_reminder }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Second Reminder</label>

                                <div class="col-md-6">
                                    {{ $caller -> second_reminder }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Third Reminder</label>

                                <div class="col-md-6">
                                    {{ $caller -> third_reminder }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Booked?</label>

                                <div class="col-md-6">
                                    @if($caller -> booked == 1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Date Added</label>

                                <div class="col-md-6">
                                    {{ $caller -> created_at }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                          <div class="row">
                              <div class="col-md-2 col-md-offset-1">
                                  <a  href="{{ url('/cms/edit-caller',$caller->id) }}" class="btn btn-info">Edit Caller</a>
                              </div>
                              <div class="col-md-2 col-md-offset-1">
                                  <a  href="{{ url('/cms/add-caller-notes',$caller->id) }}" class="btn btn-info">Add Notes</a>
                              </div>
                              <div class="col-md-2 col-md-offset-1">
                                  @if( $caller -> reminder == 1)
                                  <a  href="{{ url('/cms/remove-reminder',$caller->id) }}" class="btn btn-info">Remove Reminder</a>
                                     @else
                                      <a  href="{{ url('/cms/set-reminder',$caller->id) }}" class="btn btn-info">Set Reminder</a>
                                      @endif
                              </div>
                              <div class="col-md-2 col-md-offset-1">
                                  <a  href="{{ url('/cms/booked',$caller->id) }}" class="btn btn-info">Booked</a>
                              </div>


                          </div>

                        </div>
                        <hr>
                        <strong>Caller Notes Here</strong>
                        <hr>

                        @if($callernotes->count())
                            @foreach($callernotes as $callernote)
                            <div class="panel">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">No</label>

                                        <div class="col-md-6">
                                            {{$i++}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Date</label>

                                        <div class="col-md-6">
                                            {{$callernote -> created_at}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Note</label>

                                        <div class="col-md-6">
                                            {{$callernote -> caller_note}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <h3>No Notes Available</h3>
                        @endif



                    </div>
                </div>
            </div>



        </div>


    </div>

@endsection
