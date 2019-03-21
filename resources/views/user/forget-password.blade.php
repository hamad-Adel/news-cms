@extends('layout.master')

@section('title', 'Forget Password')
@section('content')
	<div class="row">
		<div class="col-md-5 col-md-offset-2">
			<div class="modal-content">
             <form action="{{route('reset')}}" method='post'>
             	{{csrf_field()}}
             	  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Forgot Password ?</h4>
                  </div>
                  <div class="modal-body">
                      <p>Enter your e-mail address below to reset your password.</p>
                      <input type="email" name="email" placeholder="Email" class="form-control placeholder-no-fix" value="{{old('email')}}">
                      @if($errors->has('email'))
						<p class="text-danger">{{$errors->first('email')}}</p>
                      @endif
						<br />
                      <input type="password" name="password" placeholder="new password" class="form-control placeholder-no-fix">
                      @if($errors->has('password'))
						<p class="text-danger">{{$errors->first('password')}}</p>
                      @endif
						<br />
                      <input type="password" name="password_confirmation" placeholder="confirm password" class="form-control placeholder-no-fix">
                      @if($errors->has('confirm_password'))
						<p class="text-danger">{{$errors->first('confirm_password')}}</p>
                      @endif

					<input class="btn btn-theme" type="Submit" value="Reset">
                  </div>
             </form>   
             </div>
		</div>
	</div>
@stop