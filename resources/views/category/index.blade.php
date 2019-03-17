@extends('layout.master')
@section('title', 'Categories')
@section('content')
	<h2> <i class="fa fa-tasks"></i> Categories</h2>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Category name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
				<tr>
					<td>{{$category->name}}</td>
					<td>
						<a class="btn btn-theme" href="category/edit/{{$category->id}}">
							<i class="fa fa-pencil"></i>
							Edit
						</a>
						<a class="btn btn-theme04" href="category/delete/{{$category->id}}">	
							<i class="fa fa-trash"></i>
							Delete
						</a>
						<a class="btn btn-theme03" href="category/view/{{$category->id}}">		<i class="fa fa-eye"></i>	
							View
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop