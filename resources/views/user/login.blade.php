@extends('layout.master')

@section('title', 'Login page')

@section('content')
	
	{{-- 
	email: task@gmail.com
	password: taskonepassword
	 --}}

	  <div id="login-page">
	      <form class="form-login" method='POST' action="{{route('login.post')}}">
	        <h2 class="form-login-heading">sign in now</h2>
	        <div class="login-wrap">
	            <input type="text" name="email" class="form-control" placeholder="Enter your email here" autofocus value={{old('email')}} >
	            @if($errors->has('email'))
	            	<p class="text-danger">{{$errors->first('email')}}</p>
            	@endif
	            <br>
	            <input type="password" name="password" class="form-control" placeholder="Enter your password">
	             @if($errors->has('password'))
	            	<p class="text-danger">{{$errors->first('password')}}</p>
            	@endif
				{{csrf_field()}}
	            <label class="pull-left for="remember">
	            	<input id="remember" type="checkbox" name="remember"> remember me
	            </label>
	           
	            <label class="checkbox">
	                <span class="pull-right">
	                    <a href="forget"> Forgot Password?</a>
	
	                </span>
	            </label>
	            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> Login</button>
	        </div>	
	      </form>	  	
	  </div>

@stop
