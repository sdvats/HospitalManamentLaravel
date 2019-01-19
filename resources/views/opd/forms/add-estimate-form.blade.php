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

<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
    <label for="amount" class="col-md-4 control-label">Amount</label>

    <div class="col-md-6">
        {!! Form::number('amount',null,array('class' => 'form-control')) !!}
        @if ($errors->has('amount'))
            <span class="help-block">
                <strong>{{ $errors->first('amount') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('currency') ? ' has-error' : '' }}">
    <label for="currency" class="col-md-4 control-label">Currency</label>

    <div class="col-md-6">
        {!! Form::select('currency',['INR' => 'INR','AUD' => 'AUD','EUR' => 'EUR','GBP' => 'GBP','USD' => 'USD  '],null,array('class' => 'form-control')) !!}
        @if ($errors->has('currency'))
            <span class="help-block">
                <strong>{{ $errors->first('currency') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('payment_note') ? ' has-error' : '' }}">
    <label for="Payment Note" class="col-md-4 control-label">Payment Note</label>

    <div class="col-md-6">
        {!! Form::textarea('payment_note','Procedure + Any Remark',array('class' => 'form-control','rows'=>'3')) !!}
        @if ($errors->has('payment_note'))
            <span class="help-block">
                <strong>{{ $errors->first('payment_note') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitButtontext,array('class'=>'btn btn-primary')) !!}
    </div>
</div>