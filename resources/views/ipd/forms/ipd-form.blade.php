{{ csrf_field() }}

<div class="form-group{{ $errors->has('ipd_no') ? ' has-error' : '' }}">
    <label for="Patient ID" class="col-md-4 control-label">IPD No</label>

    <div class="col-md-6">
        {!! Form::text('ipd_no',null,array('class' => 'form-control','required' => 'required','id' => 'ipd_no','autofocus')) !!}
        @if ($errors->has('ipd_no'))
            <span class="help-block">
                <strong>{{ $errors->first('ipd_no') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('attendent_name') ? ' has-error' : '' }}">
    <label for="Attendent Name" class="col-md-4 control-label">Attendent (Full Name)</label>

    <div class="col-md-6">
        {!! Form::text('attendent_name',null,array('class' => 'form-control','id' => 'attendent_name','autofocus')) !!}
        @if ($errors->has('attendent_name'))
            <span class="help-block">
                <strong>{{ $errors->first('attendent_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('procedure_type') ? ' has-error' : '' }}">
    <label for="Procedure Type" class="col-md-4 control-label">Procedure Type</label>
    <div class="col-md-6">
        {!! Form::select('procedure_type',['Major'=>'Major','Minor'=>'Minor'],null,array('class' => 'form-control','required' => 'required','id' => 'procedure_type')) !!}

        @if ($errors->has('procedure_type'))
            <span class="help-block">
                    <strong>{{ $errors->first('procedure_type') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('anesthesia') ? ' has-error' : '' }}">
    <label for="Gender" class="col-md-4 control-label">Anesthesia</label>
    <div class="col-md-6">
        {!! Form::select('anesthesia',['GA'=>'GA','LA'=>'LA','EP'=>'EP'],null,array('class' => 'form-control','required' => 'required','id' => 'anesthesia')) !!}

        @if ($errors->has('anesthesia'))
            <span class="help-block">
                    <strong>{{ $errors->first('anesthesia') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('admision_date') ? ' has-error' : '' }}">
    <label for="Admision Date" class="col-md-4 control-label">Admission Date</label>
    <div class="col-md-6">
        <div class="input-append date" id="admissiondatetimepicker">
            {!! Form::text('admision_date',null,array('class' => 'form-control','id' => 'admision_date')) !!}
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
        </div>
        @if ($errors->has('admision_date'))
            <span class="help-block">
                    <strong>{{ $errors->first('admision_date') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('ipdprocedure_list') ? ' has-error' : '' }}">
    <label for="ipdprocedure_list[]" class="col-md-4 control-label">Procedures</label>
    <div class="col-md-6">
        {!! Form::select('ipdprocedure_list[]',$ipdprocedures,null,array('id' => 'js-example-placeholder-multiple','class' => 'form-control','multiple')) !!}

        @if ($errors->has('ipdprocedure_list'))
            <span class="help-block">
                    <strong>{{ $errors->first('ipdprocedure_list') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('procedure_date') ? ' has-error' : '' }}">
    <label for="Procedure Date" class="col-md-4 control-label">Procedure Date</label>
    <div class="col-md-6">
        <div class="input-append date" id="proceduredatetimepicker">
            {!! Form::text('procedure_date',null,array('class' => 'form-control','required' => 'required','id' => 'procedure_date')) !!}
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
        </div>
        @if ($errors->has('procedure_date'))
            <span class="help-block">
                    <strong>{{ $errors->first('procedure_date') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
    <label for="Remarks" class="col-md-4 control-label">Remarks</label>
    <div class="col-md-6">
        {!! Form::textarea('remarks',null,array('class' => 'form-control','id' => 'remarks','rows' => '5')) !!}

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
