@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/cms') }}">Caller Management Service</a></li>
                <li class="active">Add Caller</li>
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
                    <div class="panel-heading">Add New Caller</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/cms/add-caller') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="First Name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="First Name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="Gender" class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    <select id="gender" class="form-control" name="gender" value="{{ old('gender') }}">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Male to Female">Male to Female</option>
                                        <option value="Female to Male">Female to Male</option>
                                    </select>

                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="City" class="col-md-4 control-label">City</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                <label for="country" class="col-md-4 control-label">Country</label>

                                <div class="col-md-6">
                                    <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}">

                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label for="mobile" class="col-md-4 control-label">Mobile Number</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="number" class="form-control" name="mobile">

                                    @if ($errors->has('mobile'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mode" class="col-md-4 control-label">Mode</label>

                                <div class="col-md-6">
                                    <select id="mode" class="form-control" name="mode" required>
                                        <option value="Email Tsw">Email Tsw</option>
                                        <option value="Email Ocs">Email Ocs</option>
                                        <option value="Email Htd">Email Htd</option>
                                        <option value="Practo">Practo</option>
                                        <option value="Justdial">Justdial</option>
                                        <option value="Transguys">Transguys</option>
                                        <option value="Sulekha">Sulekha</option>
                                        <option value="Mobile 145">Mobile 145</option>
                                        <option value="Mobile 401">Mobile 401</option>
                                        <option value="Landline">landline</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @if ($errors->has('mode'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mode') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="procedure" class="col-md-4 control-label">Procedure</label>

                                <div class="col-md-6">
                                    <select id="procedure" class="form-control" name="procedure" required>
                                        <option value="Hair Transplant">Hair Transplant</option>
                                        <option value="Rhinoplasty">Rhinoplasty</option>
                                        <option value="Blepharoplasty">Blepharoplasty</option>
                                        <option value="Ear Correction">Ear Correction</option>
                                        <option value="Face Lift">Face Lift</option>
                                        <option value="Lip Augmentation">Lip Augmentation</option>
                                        <option value="Lip Reduction">Lip Reduction</option>
                                        <option value="Jaw Correction">Jaw Correction</option>
                                        <option value="Dimple Creation">Dimple Creation</option>
                                        <option value="Laser Hair Removal">Laser Hair Removal</option>
                                        <option value="Fat Grafting">Fat Grafting</option>
                                        <option value="Chemical Peeling">Chemical Peeling</option>
                                        <option value="Mole Removal">Mole Removal</option>
                                        <option value="Vitiligo">Vitiligo</option>
                                        <option value="Birth Marks Removal">Birth Marks Removal</option>
                                        <option value="Tatto Removal">Tatto Removal</option>
                                        <option value="Breast Reduction">Breast Reduction</option>
                                        <option value="Breast Augmentation">Breast Augmentation</option>
                                        <option value="Breast Implant">Breast Implant</option>
                                        <option value="Breast Lift">Breast Lift</option>
                                        <option value="Nipple Correction">Nipple Correction</option>
                                        <option value="Nipple Reconstruction">Nipple Reconstruction</option>
                                        <option value="Gynecomastia">Gynecomastia</option>
                                        <option value="Liposuction">Liposuction</option>
                                        <option value="Tummy Tuck">Tummy Tuck</option>
                                        <option value="Hymenoplasty">Hymenoplasty</option>
                                        <option value="Vaginal Tightening">Vaginal Tightening</option>
                                        <option value="MRKH Syndrome">MRKH Syndrome</option>
                                        <option value="SRS Male to Female">SRS Male to Female</option>
                                        <option value="SRS Female to Male">SRS Female to Male</option>
                                        <option value="Facial Feminization">Facial Feminization</option>
                                        <option value="Forehead Correction">Forehead Correction</option>
                                        <option value="Buttock Enhancement">Buttock Enhancement</option>
                                        <option value="Chin Surgery">Chin Surgery</option>
                                        <option value="Adam's Apple Correction">Adam's Apple Correction</option>
                                        <option value="Voice Feminization">Voice Feminization</option>
                                        <option value="Top Surgery">Top Surgery</option>
                                        <option value="Phalloplasty Stage 1">Phalloplasty Stage 1</option>
                                        <option value="Phalloplasty Stage 2">Phalloplasty Stage 2</option>
                                        <option value="Scrotoplasty">Scrotoplasty</option>
                                        <option value="Hysterectomy">Hysterectomy</option>
                                        <option value="Metoidioplasty">Metoidioplasty</option>
                                        <option value="Vaginectomy">Vaginectomy</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @if ($errors->has('procedure'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('procedure') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="detail" class="col-md-4 control-label">Details Sent</label>

                                <div class="col-md-1">
                                    <input type="hidden" id="detail" class="form-control" name="detail" value="" >
                                    <input type="checkbox" id="detail" class="form-control" name="detail" value="Email" >Email
                                </div>
                                <div class="col-md-1">
                                    <input type="hidden" id="detail" class="form-control" name="detail1" value="" >
                                    <input type="checkbox" id="detail" class="form-control" name="detail1" value="SMS" >SMS
                                </div>
                                <div class="col-md-1">
                                    <input type="hidden" id="detail" class="form-control" name="detail2" value="" >
                                    <input type="checkbox" id="detail" class="form-control" name="detail2" value="Call" >Call
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" id="detail" class="form-control" name="detail3" value="" >
                                    <input type="checkbox" id="detail" class="form-control" name="detail3" value="Whatsapp" >Whatsapp
                                </div>
                                @if ($errors->has('detail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('detail') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="phase" class="col-md-4 control-label">Phase</label>

                                <div class="col-md-2">
                                    <input type="radio" id="phase" class="form-control" name="phase" value="Initial" >Initial
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="phase" class="form-control" name="phase" value="50-50" >50-50
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="phase" class="form-control" name="phase" value="Ready" >Ready to Book
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
                                <label for="remarks" class="col-md-4 control-label">Remarks</label>

                                <div class="col-md-6">
                                    <textarea cols="10" rows="5" id="remarks" class="form-control" name="remarks">Remarks + Any Estimate Given</textarea>
                                    @if ($errors->has('remarks'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('remarks') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="reminder" class="col-md-4 control-label">Reminder?</label>

                                <div class="col-md-1">
                                    <input type='hidden' value='0' name='reminder'>

                                    <input type="checkbox" id="reminder" class="form-control" name="reminder" value="1">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add Caller
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>


    </div>

@endsection
