<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Period;
use App\User;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Validator, Input, Redirect, Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProfile() {

    	$user = Auth::user();

    	return view('user.index')
                    ->withUser($user);

    }

    public function updateProfile(Request $request, $id) {
        $updateUser = User::find($id);
        //validation
        $this->validate($request, array(
               'name'     => 'required|max:500',
        ));
    	
        $updateUser->name = $request->name;
        $updateUser->save(); 
        
        Session::flash('success', 'Name updated successfully!');
                                  
        //redirect
        return redirect()->route('settings.profile');
    }

}
