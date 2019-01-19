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

<div class="form-group{{ $errors->has('arrival_date') ? ' has-error' : '' }}">
    <label for="arrival_date" class="col-md-4 control-label">Arrival Date</label>

    <div class="col-md-6">
        <div class="input-append date" id="datetimepicker">
            {!! Form::text('arrival_date',null,array('class' => 'form-control','id' => 'arrival_date','required'=>'required')) !!}
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
        </div>
        @if ($errors->has('arrival_date'))
            <span class="help-block">
                <strong>{{ $errors->first('arrival_date') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('departure_date') ? ' has-error' : '' }}">
    <label for="departure_date" class="col-md-4 control-label">Departure Date</label>

    <div class="col-md-6">
        <div class="input-append date" id="datetimepicker1">
            {!! Form::text('departure_date',null,array('class' => 'form-control','id' => 'departure_date','required'=>'required')) !!}
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
        </div>
        @if ($errors->has('departure_date'))
            <span class="help-block">
                <strong>{{ $errors->first('departure_date') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
    <label for="note" class="col-md-4 control-label">Itinerary Notes</label>

    <div class="col-md-6">
        {!! Form::textarea('note',null,array('class' => 'form-control','rows'=>'3')) !!}
        @if ($errors->has('note'))
            <span class="help-block">
                <strong>{{ $errors->first('note') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitButtontext,array('class'=>'btn btn-primary')) !!}
    </div>
</div>