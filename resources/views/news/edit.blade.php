@extends('layout.master')
@section('title', 'Edit-'. $news->slug)
@section('content')
	<h2> <i class="fa fa-edit"></i> Edit News</h2>
<form class="" method='POST' action="{{route('news.create')}}" enctype='multipart/form-data'>
	@if (Session::has('success'))
		<p class="alert alert-success">{{Session::get('success')}}</p>
	@endif
	<div class="row">
		<div class="col-md-4">
		<label for="title">News Title</label>
		<input type="text" id="title" name="title" class="form-control" value="{{$news->title}}" >
	    @if($errors->has('title'))
	    	<p class="text-danger">{{$errors->first('title')}}</p>
		@endif
	</div>
	<div class="col-md-4">
		<label for="main-photo">Upload main photo</label>
		<input type="file" id="main-photo" name="main_photo" class="form-control"/>
	    @if($errors->has('main_photo'))
	    	<p class="text-danger">{{$errors->first('main_photo')}}</p>
		@endif
		<div class="project-wrapper">
            <div class="project">
                <div class="photo-wrapper">
                    <div class="photo">
                    	<a class="fancybox" href="http://127.0.0.1:8000{{$news->image}}"><img class="img-responsive" src="{{$news->image}}" alt=""></a>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
	</div>
	<div class="col-md-4">
		<label for="cat">Category</label>
		<select id="cat" name="category" class="form-control" value={{old('category')}} >
			<option value> Select </option>
			@foreach($categories as $cat)
				<option value="{{$cat->id}}" 
					{{$news->category_id === $cat->id ? 'selected': ''}}
					>
					{{$cat->name}}
				</option>
			@endforeach
		</select>
	    @if($errors->has('category'))
	    	<p class="text-danger">{{$errors->first('category')}}</p>
		@endif
	</div>
	</div>
	<br />
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="content">Content</label>
			    <textarea cols="6" rows="8" name="content" id="content" class="form-control">
			    	{{$news->content}}
			    </textarea>
			    @if($errors->has('content'))
			    	<p class="text-danger">{{$errors->first('content')}}</p>
				@endif
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-4">
			<label for="multiple">Upload multiple photos</label>
			<input type="file" id="multiple" name="photos[]" multiple='multiple' class="form-control"/>
			@if(count($news->subImages))
				<div class="row">
					@foreach($news->subImages as $img)
					<div class="col-md-4">
					<div class="project-wrapper">
		                    <div class="project">
		                        <div class="photo-wrapper">
		                            <div class="photo">
		                            	<a class="fancybox" href="http://127.0.0.1:8000{{$img->img}}"><img class="img-responsive" src="{{$img->img}}" alt=""></a>
		                            </div>
		                            <div class="overlay"></div>
		                        </div>
		                    </div>
		                </div>
						</div>	
					@endforeach
				</div>
			@endif
		</div>
		@if($errors->has('photos'))
	    	<p class="text-danger">{{$errors->first('photos')}}</p>
		@endif
	</div>
	{{csrf_field()}}
	<input type="submit" name="submit" class="btn btn-theme04" value="Add">

</form>
@stop