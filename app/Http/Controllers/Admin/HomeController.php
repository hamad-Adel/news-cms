<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Category, News};

class HomeController extends Controller
{
    public function dashboard() 
    {
    	$categories = Category::count();
    	$news = News::count();
    	return view('user.dashboard', ['categories'=>$categories, 'news'=>$news]);
    }
}
