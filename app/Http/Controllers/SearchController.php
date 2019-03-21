<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
    	$query = '%'.request('query').'%';
    	$news = \App\News::where('title','like',$query)->get(['id','title', 'slug']);
	    $cats = \App\Category::where('name', 'like', $query)->get(['id', 'name']);
    	return view('search')->withNews($news)->withCats($cats)->withResult(request('query'));
    }
}
