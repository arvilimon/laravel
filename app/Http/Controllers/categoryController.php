<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Carbon\carbon;

class CategoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('rolechecker');
  }
  function categoryview()
  {
    $categorise = Category::all();
    return view('category/view', compact('categorise'));
  }
  function categoryinsert(Request $request)
  {
    $request->validate([
      'category_name' => 'required'
    ],
    [
      'category_name.required' => 'Please Enter your Category Name'
    ]
    );
    Category::insert([
      'category_name' => $request->category_name,
      'created_at' => Carbon::now()
    ]);
    return back()->with('status', 'Category added successfully!');
  }
  function categorydelete($category_id)
  {

      Category::find($category_id)->delete();
      return back();
  }
}
