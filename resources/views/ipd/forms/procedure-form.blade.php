<div class="form-group{{ $errors->has('ipdprocedure_name') ? ' has-error' : '' }}">
    <label for="Procedure Name" class="col-md-4 control-label">Procedure Name</label>

    <div class="col-md-6">
        {!! Form::text('ipdprocedure_name',null,array('class' => 'form-control','required' => 'required','id' => 'ipdprocedure_name','autofocus')) !!}
        @if ($errors->has('ipdprocedure_name'))
            <span class="help-block">
                <strong>{{ $errors->first('ipdprocedure_name') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitButtontext,array('class'=>'btn btn-primary')) !!}
    </div>
</div>
