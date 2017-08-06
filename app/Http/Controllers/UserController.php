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
        
        //validation
        $this->validate($request, array(
               'name'     => 'required|max:500',
        ));
        
        $updateUser = User::find($id);

        $updateUser->name = $request->name;
        $updateUser->save(); 
        
        Session::flash('success', 'Name updated successfully!');
                                  
        //redirect
        return redirect()->route('settings.profile');
    }

    public function getPassword() {

        $user = Auth::user();

    	return view('user.password')->withUser($user);

    }

    public function updatePassword(Request $request, $id) {
        
        //validation
        $this->validate($request, array(
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
       ));


        // update to DB
        $user = User::find($id);

        $user->password = bcrypt($request->password);
        $user->save();

        Session::flash('success', 'Password is updated successfully!');

        //redirect
        return redirect()->route('settings.password');
    }

}
