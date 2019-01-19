{{ csrf_field() }}

<div class="form-group{{ $errors->has('from_date') ? ' has-error' : '' }}">
    <label for="From Date" class="col-md-4 control-label">From Date</label>
    <div class="col-md-6">
        <div class="input-append date" id="fromdatepicker">
            {!! Form::text('from_date',null,array('class' => 'form-control','id' => 'from_date','required')) !!}
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
        </div>
        @if ($errors->has('from_date'))
            <span class="help-block">
                    <strong>{{ $errors->first('from_date') }}</strong>
                </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('to_date') ? ' has-error' : '' }}">
    <label for="To Date" class="col-md-4 control-label">To Date</label>
    <div class="col-md-6">
        <div class="input-append date" id="todatepicker">
            {!! Form::text('to_date',null,array('class' => 'form-control','id' => 'to_date','required')) !!}
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
        </div>
        @if ($errors->has('to_date'))
            <span class="help-block">
                    <strong>{{ $errors->first('to_date') }}</strong>
                </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('procedure_type') ? ' has-error' : '' }}">
    <label for="Procedure Type" class="col-md-4 control-label">Procedure Type</label>
    <div class="col-md-6">
        {!! Form::select('procedure_type',['Major'=>'Major','Minor'=>'Minor','IPD' => 'IPD'],null,array('class' => 'form-control','required' => 'required','id' => 'procedure_type')) !!}

        @if ($errors->has('procedure_type'))
            <span class="help-block">
                    <strong>{{ $errors->first('procedure_type') }}</strong>
                </span>
        @endif
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitButtontext,array('class'=>'btn btn-primary')) !!}
    </div>
</div>
