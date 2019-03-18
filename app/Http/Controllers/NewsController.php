<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsCreateRequest;
use App\News;
use App\NewsSubImages;
use Auth;

class NewsController extends Controller
{
	public function index() 
	{
		return view('news.index');
	}

    public function create() 
    {
    	$categories = \App\Category::all(['id','name']);
    	return view('news.create', ['categories'=>$categories]);
    }

    public function createProcess(NewsCreateRequest $request)
    {
    	// return $request->all();
    	$mainPhoto =  $request->file('main_photo');
		$name =   explode('.', $mainPhoto->getClientOriginalName())[0];
		$exe =   $mainPhoto->getClientOriginalExtension();
		$newMainPhoto = 'mainPhoto'.time().$name.'.'.$exe;

		$mainPhoto->move(public_path('uploads'), $newMainPhoto);
		$news = News::create([
			'title' => $request->title,
			'main_img' => $newMainPhoto,
			'category_id' => $request->category,
			'user_id' => Auth::user()->id,
			'content' => $request->content
		]);
		// return $news->id;

		if ($news->id) {
			$photos = $request->file('photos');
			foreach ($photos as $photo):
				$subImg = explode('.', $photo->getClientOriginalName())[0];
				$subExe = $photo->getClientOriginalExtension();
				$newSubImg = 'subImage'.time().$subExe.'.'.$subExe;
				$photo->move(public_path('uploads/subImages'), $newSubImg);
				NewsSubImages::create([
					'img' => $newSubImg,
					'news_id' => $news->id
				]);
			endforeach;
			return redirect()->route('news.index')->with('success', 'News data saved successfully');
		}
		return redirect()->back()->with('error', 'Unable to save news');

    }
}
