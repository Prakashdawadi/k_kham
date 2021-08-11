<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registrationForm()
{
    return view('custom_auth.register');
}

/* POST
*/
public function registerUser(Request $request)
{
    $validate = \Validator::make($request->all(), [
        'name' 		=> 'required',
        'email'	 	=> 'required|email|unique:users|max:255',
        'password' 	=> 'required|confirmed|max:255'
    ]);
    if( $validate->fails()){
        return redirect()
        ->back()
        ->withErrors($validate);
    }
    $user_create = \App\User::create([
        'password'   => bcrypt($request->password),
        'email'      => $request->email,
        'name'       => $request->name
    ]);
    return redirect('/register')->with('success', 'Successfully registered');
}
}
