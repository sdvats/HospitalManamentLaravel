@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/cms') }}">Caller Management Service</a></li>
                <li class="active">Add Caller Note</li>
            </ol>
        </div>
        @include('cms/cms-nav')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Caller Note</div>
                    <div class="panel-body">
                        {!! Form::open(array('method'=>'post','url' => ['/cms/add-caller-notes',$caller->id],'class' => 'form-horizontal')) !!}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Caller Id</label>

                            <div class="col-md-6">
                                {{ $caller-> id }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="First Name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                {{ $caller-> first_name }}&nbsp;{{$caller -> last_name}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Added On</label>

                            <div class="col-md-6">
                                {{ $caller-> created_at }}
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('caller_note') ? ' has-error' : '' }}">
                            <label for="First Name" class="col-md-4 control-label">Note</label>

                            <div class="col-md-6">
                                <textarea id="caller_note" type="text" class="form-control" name="caller_note" required> Add Note About this Caller here
                                    </textarea>

                                @if ($errors->has('caller_note'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('caller_note') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Note
                                </button>
                            </div>
                        </div>


                        {!! Form::close() !!}


                    </div>
                </div>
            </div>



        </div>


    </div>

@endsection
