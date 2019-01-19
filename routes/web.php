<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::group(['middleware' => 'ipcheck'], function ()
{
    Route::get('/', 'HomeController@home');
    Route::get('/home', 'HomeController@home');


    Auth::routes();

    Route::get('/cms', 'HomeController@showcms');

    Route::get('/cms/add-caller','HomeController@showaddcaller');

    Route::post('/cms/add-caller',array('before' => 'csrf','uses'=>'CallerController@addcaller'));

    Route::get('/cms/search-caller','HomeController@showsearchcaller');

    Route::post('/cms/search-caller',array('before' => 'csrf','uses'=>'CallerController@searchcaller'));

    Route::get('/cms/view-caller/{id}','CallerController@viewcaller');

    Route::get('/cms/edit-caller/{id}','CallerController@editcaller');

    Route::patch('/cms/edit-caller/{id}',array('before' => 'csrf','uses'=>'CallerController@updatecaller'));

    Route::get('/cms/remove-reminder/{id}','CallerController@removereminder');

    Route::get('/cms/set-reminder/{id}','CallerController@setreminder');

    Route::get('/cms/booked/{id}','CallerController@booked');

    Route::get('/cms/add-caller-notes/{id}','CallerController@showaddnotes');

    Route::post('/cms/add-caller-notes/{id}',array('before' => 'csrf','uses'=>'CallerController@addcallernotes'));

    Route::get('/cms/reports','HomeController@showreports');


    /* Reports Routes */

    Route::get('/cms/reports/today-call-log','CallerController@showtodaycalllog');

    Route::get('/cms/reports/today-reminder-log','CallerController@showtodayreminderlog');

    Route::get('/cms/reports/monthly-call-log','CallerController@showmonthlycalllog');

    /* OPD Management System Routes */

    Route::get('/opd','HomeController@showopd');

    Route::get('/opd/add-patient','OpdController@showaddpatient');

    Route::post('/opd/add-patient','OpdController@addpatient');

    Route::get('/opd/edit-patient/{id}','OpdController@showeditpatient');

    Route::PATCH('/opd/edit-patient/{id}',array('before' => 'csrf','uses'=>'OpdController@editpatient'));

    Route::get('/opd/search-patient','OpdController@showsearchpatient');

    Route::post('/opd/search-patient',array('before' => 'csrf','uses'=>'OpdController@searchpatient'));

    Route::get('/opd/view-patient/{id}','OpdController@viewpatient');

    /*
     * Making appointment in OPD
     */

    Route::get('/opd/make-appointment/{id}','OpdController@showmakeappointment');
    Route::post('/opd/make-appointment/{id}','OpdController@makeappointment');

    /*
     * Adding Estimate for patient
     */

    Route::get('/opd/add-estimate/{id}','OpdController@showaddestimate');
    Route::post('/opd/add-estimate/{id}','OpdController@addestimate');
    Route::get('/opd/edit-estimate/{id}','OpdController@showeditestimate');
    Route::patch('/opd/edit-estimate/{id}','OpdController@editestimate');
    Route::get('/opd/delete-estimate/{id}','OpdController@deleteestimate');

    /*
     * Adding Payments for patient
     */

    Route::get('/opd/add-payment/{id}','OpdController@showaddpayment');
    Route::post('/opd/add-payment/{id}','OpdController@addpayment');
    Route::get('/opd/edit-payment/{id}','OpdController@showeditpayment');
    Route::patch('/opd/edit-payment/{id}','OpdController@editpayment');
    Route::get('/opd/delete-payment/{id}','OpdController@deletepayment');

    /*
     * Adding Documents for patient
     */

    Route::get('/opd/add-document/{id}','OpdController@showadddocument');
    Route::post('/opd/add-document/{id}','OpdController@adddocument');
    Route::get('/opd/delete-document/{id}','OpdController@deletedocument');

    /*
     * Adding Itinerary for patient
     */

    Route::get('/opd/add-itinerary/{id}','OpdController@showadditinerary');
    Route::post('/opd/add-itinerary/{id}','OpdController@additinerary');
    Route::get('/opd/delete-itinerary/{id}','OpdController@deleteitinerary');
    /*
     * Making Calender Related routes
     */

    Route::get('/opd/calendar','OpdController@showcalendar');

    Route::get('/opd/upcoming-appointments','OpdController@upcomingappointments');

    Route::get('/opd/view-appointment/{id}','OpdController@viewappointment');

    Route::get('/opd/edit-appointment/{id}','OpdController@showeditappointment');

    Route::patch('/opd/edit-appointment/{id}','OpdController@editappointment');

    Route::get('/opd/delete-appointment/{id}','OpdController@deleteappointment');

    Route::get('/opd/recently-added','OpdController@recentlyadded');

    Route::get('/opd/recently-visited','OpdController@recentlyvisited');

    Route::get('/opd/filter-patient-male','OpdController@filterpatientmale');

    Route::get('/opd/filter-patient-female','OpdController@filterpatientfemale');

    Route::get('/opd/filter-patient-female','OpdController@filterpatientfemale');

    Route::get('/opd/filter-patient-male-to-female','OpdController@filterpatientmaletofemale');

    Route::get('/opd/filter-patient-female-to-male','OpdController@filterpatientfemaletomale');

    Route::get('/opd/filter-patient-international','OpdController@filterpatientinternational');

    Route::get('/opd/patient-arrivals','OpdController@showpatientarrivals');
    /*
     * Opd Quick View Navigation
     */
    Route::get('/opd/quick-view','OpdController@quickview');




    /*
     * Ipd Navigation
     */

    Route::get('/ipd','IpdController@showipdhome');

    Route::get('/ipd/create-ipd/{id}','IpdController@showcreateipd');

    Route::post('/ipd/create-ipd/{id}','IpdController@createipd');

    Route::get('/ipd/view-ipd/{id}','IpdController@viewipd');

    Route::get('/ipd/edit-ipd/{id}','IpdController@showeditipd');

    Route::post('/ipd/edit-ipd/{id}','IpdController@editipd');

    Route::get('/ipd/add-procedure','IpdController@showaddprocedure');

    Route::post('/ipd/add-procedure','IpdController@addprocedure');


    Route::get('/ipd/edit-procedure/{id}','IpdController@showeditprocedure');

    Route::post('/ipd/edit-procedure/{id}','IpdController@editprocedure');

    Route::delete('/ipd/delete-ipd/{id}','IpdController@deleteipd');

    Route::post('/ipd/discharge-patient/{id}','IpdController@dischargepatient');

    Route::get('/ipd/search-ipd','IpdController@searchipd');

    Route::get('/ipd/ipd-list','IpdController@ipdlist');

    Route::get('/ipd/ipd-minor','IpdController@ipdminor');

    Route::get('/ipd/ipd-major','IpdController@ipdmajor');

    Route::get('/ipd/download-records','IpdController@showdownloadrecords');

    Route::post('/ipd/filter-download','IpdController@filterdownload');

    Route::post('/ipd/search-ipd','IpdController@searchipd');

    Route::get('/ipd/reports','IpdController@reports');

    Route::get('/ipd/quick-view','IpdController@quickview');

    Route::get('/ipd/recent-admissions','IpdController@recentadmissions');

    Route::get('/ipd/recent-discharges','IpdController@recentdischarges');

    Route::get('/ipd/pending-discharge','IpdController@pendingdischarge');


    /* Old Ipd Management System Routes here */

    Route::get('/old-ipd','OldipdController@showoldipdhome');

    Route::get('/old-ipd/add-patient','OldipdController@showaddpatient');

    Route::post('/old-ipd/add-patient',array('before' => 'csrf','uses'=>'OldipdController@addpatient'));

    Route::get('/old-ipd/search-patient','OldipdController@showsearchpatient');

    Route::post('/old-ipd/search-patient',array('before' => 'csrf','uses'=>'OldipdController@searchpatient'));

    Route::get('/old-ipd/view-patient/{id}','OldipdController@viewpatient');

    Route::get('/old-ipd/edit-patient/{id}','OldipdController@showupdatepatient');

    Route::PATCH('/old-ipd/edit-patient/{id}',array('before' => 'csrf','uses'=>'OldipdController@updatepatient'));

});
