<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\AddPatientRequest;
use App\Http\Requests\UpdateOldPatientRequest;
use App\Oldpatient;
use App\Procedure;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OldipdController extends Controller
{
    /**
     * Authenticate User Before Performing Actions
     * OldipdController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showoldipdhome()
    {
        return view('old-ipd/old-ipd-home');
    }

    public function showaddpatient()
    {
        $country = Country::orderBy('country_name')->pluck('country_name', 'id');
        $state = State::orderBy('state_name')->pluck('state_name','id');
        $procedures = Procedure::orderBy('procedure_name')->pluck('procedure_name','id');
        return view('old-ipd/add-patient',compact('country','state','procedures'));
    }

    public function addpatient(AddPatientRequest $request)
    {
        $addpatient = new Oldpatient;
        $input = $request -> all();
        $addpatient -> ipd_no = $input['ipd_no'];
        $addpatient -> date = $input['date'];
        $addpatient -> first_name = $input['first_name'];
        $addpatient -> last_name = $input['last_name'];
        $addpatient -> age = $input['age'];
        $addpatient -> gender = $input['gender'];
        $addpatient -> contact_1 = $input['contact_1'];

        if($request->input('contact_2') == null)
        {
            $addpatient -> contact_2 = null;
        }else
        {
            $addpatient -> contact_2 = $input['contact_2'];
        }

        $addpatient -> country = $input['country'];


        if(is_null($request->input('state')))
        {
            $addpatient -> state = null;
        }else
        {
            $addpatient -> state = $input['state'];
        }

        $addpatient -> remarks = $input['remarks'];

        $addpatient -> save();
        $addpatient -> procedures()->attach($request->input('procedure_list'));


        $country = Country::orderBy('country_name')->pluck('country_name', 'id');
        $state = State::orderBy('state_name')->pluck('state_name','id');
        $procedures = Procedure::orderBy('procedure_name')->pluck('procedure_name','id');
        $request->session()->flash('alert-success', 'Patient was successfully added!');
        return view('old-ipd/add-patient',compact('country','state','procedures'));


    }

    public function showsearchpatient(Request $request)
    {

        $patients = Oldpatient::orderBy('id', 'desc')->take(5)->get();

        return view('old-ipd/search-patient',compact('patients'));

    }
    public function searchpatient(Request $request)
    {
        if($request->has('patientsearch')){
            $patients = Oldpatient::SearchByKeyword($request->patientsearch)->get();
        }
        return view('old-ipd/search-patient',compact('patients'));

    }

    public function viewpatient($id)
    {
        $oldpatient = Oldpatient::findOrfail($id);
        $country = DB::table('countries')->where('id',$oldpatient->country)->pluck('country_name');
        $state = DB::table('states')->where('id',$oldpatient->state)->pluck('state_name');
        return view('old-ipd/view-patient',compact('oldpatient','country','state'));
    }

    public function showupdatepatient($id)
    {
        $oldpatient = Oldpatient::findOrfail($id);
        $country = Country::orderBy('country_name')->pluck('country_name', 'id');
        $state = State::orderBy('state_name')->pluck('state_name','id');
        $procedures = Procedure::orderBy('procedure_name')->pluck('procedure_name','id');

        return view('old-ipd/edit-patient',compact('oldpatient','country','state','procedures'));
    }

    public function updatepatient($id,UpdateOldPatientRequest $request)
    {
        $oldpatient = Oldpatient::findOrfail($id);
        $oldpatient ->update($request -> all());

        $request->session()->flash('alert-success', 'Patient was successfully Updated!');
        $oldpatient -> procedures()->sync($request->input('procedure_list'));


        $country = Country::orderBy('country_name')->pluck('country_name', 'id');
        $state = State::orderBy('state_name')->pluck('state_name','id');
        $procedures = Procedure::orderBy('procedure_name')->pluck('procedure_name','id');
        return view('old-ipd/add-patient',compact('country','state','procedures'));
    }

}
