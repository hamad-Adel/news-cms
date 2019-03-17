@extends('layout.master')
@section('title', 'Create category')
@section('content')
	<h2> <i class="fa fa-plus"></i> Create New Category</h2>

<form class="form-login" method='POST' action="{{route('create')}}">
	@if (Session::has('success'))
		<p class="alert alert-success">{{Session::get('success')}}</p>
	@endif
	<div class="login-wrap">
	    <input type="text" name="name" class="form-control" placeholder="Enter category name" autofocus value={{old('name')}} >
	    @if($errors->has('name'))
	    	<p class="text-danger">{{$errors->first('name')}}</p>
		@endif
		{{csrf_field()}}
		<br />
	    <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-plus"></i> Add</button>
	</div>
</form>
@stop
