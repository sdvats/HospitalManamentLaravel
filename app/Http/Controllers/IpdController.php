<?php

namespace App\Http\Controllers;

use Dompdf\FrameDecorator\NullFrameDecorator;
use Illuminate\Http\Request;
use App\Opdpatient;
use App\Ipdprocedure;
use App\Http\Requests\CreateIpdRequest;
use App\Http\Requests\UpdateIpdRequest;
use App\Http\Requests\MakeDischargeRequest;
use Validator;
use App\Ipdpatient;
use Auth;
use Carbon\Carbon;
use Entrust;


class IpdController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function showipdhome()
  {
    return view('/ipd/ipd-home');
  }

  public function showcreateipd($id)
  {
      $opdpatient = Opdpatient::findOrfail($id);
      $ipdprocedures = Ipdprocedure::orderBy('ipdprocedure_name')->pluck('ipdprocedure_name','id');
      return view('ipd/create-ipd',compact('opdpatient','ipdprocedures') );
  }

  public function createipd(CreateIpdRequest $request,$id)
  {

                if($request -> procedure_type =='Major')
                {
                    $validator = Validator::make($request->all(), [
                        'ipd_no' => 'Required',
                    ]);

                }elseif ($request -> procedure_type == 'Minor')
                {
                  $validator = Validator::make($request->all(), [
                      'ipd_no' => 'Required'
                  ]);
                }
        if ($validator->fails()) {
            return redirect('ipd/create-ipd/'.''.$id)
                        ->withErrors($validator)
                        ->withInput();
                      }
              $opdpatient = Opdpatient::findOrfail($id);
              $ipdpatient = new Ipdpatient;
              $input = $request->all();

              $ipdpatient -> opdpatient_id  = $opdpatient -> id;
              $ipdpatient -> ipd_no         = $input['ipd_no'];
              $ipdpatient -> attendent_name = $input['attendent_name'];
              $ipdpatient -> procedure_type = $input['procedure_type'];
              $ipdpatient -> anesthesia     = $input['anesthesia'];
              if ($request -> procedure_type == 'Major')
              {
                $ipdpatient -> admision_date = $input['admision_date'];
              }

      $admisiondate = Carbon::parse($request -> admision_date);
      $proceduredate = Carbon::parse($request -> procedure_date);

            if($request ->procedure_type == 'Major')
      {
          $diff = $admisiondate->diffInDays($proceduredate, false);
          if($diff >= 0)
          {
              $ipdpatient -> procedure_date = $input['procedure_date'];
          }else
          {
              $request->session()->flash('alert-danger', 'Procedure date should be a date after or equal to admission date');
              return back();
          }
      }else
            {
                $ipdpatient -> procedure_date = $input['procedure_date'];
            }

              $ipdpatient -> remarks        = $input['remarks'];
              $ipdpatient -> created_by     = Auth::User()->name;
              $ipdpatient -> save();
              $ipdpatient -> ipdprocedures()->attach($request->input('ipdprocedure_list'));
              $request->session()->flash('alert-success', 'IPD Created successfully');
              return redirect('/ipd/view-ipd/'.$ipdpatient->id);

  }

  public function viewipd($id)
  {
      $ipdpatient = Ipdpatient::with('opdpatient')->findOrfail($id);

      return view('ipd/view-ipd',compact('ipdpatient'));
  }

  public function showeditipd($id)
  {
      $ipdpatient = Ipdpatient::findOrfail($id);
      $ipdprocedures = Ipdprocedure::orderBy('ipdprocedure_name')->pluck('ipdprocedure_name','id');
      return view('ipd/edit-ipd',compact('ipdpatient','ipdprocedures'));
  }

  public function editipd(UpdateIpdRequest $request,$id)
  {
    $ipdpatient = Ipdpatient::findOrfail($id);
    if($request -> procedure_type =='Major')
    {
        $validator = Validator::make($request->all(), [
            'ipd_no' => 'Required'
        ]);

    }elseif ($request -> procedure_type == 'Minor')
    {
      $validator = Validator::make($request->all(), [
          'ipd_no' => 'Required'
      ]);
    }
if ($validator->fails()) {
return redirect('ipd/edit-ipd/'.''.$id)
            ->withErrors($validator)
            ->withInput();
          }
  $input = $request->all();

  $ipdpatient -> ipd_no         = $input['ipd_no'];
  $ipdpatient -> attendent_name = $input['attendent_name'];
  $ipdpatient -> procedure_type = $input['procedure_type'];
  $ipdpatient -> anesthesia     = $input['anesthesia'];
  if ($request -> procedure_type == 'Major')
  {
    $ipdpatient -> admision_date = $input['admision_date'];
      $admisiondate = Carbon::parse($request -> admision_date);
      $proceduredate = Carbon::parse($request -> procedure_date);

      $diff = $admisiondate->diffInDays($proceduredate, false);
      if($diff >= 0)
      {
          $ipdpatient -> procedure_date = $input['procedure_date'];
      }else
      {
          $request->session()->flash('alert-danger', 'Procedure date should be a date after or equal to admission date');
          return back();
      }

  }else
      {
          $ipdpatient -> procedure_date = $input['procedure_date'];
      }




  $ipdpatient -> remarks        = $input['remarks'];
  $ipdpatient -> updated_by     = Auth::User()->name;
  $ipdpatient -> save();
  $ipdpatient-> ipdprocedures()->sync($request->input('ipdprocedure_list'));
  $request->session()->flash('alert-success', 'IPD Updated successfully');
  return redirect('/ipd/view-ipd/'.$ipdpatient->id);

  }

  public function showaddprocedure()
  {
      if(Entrust::hasRole('admin'))
      {
          $ipdprocedures = Ipdprocedure::orderBy('ipdprocedure_name','asc')->get();
          return view('ipd/add-procedure', compact('ipdprocedures'));
      }else
      {
          echo '<script>
                    alert("You are not authorised to continue");
                </script>';
      }

  }

  public function addprocedure(Request $request)
  {
    $ipdprocedure = new Ipdprocedure;
    $input = $request -> all();
    $validator = Validator::make($request->all(), [
        'ipdprocedure_name' => 'Required|regex:/^[a-zA-Z ]*$/',
    ]);
    if ($validator->fails())
    {
        return redirect('ipd/add-procedure/')
                    ->withErrors($validator)
                    ->withInput();
    }
    $ipdprocedure -> ipdprocedure_name = $input['ipdprocedure_name'];
    $ipdprocedure -> save();
    $request->session()->flash('alert-success', 'Procedure Added successfully');
    return redirect('/ipd/add-procedure');
  }
  public function showeditprocedure($id)
  {
    $ipdprocedure = Ipdprocedure::findOrfail($id);
    return view('ipd/edit-procedure', compact('ipdprocedure'));
  }

  public function editprocedure(Request $request,$id)
  {
    $ipdprocedure = Ipdprocedure::findOrfail($id);

    $validator = Validator::make($request->all(), [
        'ipdprocedure_name' => 'Required|regex:/^[a-zA-Z ]*$/',
    ]);
    if ($validator->fails())
    {
        return redirect('ipd/edit-procedure/'.$id)
                    ->withErrors($validator)
                    ->withInput();
    }
    $input = $request->all();
    $ipdprocedure -> update($input);
    $request->session()->flash('alert-success', 'Procedure Updated successfully');
    return redirect('/ipd/add-procedure');
  }

  public function deleteipd($id)
  {
      if(Entrust::hasRole('admin'))
      {
          $ipdpatient = Ipdpatient::findOrfail($id);
          $ipdpatient-> delete();
          return redirect('/ipd');

      }else
      {
          echo '<script>
                    alert("You are not authorised to continue");
                </script>';
      }

  }

  public function dischargepatient(MakeDischargeRequest $request,$id)
  {
    $ipdpatient = Ipdpatient::findOrfail($id);
    $procedure_date = Carbon::parse($ipdpatient -> procedure_date);
    $discharge_date = Carbon::parse($request -> discharge_date);

    $diff = $procedure_date->diffInDays($discharge_date, false);
    if($diff >= 0)
    {
      $ipdpatient -> discharge_date = $request -> discharge_date;
      $ipdpatient -> save();
      $request->session()->flash('alert-success', 'Patient discharged successfully');
      return redirect('/ipd/view-ipd/'.$ipdpatient->id);
    }else
    {
          $request->session()->flash('alert-danger', 'Discharge date should be a date after procedure date');
          return redirect('ipd/view-ipd/'.$id);
    }

  }

  public function searchipd(Request $request)
    {
        if($request->has('patientsearch')){
            $patients = Ipdpatient::SearchByKeyword($request->patientsearch)
                ->paginate(10);
        }else{
            $patients = Ipdpatient::orderBy('id', 'desc')->take(10)->get();
        }
        return view('ipd/search-ipd',compact('patients'));

    }

    public function ipdlist()
    {
        $patients = Ipdpatient::orderBy('id','desc') -> paginate(25);
        return view('ipd/ipd-list',compact('patients'));
    }
    public function ipdminor()
    {
        $patients = Ipdpatient::where('procedure_type','Minor')->orderBy('ipd_no','desc')-> paginate(25);
        return view('ipd/ipd-minor',compact('patients'));
    }
    public function ipdmajor()
    {
        $patients = Ipdpatient::where('procedure_type','Major')->orderBy('ipd_no','desc')-> paginate(25);
        return view('ipd/ipd-major',compact('patients'));
    }

    public function showdownloadrecords()
    {
        return view('ipd/download-records');
    }

    public function filterdownload(Request $request)
    {
        $start = Carbon::parse($request->input('from_date'));
        $end   = Carbon::parse($request->input('to_date'));
        $procedure_type = $request->input('procedure_type');

        if($procedure_type == 'Minor')
        {
            $ipdpatients = Ipdpatient::where('procedure_type',$procedure_type)->whereBetween('procedure_date',[$start,$end])->with('opdpatient')->orderBy('ipd_no','ASC')->get();
            $i=1;
            $pdf = \PDF::loadView('ipd.download-minor',array('ipdpatients'=> $ipdpatients, 'i' => $i, 'start'=> $start,'end' => $end ))->setPaper('a4', 'landscape');
            return $pdf->download($start.'-to-'.$end.''.$procedure_type.'.'.'pdf');
        }
        elseif($procedure_type == 'Major')
        {
            $ipdpatients = Ipdpatient::where('procedure_type',$procedure_type)->whereBetween('procedure_date',[$start,$end])->with('opdpatient')->orderBy('procedure_date','ASC')->get();
            $i=1;
            $pdf = \PDF::loadView('ipd.download-major',array('ipdpatients'=> $ipdpatients, 'i' => $i, 'start'=> $start,'end' => $end ))->setPaper('a4', 'landscape');
            return $pdf->download($start.'-to-'.$end.''.$procedure_type.'.'.'pdf');
        }
        elseif($procedure_type == 'IPD')
        {
            $ipdpatients = Ipdpatient::where('procedure_type','Major')->whereBetween('procedure_date',[$start,$end])->with('opdpatient')->orderBy('ipd_no','ASC')->get();
            $i=1;
            $pdf = \PDF::loadView('ipd.download-ipd',array('ipdpatients'=> $ipdpatients, 'i' => $i, 'start'=> $start,'end' => $end ))->setPaper('a4', 'landscape');
            return $pdf->download($start.'-to-'.$end.''.$procedure_type.'.'.'pdf');
        }
    }

    public function reports()
    {
        return view('/ipd/reports');
    }

    public function quickview()
    {
        $patients = Ipdpatient::orderBy('id','desc') -> paginate(25);
        return view('ipd/quick-view',compact('patients'));
    }

    public function recentadmissions()
    {
        $patients = Ipdpatient::orderBy('admision_date','desc')-> paginate(25);
        return view('ipd/recent-admissions',compact('patients'));
    }

    public function recentdischarges()
    {
        $patients = Ipdpatient::orderBy('discharge_date','desc')-> paginate(25);
        return view('ipd/recent-discharges',compact('patients'));

    }

    public function pendingdischarge()
    {
        $patients = Ipdpatient::where('discharge_date','=',null)->where('procedure_type','Major')->orderBy('ipd_no','asc')-> paginate(25);
        return view('ipd/pending-discharge',compact('patients'));

    }



}
