<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryCreateRequest;
use App\Category;
use Auth;

class CategoryController extends Controller
{

	public function index() 
	{
		$categories = Category::all();
		return view('category.index')->with('categories', $categories);
	}

    public function create()
    {
    	return view('category.create');
    }

    public function createProcess(CategoryCreateRequest $request) 
    {
    	Category::create([
    		'name' => $request->get('name'),
    		'user_id' => Auth::user()->id
    	]);
		return redirect()->back()->with('success', 'Category '. $request->get('name'). ' saved');
    }

    public function view(Request $request)
    {
    	return view('category.view')
    			->with('category',  Category::where('id', $request->id)->get()[0]);
    }
}
