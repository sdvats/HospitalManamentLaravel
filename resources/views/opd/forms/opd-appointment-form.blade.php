{{ csrf_field() }}

<div class="form-group{{ $errors->has('patient_id') ? ' has-error' : '' }}">
    <label for="Patient ID" class="col-md-4 control-label">Patient ID</label>

    <div class="col-md-6">
        {!! Form::text('patient_id',$opdpatient -> patient_id,array('class' => 'form-control','disabled')) !!}
        @if ($errors->has('patient_id'))
            <span class="help-block">
                <strong>{{ $errors->first('patient_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('patient_name') ? ' has-error' : '' }}">
    <label for="Patient ID" class="col-md-4 control-label">Patient Name</label>

    <div class="col-md-6">
        {!! Form::text('patient_name',$opdpatient -> first_name.'  '.$opdpatient -> last_name,array('class' => 'form-control','disabled')) !!}
        @if ($errors->has('patient_name'))
            <span class="help-block">
                <strong>{{ $errors->first('patient_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('appt_datetime') ? ' has-error' : '' }}">
    <label for="Datetime" class="col-md-4 control-label">Date and Time</label>

    <div class="col-md-6">
        <div class="input-append date" id="datetimepicker" data-date="12-02-2012">
            {!! Form::date('appt_datetime',null,array('class' => 'form-control')) !!}
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
        </div>
        @if ($errors->has('appt_datetime'))
            <span class="help-block">
                <strong>{{ $errors->first('appt_datetime') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('appt_note') ? ' has-error' : '' }}">
    <label for="Patient ID" class="col-md-4 control-label">Appointment Notes</label>

    <div class="col-md-6">
        {!! Form::textarea('appt_note',null,array('class' => 'form-control','rows'=>'3')) !!}
        @if ($errors->has('appt_note'))
            <span class="help-block">
                <strong>{{ $errors->first('appt_note') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitButtontext,array('class'=>'btn btn-primary')) !!}
    </div>
</div>