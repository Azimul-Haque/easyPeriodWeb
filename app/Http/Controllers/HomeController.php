<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

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
}
