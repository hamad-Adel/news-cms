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
        $request['user_id'] = Auth::user()->id;
    	Category::create($request->all());
		return redirect()->back()->with('success', 'Category '. $request->get('name'). ' saved');
    }

    public function view(Request $request)
    {
        $category = Category::where('id', $request->id)->firstOrFail();
        return view('category.view')->withCategory($category);
    }

    public function edit(Request $request)
    {
        $category = Category::where('id', $request->id)->firstOrFail();
        return view('category.edit')->withCategory($category);
    }

    public function editProcess(CategoryCreateRequest $request)
    {
        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('success', 'Category Updated Successfully'); 
    }

    public function delete(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted'); 
 
    }
}
