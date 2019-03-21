@extends('layout.master')
@section('title', 'News-Create')
@section('content')
	<h2> <i class="fa fa-file-text fa-2x"></i> News</h2>
	@if(count($news))
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Category name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($news as $new)
					<tr>
						<td>{{$new->title}}</td>
						<td>
						<a class="btn btn-theme" href="news/edit/{{$new->slug}}">
							<i class="fa fa-pencil"></i>
							Edit
						</a>
					<form onclick="return confirm('Are you sure to delete?')" style="display: inline-block;" action="{{route('news.delete', ['id'=>$new->id])}}" method='post'>
						{{csrf_field()}}			
						<button type="submit" class="btn btn-theme04"		<i class="fa fa-eye"></i> Delete
								</button>	
					</form>
					
						<a class="btn btn-theme03" href="news/view/{{$new->slug}}">		<i class="fa fa-eye"></i>	
							View
						</a>
					</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<p style="font-size: 24px" class="alert alert-info"> No news to list</p>
	@endif
@stop