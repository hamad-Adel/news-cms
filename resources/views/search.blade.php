@extends('layout.master')
@section('title', 'Search')
@section('content')
<h2>Search Result: {{$result}}</h2>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 mb">
		<!-- WHITE PANEL - TOP USER -->
		<div class="white-panel pn">
			<div class="white-header">
				<h4><strong>News</strong></h4>
			</div>
			@if(count($news))
			<table class="table table-bordered table-striped table-condensed">
              <thead>
              <tr>
                  <th>Title</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>
             @foreach($news as $n)
				<tr>
					<td>{{$n->title}}</td>
					<td>
						<a class="btn btn-theme" href="news/edit/{{$n->slug}}">
							<i class="fa fa-pencil"></i>
							Edit
						</a>
			<form onclick="return confirm('Are you sure to delete?')" style="display: inline-block;" action="{{route('news.delete', ['id'=>$n->id])}}" method='post'>
				{{csrf_field()}}			
				<button type="submit" class="btn btn-theme04"		<i class="fa fa-eye"></i> Delete
						</button>	
			</form>
						<a class="btn btn-theme03" href="news/view/{{$n->slug}}">		<i class="fa fa-eye"></i>	
							View
						</a>
					</td>
				</tr>
             @endforeach                   
              </tbody>
          	</table>
          	@else
          	<p class="alert alert-info">No result was found</p>
			@endif
		</div>
	</div>
		<div class="col-lg-6 col-md-6 col-sm-12 mb">
		<!-- WHITE PANEL - TOP USER -->
		<div class="white-panel pn">
			<div class="white-header">
				<h4><strong>Category</strong></h4>
			</div>
			@if(count($cats))
			<table class="table table-bordered table-striped table-condensed">
              <thead>
              <tr>
                  <th>Title</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>
             @foreach($cats as $c)
				<tr>
					<td>{{$c->name}}</td>
					<td>
								<a class="btn btn-theme" href="category/edit/{{$c->id}}">
							<i class="fa fa-pencil"></i>
							Edit
						</a>
			<form onclick="return confirm('Are you sure to delete?')" style="display: inline-block;" action="{{route('category.delete', ['id'=>$c->id])}}" method='post'>
				{{csrf_field()}}			
				<button type="submit" class="btn btn-theme04"		<i class="fa fa-eye"></i> Delete
						</button>	
			</form>
						<a class="btn btn-theme03" href="category/view/{{$c->id}}">		<i class="fa fa-eye"></i>	
							View
						</a>
					</td>
				</tr>
             @endforeach                   
              </tbody>
          	</table>
          	@else
          	<p class="alert alert-info">No result was found</p>
			@endif
		</div>
	</div>
</div>
@stop