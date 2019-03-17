<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\Http\Controllers\Controller;
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

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
