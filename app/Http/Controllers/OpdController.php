<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Country;
use App\Estimate;
use App\Document;
use App\Http\Requests\AddDocumentRequest;
use App\Http\Requests\AddEstimateRequest;
use App\Http\Requests\AddItineraryRequest;
use App\Http\Requests\AddOpdPatientRequest;
use App\Http\Requests\MakeAppointmentRequest;
use App\Http\Requests\UpdateOldPatientRequest;
use App\Http\Requests\UpdateOpdPatientRequest;
use App\Itinerary;
use App\Oldpatient;
use App\Opdpatient;
use Carbon\Carbon;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PhpParser\Comment\Doc;
use Spatie\GoogleCalendar\Event;
use Google_Service_Calendar_EventAttendee;
use Auth;



class OpdController extends Controller
{

    /**
     * Authenticate user when performing actions
     * OpdController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showaddpatient()
    {
        $country = Country::orderBy('country_name')->pluck('country_name','country_name');
        return view('opd/add-patient',compact('country'));
    }

    public function addpatient(AddOpdPatientRequest $request)
    {
        $input = $request -> all();
        $addpatient = new Opdpatient;
        if($request->patient_id !== null)
        {
            $addpatient -> patient_id = $input['patient_id'];
        }

        $addpatient -> first_name = $input['first_name'];
        $addpatient -> last_name = $input['last_name'];
        $addpatient -> gender = $input['gender'];
        if($request->birth_date !== null)
        {
            $addpatient -> birth_date = $input['birth_date'];
        }

        $addpatient -> group = $input['group'];
        $addpatient -> address = $input['address'];
        $addpatient -> country = $input['country'];
        $addpatient -> email = $input['email'];
        if( $request->  contact !== null)
        {
            $addpatient -> contact = $input['contact'];
        }

        $addpatient -> mode = $input['mode'];
        $addpatient -> remarks = $input['remarks'];
        $addpatient -> created_by = Auth::User()->name;
        $addpatient -> save();
        $request->session()->flash('alert-success', 'Patient was successfully added!');
        return redirect()->back();
    }

    public function showeditpatient($id)
    {

        $opdpatient = Opdpatient::findOrfail($id);
        $country = Country::orderBy('country_name')->pluck('country_name','country_name');
        return view('opd/edit-patient',compact('country','opdpatient'));
    }

    public function showsearchpatient(Request $request)
    {
        if($request->has('patientsearch')){
            $opdpatients = Opdpatient::search($request->patientsearch)
                ->paginate(10);
        }else{
            $opdpatients = Opdpatient::orderBy('id', 'desc')->take(10)->get();
        }
        return view('opd/search-patient',compact('opdpatients'));

    }
    public function searchpatient(Request $request)
    {
        if($request->has('patientsearch')){
            $opdpatients = Opdpatient::SearchByKeyword($request->patientsearch)->get();
        }else{
            $opdpatients = Opdpatient::orderBy('id', 'desc')->take(5)->get();
        }
        return view('opd/search-patient',compact('opdpatients'));

    }

    public function viewpatient($id)
    {
        $opdpatient = Opdpatient::findOrfail($id);
        $estimates = $opdpatient -> estimates;
        $ipdpatients = $opdpatient -> ipdpatients;
        $payments = $opdpatient -> payments;
        $documents = $opdpatient -> documents;
        $appointments = $opdpatient -> appointments;
        $itineraries = $opdpatient -> itineraries;
        $i=1;
        $j=1;
        $k=1;
        $l=1;
        $m=1;
        return view('opd/view-patient',compact('opdpatient','ipdpatients','appointments','i','j','k','l','m','estimates','payments','documents','itineraries'));
    }

    public function editpatient(UpdateOpdPatientRequest $request,$id)
    {
        $input = $request -> all();
        $opdpatient = Opdpatient::findOrfail($id);
        $opdpatient -> updated_by = Auth::User()-> name;
        $opdpatient -> update($input);

        $request->session()->flash('alert-success', 'Patient was successfully edited!');
        return redirect('/opd/view-patient/'.$opdpatient->id);
    }

    public function showmakeappointment($id)
    {
        $opdpatient = Opdpatient::findOrfail($id);
        $today = Carbon::now()->format('Y-m-d');
        return view('/opd/make-appointment',compact('opdpatient','today'));
    }
    public function makeappointment($id,MakeAppointmentRequest $request)
    {


        $opdpatient = Opdpatient::findOrfail($id);
        $input = $request -> all();

        $appointment = new Appointment;

        $appointment -> opdpatient_id = $opdpatient -> id;
        $appointment -> appt_datetime = $input['appt_datetime'];
        $appointment -> appt_note = $input['appt_note'];
        $appointment -> created_by = Auth::User()->name;

        $appointment -> save();

        /*  Google Calendar event... commented
        $googleevent = new Event;
        $googleevent->id = 'appt'.$appointment->id;
        $googleevent->name = $opdpatient->first_name."'s appointment with Dr Narendra Kaushik";
        $googleevent->startDateTime =  Carbon::createFromFormat('Y-m-d H:i',$request->appt_datetime,'Asia/Kolkata');
        $googleevent->endDateTime = Carbon::createFromFormat('Y-m-d H:i',$input['appt_datetime'],'Asia/Kolkata') -> addMinute(30);
        $googleevent->sendNotification = true;
        $googleevent->location = "Olmec Best Cosmetic surgery and Hair Transplant Centre in Delhi, Delhi, India";
        $googleevent->organizerType = 'Olmec Best Cosmetic surgery and Hair Transplant Centre in Delhi, Delhi, India';
        $attendee1 = new Google_Service_Calendar_EventAttendee();
        $attendee1->setEmail($opdpatient->email);
        $attendees = array($attendee1);
        $googleevent->attendees = $attendees;
        $googleevent->save(); */

        $request->session()->flash('alert-success', 'Appointment is successfully scheduled !');
        return redirect('/opd/view-patient/'.$opdpatient->id);
    }


    public function showcalendar()

    {
        $events = [];

        $appointments = Appointment::whereDate('appt_datetime','>=',Carbon::yesterday())->get();


        foreach($appointments as $appointment)
        {

            $events[] = \Calendar::event(
                $appointment->opdpatient->first_name.' '.$appointment->opdpatient->last_name, //event title
                false, //full day event?
                $appointment->appt_datetime, //start time (you can also use Carbon instead of DateTime)
                Carbon::createFromFormat('Y-m-d H:i:s',$appointment->appt_datetime)->addMinute(30), //end time (you can also use Carbon instead of DateTime)
                0 //optionally, you can specify an event ID
            );
        }


        $calendar = \Calendar::addEvents($events)->setOptions([ //set fullcalendar options
            'firstDay' => 1
        ]);


        return view('opd/calendar', compact('calendar'));

    }

    public function quickview()
    {
        $opdpatients = Opdpatient::orderBy('id', 'asc')->paginate(10);
        return view('opd/quick-view',compact('opdpatients'));
    }

    public function upcomingappointments()
    {
        $appointments = Appointment::with('opdpatient')->whereDate('appt_datetime','>=',Carbon::today())->orderBy('appt_datetime','asc')->get();
        $i=1;
        return view('opd/upcoming-appointments',compact('appointments','i'));
    }

    public function viewappointment($id)
    {
        $appointment = Appointment::with('opdpatient')->findOrfail($id);
        return view('/opd/view-appointment',compact('appointment'));

    }

    public function showeditappointment($id)
    {
        $appointment = Appointment::with('opdpatient')->findOrFail($id);
        $today = Carbon::today();
        return view('opd/edit-appointment',compact('appointment','today'));
    }

    public function editappointment(MakeAppointmentRequest $request,$id)
    {
        $appointment = Appointment::findOrfail($id);
        $input = $request->all();
        $appointment -> appt_datetime = $input['appt_datetime'];
        $appointment -> appt_note = $input['appt_note'];
        $appointment -> created_by = Auth::User()->name;
        $appointment -> save();
        $request->session()->flash('alert-success', 'Appointment has been rescheduled !');

        return view('/opd/view-appointment',compact('appointment'));

    }

    public function deleteappointment($id,Request $request)
    {
        $appointment = Appointment::findOrfail($id);
        $appointment -> delete();

        $request ->session()->flash('alert-success', 'Appointment was successfully deleted !');
        $appointments = Appointment::with('opdpatient')->whereDate('appt_datetime','>=',Carbon::today())->orderBy('appt_datetime','asc')->get();
        $i=1;
        return view('opd/upcoming-appointments',compact('appointments','i'));

    }

    public function recentlyadded()
    {
        $opdpatients = Opdpatient::orderBy('created_at','desc')->paginate(10);
        return view('/opd/recently-added',compact('opdpatients'));
    }

    public function recentlyvisited()
    {
        $appointments = Appointment::with('opdpatient')->orderBy('appt_datetime','desc')->paginate(10);
        return view('opd/recently-visited',compact('appointments'));
    }

    public function showpatientarrivals()
    {
        $itineraries = Itinerary::with('opdpatient')->orderBy('arrival_date','desc')->paginate(10);
        return view('opd/patient-arrivals',compact('itineraries'));
    }

    public function filterpatientmale()
    {
        $opdpatients = Opdpatient::where('gender','Male')->orderBy('id','asc')->paginate(10);
        return view('/opd/view-male-patient',compact('opdpatients'));
    }

    public function filterpatientfemale()
    {
        $opdpatients = Opdpatient::where('gender','Female')->orderBy('id','asc')->paginate(10);
        return view('/opd/view-female-patient',compact('opdpatients'));
    }

    public function filterpatientmaletofemale()
    {
        $opdpatients = Opdpatient::where('group','Trans (MTF)')->orderBy('id','asc')->paginate(10);
        return view('/opd/view-male-to-female-patient',compact('opdpatients'));
    }

    public  function filterpatientfemaletomale()
    {
        $opdpatients = Opdpatient::where('group','Trans (FTM)')->orderBy('id','asc')->paginate(10);
        return view('/opd/view-female-to-male-patient',compact('opdpatients'));
    }

    public function filterpatientinternational()
    {
        $opdpatients = Opdpatient::where('country','!=','India')->orderBy('id','asc')->paginate(10);
        return view('/opd/view-international-patient',compact('opdpatients'));
    }


    public function showaddestimate($id)
    {
        $opdpatient = Opdpatient::findOrfail($id);
        return view('/opd/add-estimate',compact('opdpatient'));
    }

    public function addestimate($id, AddEstimateRequest $request)
    {
        $input = $request->all();
        $opdpatient = Opdpatient::findOrfail($id);
        $estimate = new Estimate;
        $estimate -> opdpatient_id  = $opdpatient -> id;
        $estimate -> amount = $input['amount'];
        $estimate -> currency = $input['currency'];
        $estimate -> payment_note = $input['payment_note'];
        $estimate -> created_by   = Auth::user()->name;
        $estimate -> save();
        return redirect('/opd/view-patient/'.$opdpatient->id);
    }


    public function showeditestimate($id)
    {
        $estimate = Estimate::with('opdpatient')->findOrFail($id);
        $opdpatientid = $estimate -> opdpatient_id;
        $opdpatient = Opdpatient::findOrfail($opdpatientid);
        return view('opd/edit-estimate',compact('estimate','opdpatient'));
    }

    public function editestimate(AddEstimateRequest $request,$id)
    {
        $estimate = Estimate::findOrfail($id);
        $input = $request->all();
        $estimate -> amount = $input['amount'];
        $estimate -> currency = $input['currency'];
        $estimate -> payment_note = $input['payment_note'];
        $estimate -> created_by   = Auth::user()->name;
        $estimate -> save();
        $request->session()->flash('alert-success', 'Estimate has been successfully edited !');
        return redirect('/opd/view-patient/'.$estimate -> opdpatient_id);

    }

    public function deleteestimate($id,Request $request)
    {
        $estimate = Estimate::findOrfail($id);
        $estimate -> delete();
        $request ->session()->flash('alert-success', 'Estimate was successfully deleted !');
        return redirect('/opd/view-patient/'.$estimate -> opdpatient_id);
    }




    public function showaddpayment($id)
    {
        $opdpatient = Opdpatient::findOrfail($id);
        return view('/opd/add-payment',compact('opdpatient'));
    }

    public function addpayment($id, AddEstimateRequest $request)
    {
        $input = $request->all();
        $opdpatient = Opdpatient::findOrfail($id);
        $payment = new Payment;
        $payment -> opdpatient_id  = $opdpatient -> id;
        $payment -> amount = $input['amount'];
        $payment -> currency = $input['currency'];
        $payment -> payment_note = $input['payment_note'];
        $payment -> created_by = Auth::User()->name;
        $payment -> save();
        return redirect('/opd/view-patient/'.$payment -> opdpatient_id);
    }


    public function showeditpayment($id)
    {
        $payment = Payment::with('opdpatient')->findOrFail($id);
        $opdpatientid = $payment -> opdpatient_id;
        $opdpatient = Opdpatient::findOrfail($opdpatientid);
        return view('opd/edit-payment',compact('payment','opdpatient'));
    }

    public function editpayment(AddEstimateRequest $request,$id)
    {
        $payment = Payment::findOrfail($id);
        $input = $request->all();
        $payment -> amount = $input['amount'];
        $payment -> currency = $input['currency'];
        $payment -> payment_note = $input['payment_note'];
        $payment -> created_by = Auth::User()->name;
        $payment -> save();
        $request->session()->flash('alert-success', 'Payment has been successfully edited !');
        return redirect('/opd/view-patient/'.$payment -> opdpatient_id);

    }

    public function deletepayment($id,Request $request)
    {
        $payment = Payment::findOrfail($id);
        $payment -> delete();

        $request ->session()->flash('alert-success', 'Payment was successfully deleted !');
        return redirect('/opd/view-patient/'.$payment -> opdpatient_id);

    }

    public function showadddocument($id)
    {
        $opdpatient = Opdpatient::findOrfail($id);
        return view('/opd/add-document',compact('opdpatient'));
    }

    public function adddocument($id,AddDocumentRequest $request)
    {
        $input = $request -> all();
        $opdpatient = Opdpatient::findOrfail($id);
        $document = new Document;
        $document -> opdpatient_id = $opdpatient -> id;
        $document -> doc_name = $input['doc_name'];
        if(!is_dir(base_path()."/public/documents/".$opdpatient->first_name.'-'.$opdpatient -> last_name.'-'.$opdpatient -> patient_id))
        {
            File::makeDirectory(base_path()."/public/documents/".$opdpatient->first_name.'-'.$opdpatient -> last_name.'-'.$opdpatient -> patient_id, 0700);
        }
        $destinationPath = base_path()."/public/documents/".$opdpatient->first_name.'-'.$opdpatient -> last_name.'-'.$opdpatient -> patient_id; // upload path
        $extension = $input['file']->getClientOriginalExtension(); // getting image extension
        $fileName = $opdpatient->first_name.'-'.$opdpatient -> last_name.'-'.$input['doc_name'].'.'.$extension; // renameing image
        $request->file('file')->move($destinationPath, $fileName);
        $document -> doc_url = '/documents/'.$opdpatient->first_name.'-'.$opdpatient -> last_name.'-'.$opdpatient -> patient_id.'/'.$fileName;
        $document -> created_by = Auth::User()->name;
        $document -> save();
        $request->session()->flash('alert-success', 'Document has been successfully uploaded !');
        return redirect('/opd/view-patient/'.$opdpatient->id);


    }

    public function deletedocument($id,Request $request)
    {
        $document = Document::findOrfail($id);
        unlink(public_path($document -> doc_url));
        $document -> delete();

        $request ->session()->flash('alert-success', 'Document was successfully deleted !');
        return redirect('/opd/view-patient/'.$document -> opdpatient_id);
    }

    public function showadditinerary($id)
    {
        $opdpatient = Opdpatient::findOrfail($id);
        $today = Carbon::now()->format('Y-m-d');
        return view('/opd/add-itinerary',compact('opdpatient','today'));
    }

    public function additinerary($id,AddItineraryRequest $request)
    {
        $input = $request -> all();
        $opdpatient = Opdpatient::findOrfail($id);
        $itinerary = new Itinerary;
        $itinerary -> opdpatient_id = $opdpatient -> id;
        $itinerary -> arrival_date = $input['arrival_date'];
        $itinerary -> departure_date = $input['departure_date'];
        $itinerary -> note = $input['note'];
        $itinerary -> created_by = Auth::User()->name;
        $itinerary -> save();
        $request->session()->flash('alert-success', 'Itinerary has been successfully added !');
        return redirect('/opd/view-patient/'.$opdpatient->id);


    }

    public function deleteitinerary($id,Request $request)
    {
        $itinerary = Itinerary::findOrfail($id);
        $itinerary -> delete();

        $request ->session()->flash('alert-success', 'Itinerary was successfully deleted !');
        return redirect('/opd/view-patient/'.$itinerary -> opdpatient_id);
    }
}
