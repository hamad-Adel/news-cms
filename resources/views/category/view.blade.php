@extends('layout.master')
@section('title', $category->name)
@section('content')
	<h2> <i class="fa fa-eye"></i> View Category</h2>
	<p>Category name: {{$category->name}}</p>

@stop
