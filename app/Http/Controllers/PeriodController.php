<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Period;
use App\User;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Validator, Input, Redirect, Session;

class PeriodController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $user = Auth::user();

        $periods = Period::where('user_id','=',Auth::user()->id)->get();

        $events = [];
        
        foreach($periods as $period){
            $events[] = \Calendar::event(
                $period->description,      //event title
                false,    //full day event?
                $period->start, 
                $period->end,
                $period->id
            );
        }

        $calendar = \Calendar::addEvents($events, [ //set custom color fo this event
                        'color' => '#ff0000',
                    ])->setOptions([ //set fullcalendar options
                        'firstDay' => 1,
                        'selectable'  => true,
                    ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
        ]); 

        return view('dashboard')
                    ->withUser($user)
                    ->withPeriods($periods)
                    ->withCalendar($calendar);
    }

    public function getPeriodList() {

        $periods = Period::where('user_id','=',Auth::user()->id)
                           ->orderBy('start', 'asc')
                           ->get();
        

        return view('periodlist')->withPeriods($periods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, array(
            'start'       => 'required|date_format:Y-m-d',
            'end'         => 'required|date_format:Y-m-d',
            'description' => 'sometimes|max:1000'
        ));

        //store to DB
        $period = new Period;

        $period->user_id = Auth::user()->id;
        $period->start = $request->start;
        $period->end = $request->end.' 23:59:00';
        $period->description = $request->description;
        
        // get the unique key...
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited
        for ($i=0; $i < 10; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        $period->uniquekey = $token;

        $period->save();

        Session::flash('success', 'The time entry is saved successfully!'); 

        //redirect
        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $this->validate($request, array(
            'start'       => 'required|date_format:Y-m-d',
            'end'         => 'required|date_format:Y-m-d',
            'description' => 'sometimes|max:1000'
        ));

        //store to DB
        $period = Period::find($id);

        $period->user_id = Auth::user()->id;
        $period->start = $request->start;
        $period->end = $request->end.' 23:59:00';
        $period->description = $request->description;

        $period->save();

        Session::flash('success', 'The time entry is updated successfully!'); 

        //redirect
        return redirect()->route('dashboard.periodlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find the specific period
        $period = Period::find($id);

        // isDeleted will be implemented soon...

        $period->delete();

        Session::flash('success', 'The time entry is deleted permanently!'); 

        //redirect
        return redirect()->route('dashboard.periodlist');
    }
}
