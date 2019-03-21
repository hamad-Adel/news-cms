<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\resetPasswordRequest;
use Auth;

class AuthController extends Controller
{
    public function login() 
    {
    	if (Auth::check())
    		return redirect()->route('dashboard');

    	return view('user.login');
    }

    public function loginProcess (UserLoginRequest $request) 
    {
    	$validation = $request->validated();

    	$userCredentials = [
    		'email' 	=> $request->get('email'),
    		'password'  => $request->get('password')
    	];

    	if (Auth::attempt($userCredentials))
    		return redirect()->route('dashboard');
    	return redirect()->back()->with('error', 'invalid credentials!');
    }

    public function forget()
    {
        return view('user.forget-password');
    }


    public function resetPassword(resetPasswordRequest $request)
    {

        $user = \App\User::where('email', $request->email)->first();
        // return $user;
        if ($user) {
            $user->password = \Hash::make($request->password);
            $user->update();
            return redirect()->route('login')->with('success', 'Your password was changed successfully');
        }
        return redirect()->back()->with('error', 'invalid email');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
