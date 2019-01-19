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

<div class="form-group{{ $errors->has('doc_name') ? ' has-error' : '' }}">
    <label for="doc_name" class="col-md-4 control-label">Document Name</label>

    <div class="col-md-6">
        {!! Form::text('doc_name',null,array('class' => 'form-control')) !!}
        @if ($errors->has('doc_name'))
            <span class="help-block">
                <strong>{{ $errors->first('doc_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('currency') ? ' has-error' : '' }}">
    <label for="file" class="col-md-4 control-label">File</label>

    <div class="col-md-6">
        {!! Form::file('file') !!}

        @if ($errors->has('file'))
            <span class="help-block">
                <strong>{{ $errors->first('file') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitButtontext,array('class'=>'btn btn-primary')) !!}
    </div>
</div>