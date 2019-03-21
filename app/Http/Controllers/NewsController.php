<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\NewsCreateRequest;
use App\NewsSubImages;
use App\News;
use Storage;
use File;
use Auth;

class NewsController extends Controller
{
	private function getCategories()
	{
		return \App\Category::all(['id','name']);
	}

	public function index() 
	{
		$news = News::with('subImages')->get();
		return view('news.index',['news'=>$news]);
	}

    public function create() 
    {
    	return view('news.create', ['categories'=>$this->getCategories()]);
    }

    public function view(Request $request) 
    {
    	$news = News::with('subImages')->where('slug', $request->slug)->firstOrFail();
    	// return $news;
    	return view('news.view', ['news'=>$news]);
    }

    public function createProcess(NewsCreateRequest $request)
    {
    	$file = $request->file('main_photo');
    	$name = time().rand(1, 1000000).$file->getClientOriginalName();
    	// file name, which file you want to save
    	Storage::disk('public')->put($name, File::get($file));
		$news = News::create([
			'title' => $request->title,
			'image' => $name,
			'slug' =>  Str::slug($request->title.time().rand(1, 10000), '-'),
			'category_id' => $request->category,
			'user_id' => Auth::user()->id,
			'content' => $request->content
		]);
		if ($news->id && $request->hasFile('photos')) {
			$photos = $request->file('photos');
			foreach ($photos as $photo):
		    	$photo_name = time().rand(1, 1000000).$photo->getClientOriginalName();
		    	Storage::disk('public')->put($photo_name, File::get($photo));
				NewsSubImages::create([
					'img' => $photo_name,
					'news_id' => $news->id
				]);
			endforeach;
			return redirect()->route('news.index')
					->with('success', 'News data saved successfully');
		}
		if (!$news)
			return redirect()->back()->with('error', 'Unable to save news');
		return redirect()->route('news.index')->with('success', 'News data saved successfully');

    }

    public function delete(Request $request)
    {
    	$news = News::findOrFail($request->id);
    	// return $news->subImages->img;
    	if (count($news->subImages)) {
    		foreach ($news->subImages as $img) {
    			unlink(public_path().$img->img);
    			$img->delete();
    		}
    	} 
		unlink(public_path().$news->image);
		$news->delete();
    	return redirect()->back()->with('success', 'News deleted');
    }

    public function edit(Request $request)
    {
    	$news =  News::where('slug',$request->slug)->firstOrFail();
    	return view('news.edit')->withCategories($this->getCategories())->withNews($news);
    }
}
