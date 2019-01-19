{{ csrf_field() }}

<div class="form-group{{ $errors->has('patient_id') ? ' has-error' : '' }}">
    <label for="Patient ID" class="col-md-4 control-label">Patient ID</label>

    <div class="col-md-6">
        {!! Form::text('patient_id',null,array('class' => 'form-control','id' => 'patient_id','autofocus')) !!}
        @if ($errors->has('patient_id'))
            <span class="help-block">
                <strong>{{ $errors->first('patient_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
    <label for="First Name" class="col-md-4 control-label">First Name</label>

    <div class="col-md-6">
        {!! Form::text('first_name',null,array('class' => 'form-control','required' => 'required','id' => 'first_name')) !!}
        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
    <label for="Last Name" class="col-md-4 control-label">Last Name</label>

    <div class="col-md-6">
        {!! Form::text('last_name',null,array('class' => 'form-control','id' => 'last_name')) !!}
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
        {!! Form::select('gender',['Male'=>'Male','Female'=>'Female','Transgender' => 'Transgender'],null,array('class' => 'form-control','placeholder' => 'Please Select','id' => 'gender')) !!}

        @if ($errors->has('gender'))
            <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
    <label for="Birth Date" class="col-md-4 control-label">Birth Date</label>
    <div class="col-md-6">
        <div class="input-append date" id="birthdatetimepicker">
            {!! Form::text('birth_date',null,array('class' => 'form-control','id' => 'birth_date')) !!}
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
        </div>
        @if ($errors->has('birth_date'))
            <span class="help-block">
                    <strong>{{ $errors->first('birth_date') }}</strong>
                </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('group') ? ' has-error' : '' }}">
    <label for="Group" class="col-md-4 control-label">Group</label>
    <div class="col-md-6">
        {!! Form::select('group',['Normal'=>'Normal','Trans (MTF)'=>'Trans (MTF)','Trans (FTM)' => 'Trans (FTM)'],null,array('class' => 'form-control','placeholder' => 'Please Select','id' => 'gender')) !!}

        @if ($errors->has('group'))
            <span class="help-block">
                    <strong>{{ $errors->first('group') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label for="address" class="col-md-4 control-label">Address</label>

    <div class="col-md-6">
        {!! Form::text('address',null,array('class' => 'form-control','id' => 'address')) !!}
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
    <label for="country" class="col-md-4 control-label">Country</label>

    <div class="col-md-6">
        {!! Form::select('country',$country,null,array('class' => 'form-control','required','placeholder' => 'Please Select')) !!}

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
        {!! Form::email('email',null,array('class' => 'form-control','id' => 'email','pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$')) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
    <label for="Contact" class="col-md-4 control-label">Mobile Number</label>

    <div class="col-md-6">
        {!! Form::text('contact',old('contact'),array('class' => 'form-control','id' => 'contact')) !!}
        @if ($errors->has('contact'))
            <span class="help-block">
                <strong>{{ $errors->first('contact') }}</strong>
            </span>
        @endif
    </div>
</div>



<div class="form-group">
    <label for="mode" class="col-md-4 control-label">Mode</label>

    <div class="col-md-6">
        {!! Form::select('mode',['Newspaper'=>'Newspaper','Website'=>'Website','Friends'=>'Friends'],null,array('class' => 'form-control','placeholder' => 'Please Select','id' => 'mode')) !!}
        @if ($errors->has('mode'))
            <span class="help-block">
                <strong>{{ $errors->first('mode') }}</strong>
            </span>
        @endif
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
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitButtontext,array('class'=>'btn btn-primary')) !!}
    </div>
</div>
