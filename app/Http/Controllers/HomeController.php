<?php

namespace App\Http\Controllers;

use App\Caller;
use Illuminate\Http\Request;
use Prophecy\Call\Call;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
{
    $this->middleware('auth');
}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth/login');
    }

    public function home()
    {
        return view('home');
    }

    public function showcms()
    {
        return view('cms.cms-home');
    }
    public function showaddcaller()
    {
        return view('cms.add-caller');
    }

    public function showsearchcaller(Request $request)
    {
        if($request->has('callersearch')){
            $callers = Caller::search($request->callersearch)
                ->paginate(6);
        }else{
            $callers = Caller::paginate(6);
        }
        return view('cms/search-caller',compact('callers'));

    }

    public function showreports()
    {
        return view('cms.reports');
    }

    /**
     * Show the OPD dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function showopd()
    {
        return view('opd/opd-home');
    }
}
