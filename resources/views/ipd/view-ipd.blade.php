@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/old-ipd') }}"> IPD Management Service</a></li>
                <li class="active">View IPD</li>
            </ol>
        </div>
        @include('ipd/ipd-nav')
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <div id="alert" class="alert alert-dismissible fade in alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <button id="close" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                @endif
            @endforeach
        </div>
        @include('ipd.modal.delete-modal')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">View IPD</div>
                    <div class="panel-body">
                      <div class="row">
                          <div class="form-group">
                              <label class="col-md-4 control-label">Patient Id</label>

                              <div class="col-md-6">
                                  {{ $ipdpatient -> opdpatient-> patient_id }}
                              </div>
                          </div>
                      </div>
                      <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">IPD No</label>

                                <div class="col-md-6">
                                    {{ $ipdpatient -> ipd_no }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Full Name</label>

                                <div class="col-md-6">
                                    {{ $ipdpatient -> opdpatient -> first_name }} {{ $ipdpatient -> opdpatient -> last_name }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Attendent Name</label>

                                <div class="col-md-6">
                                    {{ $ipdpatient -> attendent_name }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    {{ $ipdpatient -> opdpatient -> gender }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Age</label>

                                <div class="col-md-6">
                                  {{ Carbon\Carbon::parse($ipdpatient -> opdpatient -> birth_date)->diff(Carbon\Carbon::now())->format('%y years') }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    {{ $ipdpatient -> opdpatient -> address }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Country</label>

                                <div class="col-md-6">
                                  {{$ipdpatient->opdpatient->country}}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Anesthesia</label>

                                <div class="col-md-6">
                                   {{ $ipdpatient -> anesthesia }}
                                </div>
                            </div>
                        </div>
                        <br>
                        @if($ipdpatient -> procedure_type == 'Major')
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Admission Date</label>
                                <div class="col-md-6">
                                    {{ Carbon\Carbon::parse($ipdpatient -> admision_date)->format('d-m-Y H:i')}}
                                </div>
                            </div>
                        </div>
                        <br>
                        @endif
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Procedure Type</label>

                                <div class="col-md-6">
                                    {{ $ipdpatient -> procedure_type }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Procedure Date</label>

                                <div class="col-md-6">
                                    {{ Carbon\Carbon::parse($ipdpatient -> procedure_date)->format('d-m-Y')}}
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Procedure</label>

                                <div class="col-md-6">
                                    @foreach($ipdpatient -> ipdprocedures as $ipdprocedure)
                                        <li>{{ $ipdprocedure -> ipdprocedure_name }}</li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <br>
                        @if($ipdpatient -> procedure_type == 'Major')
                          @if(count($ipdpatient -> discharge_date))
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Discharge Date</label>

                                <div class="col-md-6">

                                    {{
                                        Carbon\Carbon::parse($ipdpatient -> discharge_date)->format('d-m-Y H:i')
                                     }}

                                </div>
                            </div>
                        </div>
                        <br>
                         @endif
                        @endif
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="col-md-3 col-offset-3"><a  href="{{ url('/ipd/edit-ipd',$ipdpatient->id) }}" class="btn btn-info">Edit IPD</a></p>

                                    @if(Entrust::hasRole('admin'))
                                        <div class="col-md-3">
                                            {!! Form::open(array('url' => ['/ipd/delete-ipd',$ipdpatient->id],'method'=>'delete','class' => 'form-horizontal','id' => 'deleteipd')) !!}

                                            {!! Form::submit('Delete IPD', ['class' => 'btn btn-info btn-danger delete','id' => 'deletebutton']) !!}

                                            {!! Form::close() !!}
                                        </div>
                                    @endif
                                    <div class="col-md-3">
                                      @if($ipdpatient -> discharge_date == null && $ipdpatient -> procedure_type == 'Major')

                                        {!! Form::open(array('url' => ['/ipd/discharge-patient',$ipdpatient->id],'method'=>'post','class' => 'form-horizontal','id'=>'dischargeform')) !!}

                                        <div class="modal" id="dischargepatient">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Discharge Patient</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="form-group{{ $errors->has('discharge_date') ? ' has-error' : '' }}">
                                                          <label for="Discharge Date" class="col-md-4 control-label">Discharge Date</label>
                                                          <div class="col-md-6">
                                                              <div class="input-append date" id="dischargedatetimepicker">
                                                                  {!! Form::text('discharge_date',null,array('class' => 'form-control','required','id' => 'discharge_date')) !!}
                                                                  <span class="add-on"><i class="icon-th"></i></span>
                                                              </div>
                                                              @if ($errors->has('discharge_date'))
                                                                  <span class="help-block">
                                                                          <strong>{{ $errors->first() }}</strong>
                                                                      </span>
                                                              @endif
                                                          </div>
                                                      </div>
                                                      <br>
                                                    </div>
                                                    <div class="modal-footer">

                                                          <button type="button" class="btn btn-sm btn-primary" id="discharge-btn">Discharge</button>
                                                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {!! Form::submit('Discharge Patient', ['class' => 'btn btn-info btn-danger','id' => 'discharge']) !!}

                                        {!! Form::close() !!}

                                        @endif

                                        @foreach ($errors->all() as $error)
                                        <script>
                                        $(function() {
                                            $('#dischargepatient').modal('show');
                                        });
                                        </script>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('jscript')

<script type="text/javascript">
$('#deletebutton').on('click', function(e) {
var $form = $(this).closest('form');
e.preventDefault();
$('#confirm').modal({
    backdrop: 'static',
    keyboard: false
  })
  .one('click', '#delete-btn', function(e) {
    $form.trigger('submit');
  });
});

$('#discharge').on('click', function(e) {
var $form = $(this).closest('form');
e.preventDefault();
$('#dischargepatient').modal({
    backdrop: 'static',
    keyboard: false
  })
  .on('click','#discharge-btn', function(e) {
    var discharge_date = $('#dischargeform #discharge_date').val();
    $form.trigger('submit');
  });
});
$("#dischargedatetimepicker").datetimepicker({
    pick12HourFormat: false,
    format: "yyyy-mm-dd hh:ii",
    startDate: "2017-04-01",
    minuteStep: 05,
    autoclose: true,
    sideBySide: true,
    widgetPositioning: {
        horizontal: 'right',
        vertical: 'bottom'
    }
});
</script>
@endsection
