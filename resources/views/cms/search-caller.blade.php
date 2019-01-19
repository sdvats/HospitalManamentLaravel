@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/cms') }}">Caller Management Service</a></li>
                <li class="active">Search Caller</li>
            </ol>
        </div>
        @include('cms/cms-nav')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Search Caller</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/cms/search-caller') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('callersearch') ? ' has-error' : '' }}">
                                <label for="callersearch" class="col-md-4 control-label">Type and Hit Enter to Search</label>

                                <div class="col-md-6">
                                    <input id="callersearch" type="text" class="form-control" name="callersearch" value="{{ old('callersearch') }}"  required>

                                    @if ($errors->has('callersearch'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('callersearch') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                       @if($callers->count())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>First Name</td>
                                        <td>Last Name</td>
                                        <td>Mobile Number</td>
                                        <td>Email</td>
                                        <td>Date</td>
                                        <td>View</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($callers as $caller)
                                        <tr>
                                            <td>{{ $caller -> first_name  }}</td>
                                            <td>{{ $caller -> last_name  }}</td>
                                            <td>{{ $caller -> mobile  }}</td>
                                            <td>{{ $caller -> email  }}</td>
                                            <td>{{ $caller -> created_at  }}</td>
                                            <td><a  href="{{ url('cms/view-caller',$caller->id) }}" class="btn btn-default">View Details</a></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h3>No Data to Show Please Try Another String</h3>
                        @endif

                    </div>
                </div>
            </div>



        </div>



    </div>

@endsection
