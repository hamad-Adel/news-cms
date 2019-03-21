@if (Session::has('error')) 
	<p class="alert alert-danger"> <strong>{{ Session::get('error') }}</strong> </p>
@elseif(Session::has('success'))
	<p class="alert alert-success"> <strong>{{ Session::get('success') }}</strong> </p>
@endif