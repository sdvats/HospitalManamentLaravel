<?php

namespace App\Http\Controllers;

use App\Caller;
use App\Callernote;
use App\Http\Requests\AddCallerNotesRequest;
use App\Http\Requests\UpdateCallerRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\AddCallerRequest;
use Barryvdh\DomPDF\PDF;

class CallerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addcaller(AddCallerRequest $request)
{
        $input = $request -> all();
        $caller = new Caller;
        $caller -> first_name = $input['first_name'];
    if ( $input['last_name'] == '' )
    {
        $caller -> last_name = null;
    }else
    {
        $caller -> last_name      = $input['last_name'];
    }
        $caller -> gender     = $input['gender'];
    if ( $input['city'] == '' )
    {
        $caller -> city = null;
    }else
    {
        $caller -> city      = $input['city'];
    }
    if ( $input['country'] == '' )
    {
        $caller -> country = null;
    }else
    {
        $caller -> country      = $input['country'];
    }
    if ( $input['email'] == '' )
    {
        $caller -> email = null;
    }else
    {
        $caller -> email      = $input['email'];
    }

    if ( $input['mobile'] == '' )
    {
        $caller -> mobile = null;
    }else
    {
        $caller -> mobile      = $input['mobile'];
    }
        $caller -> mode       = $input['mode'];
        $caller -> procedure  = $input['procedure'];
        $caller -> detail     = $input['detail'].'+'.$input['detail1'].'+'.$input['detail2'].'+'.$input['detail3'] ;
        $caller -> phase      = $input['phase'];
        $caller -> remarks    = $input['remarks'];
        $caller -> reminder   = $input['reminder'];

        if ( $input['reminder'] == true )
        {
            $caller -> first_reminder = Carbon::now()->addDay(7);
            $caller -> second_reminder = Carbon::now()->addDay(38);
            $caller -> third_reminder = Carbon::now()->addDay(69);
        }else
        {
            $caller -> first_reminder = null;
            $caller -> second_reminder = null;
            $caller -> third_reminder = null;
        }


        $caller -> booked = false;

        $caller -> created_at = Carbon::now();
        $caller -> updated_at = Carbon::now();

        $caller->save();

        $request->session()->flash('alert-success', 'Caller was successfully added!');

        return redirect('cms/add-caller');


}
    public function searchcaller(Request $request)
    {
        if($request->has('callersearch')){
            $callers = Caller::SearchByKeyword($request->callersearch)->get();
        }else{
            $callers = Caller::paginate(10);
        }
        return view('cms/search-caller',compact('callers'));

    }

    public function viewcaller($id)
    {
        $caller = Caller::findOrfail($id);
        $callernotes = $caller -> callernote;
        $i=1;
        return view('cms/view-caller',compact('caller','callernotes','i'));
    }

    public function editcaller($id)
    {
        $caller = Caller::findOrfail($id);
        return view('cms/edit-caller',compact('caller'));
    }

    public function updatecaller($id,UpdateCallerRequest $request)
    {
        $caller = Caller::findOrfail($id);
        $input = $request -> all();
        $caller -> first_name = $input['first_name'];
        if ( $input['last_name'] == '' )
        {
            $caller -> last_name = null;
        }else
        {
            $caller -> last_name      = $input['last_name'];
        }
        $caller -> gender = $input['gender'];
        if ( $input['city'] == '' )
        {
            $caller -> city = null;
        }else
        {
            $caller -> city      = $input['city'];
        }
        if ( $input['country'] == '' )
        {
            $caller -> country = null;
        }else
        {
            $caller -> country      = $input['country'];
        }
        if ( $input['email'] == '' )
        {
            $caller -> email = null;
        }else
        {
            $caller -> email      = $input['email'];
        }

        if ( $input['mobile'] == '' )
        {
            $caller -> mobile = null;
        }else
        {
            $caller -> mobile      = $input['mobile'];
        }
        $caller -> remarks = $input['remarks'];
        $caller -> save();
        $request->session()->flash('alert-success', 'Caller was successfully Updated!');
        $callernotes = $caller -> callernote;
        $i=1;
        return view('cms/view-caller',compact('caller','callernotes','i'));

    }

    public function removereminder($id,Request $request)
    {
        $caller = Caller::findOrfail($id);
        $caller -> reminder = false;
        $caller -> first_reminder = null;
        $caller -> second_reminder = null;
        $caller -> third_reminder = null;
        $caller -> save();
        $request->session()->flash('alert-success', 'Reminder was successfully Removed!');
        $callernotes = $caller -> callernote;
        $i=1;
        return view('cms/view-caller',compact('caller','callernotes','i'));


    }

    public function booked($id,Request $request)
    {
        $caller = Caller::findOrfail($id);
        $caller -> booked = true;

        $caller -> save();
        $request->session()->flash('alert-success', 'Booking Status was successfully Changed!');
        $callernotes = $caller -> callernote;
        $i=1;
        return view('cms/view-caller',compact('caller','callernotes','i'));


    }

    public function setreminder($id,Request $request)
    {
        $caller = Caller::findOrfail($id);
        $caller -> reminder = true;
        $caller -> first_reminder = Carbon::now()->addDay(7);
        $caller -> second_reminder = Carbon::now()->addDay(38);
        $caller -> third_reminder = Carbon::now()->addDay(69);
        $caller -> save();
        $request->session()->flash('alert-success', 'Reminder was successfully Added!');
        $callernotes = $caller -> callernote;
        $i=1;
        return view('cms/view-caller',compact('caller','callernotes','i'));


    }

    public function showaddnotes($id)
    {
        $caller = Caller::findOrfail($id);
        return view('cms/add-caller-notes',compact('caller'));

    }

    public function addcallernotes($id, AddCallerNotesRequest $request)
    {
        $caller = Caller::findOrfail($id);
        $input = $request -> all();
        $callernote = New Callernote;
        $callernote -> caller_id = $caller->id;
        $callernote -> caller_note = $input['caller_note'];
        $callernote -> save();

        $callernotes = $caller -> callernote;
        $i=1;
        return view('cms/view-caller',compact('caller','callernotes','i'));
    }

    public function showtodaycalllog()
    {
        $today = Carbon::today();
        $callers = Caller::whereDate('created_at', '=', $today)->get();

        $pdf = \PDF::loadView('cms.reports.today-log',array('callers'=>$callers))->setPaper('a4', 'landscape');
        return $pdf->download($today.'-Call-Log.pdf');
    }

    public function showtodayreminderlog()
    {
        $today = Carbon::today();
        $callers = Caller::whereDate('first_reminder', '=', $today)->orwhereDate('second_reminder', '=', $today)->orwhereDate('third_reminder', '=', $today)->get();

        $pdf = \PDF::loadView('cms.reports.reminder-sheet',array('callers'=>$callers))->setPaper('a4', 'landscape');
        return $pdf->download($today.'-Reminder-Log.pdf');

    }

    public function showmonthlycalllog()
    {
        $month = Carbon::now()->month;
        $callers = Caller::whereMonth('created_at', '=', $month)->get();

        $pdf = \PDF::loadView('cms.reports.monthly-sheet',array('callers'=>$callers))->setPaper('a4', 'landscape');
        return $pdf->download($month.'-Monthly-Log.pdf');
    }

}
