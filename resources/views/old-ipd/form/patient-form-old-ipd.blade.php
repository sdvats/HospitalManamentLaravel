    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('ipd_no') ? ' has-error' : '' }}">
        {!! Form::label('ipd_no','IPD No:',array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6">
            {!! Form::text('ipd_no',null,array('class' => 'form-control','required' => 'required','id' => 'ipd_no','autofocus')) !!}

            @if ($errors->has('ipd_no'))
                <span class="help-block">
                    <strong>{{ $errors->first('ipd_no') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('ipd_no') ? ' has-error' : '' }}">
        <label for="date" class="col-md-4 control-label">Date</label>
        <div class="col-md-6">
            <div class="input-append date" id="datetimepicker">
                {!! Form::date('date',null,array('class' => 'form-control','required' => 'required','id' => 'date')) !!}
                <span class="add-on"><i class="icon-remove"></i></span>
                <span class="add-on"><i class="icon-th"></i></span>
            </div>
            @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
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
            {!! Form::text('last_name',null,array('class' => 'form-control','required' => 'required','id' => 'last_name')) !!}

            @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
        <label for="Age" class="col-md-4 control-label">Age</label>
        <div class="col-md-6">

            {!! Form::number('age',null,array('class' => 'form-control','required' => 'required','id' => 'age')) !!}

            @if ($errors->has('age'))
                <span class="help-block">
                    <strong>{{ $errors->first('age') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
        <label for="Gender" class="col-md-4 control-label">Gender</label>
        <div class="col-md-6">
            {!! Form::select('gender',['Male'=>'Male','Female'=>'Female','Male to Female'=>'Male to Female','Female to Male'=>'Female to Male'],null,array('class' => 'form-control','required' => 'required','id' => 'gender')) !!}

            @if ($errors->has('gender'))
                <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('contact_1') ? ' has-error' : '' }}">
        <label for="Contact Number 1" class="col-md-4 control-label">Contact Number #1</label>
        <div class="col-md-6">
            {!! Form::number('contact_1',null,array('class' => 'form-control','id' => 'contact_1')) !!}
            @if ($errors->has('contact_1'))
                <span class="help-block">
                    <strong>{{ $errors->first('contact_1') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('contact_2') ? ' has-error' : '' }}">
        <label for="Contact Number 2" class="col-md-4 control-label">Contact Number #2</label>
        <div class="col-md-6">
            {!! Form::number('contact_2',null,array('class' => 'form-control','id' => 'contact_2')) !!}

            @if ($errors->has('contact_2'))
                <span class="help-block">
                    <strong>{{ $errors->first('contact_2') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
        <label for="country" class="col-md-4 control-label">Country</label>
        <div class="col-md-6">
            {!! Form::select('country',$country,null,array('class' => 'form-control','id' => 'country')) !!}

            @if ($errors->has('country'))
                <span class="help-block">
                    <strong>{{ $errors->first('country') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
        <label for="country" class="col-md-4 control-label">State</label>
        <div class="col-md-6">
            {!! Form::select('state',$state,null,array('class' => 'form-control','id' => 'state','disabled' => 'disabled')) !!}

            @if ($errors->has('state'))
                <span class="help-block">
                    <strong>{{ $errors->first('state') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('procedure_list') ? ' has-error' : '' }}">
        <label for="procedure_list[]" class="col-md-4 control-label">Procedures</label>
        <div class="col-md-6">
            {!! Form::select('procedure_list[]',$procedures,null,array('id' => 'js-example-placeholder-multiple','class' => 'form-control','multiple')) !!}

            @if ($errors->has('procedure_list'))
                <span class="help-block">
                    <strong>{{ $errors->first('procedure_list') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
        <label for="Remarks" class="col-md-4 control-label">Remarks</label>
        <div class="col-md-6">
            {!! Form::textarea('remarks',null,array('class' => 'form-control','required' => 'required','id' => 'remarks')) !!}

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
