@extends('layout.master')

@section('title', 'Login page')

@section('content')
	

	  <div id="login-page">
	  	<div class="container">
	  	@if(Session::has('error'))
	  		<p class="alert alert-danger">{{Session::get('error')}}</p>
	  	@endif
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
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> Login</button>
		        </div>
		
		          <!-- Modal -->
		         {{--  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div> --}}
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>

@stop
