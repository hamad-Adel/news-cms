@extends('layout.master')
@section('title', $news->slug)
@section('content')

	<h2> {{$news->title}} </h2>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<p>{{$news->title}}</p>
		</div>
		<div class="col-md-6">
			<img class="img-responsive" src="{{asset($news->image)}}" alt="{{$news->title}}">
		</div>
		<div class="col-md-3">
			<p>Category: <strong>{{$news->category->name}}</strong></p>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<p>{{$news->content}}</p>
		</div>
	</div>

	@if(count($news->subImages))
		<div class="row">
			@foreach($news->subImages as $img)
				<div class="col-md-3">
					<img src="{{asset($img->img)}}" alt="{{$news->title}}" class="img-responsive">
				</div>
			@endforeach
		</div>
	@endif
@stop