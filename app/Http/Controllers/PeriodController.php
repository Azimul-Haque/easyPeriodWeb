<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

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

        $username = Auth::user();

        $events = [];
        
        for($i = 1; $i<10; $i++) {
            $events[] = \Calendar::event(
                "",      //event title
                true,    //full day event?
                '2017-0'.$i.'-27', 
                '2017-0'.$i.'-30', 
                $i
            );
        }

        $calendar = \Calendar::addEvents($events, [ //set custom color fo this event
                        'color' => '#ff0000',
                    ])->setOptions([ //set fullcalendar options
                        'firstDay' => 1,
                        'selectable'  => true,
                    ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
        ]); 

        return view('home')
                    ->withUser($username)
                    ->withCalendar($calendar);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
