<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use App\category;
use Image;

class ProductController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('rolechecker');
  }
  function productview()
  {
    $categories = category::all();
    $products = Product::paginate(4);
    $sofdeletes = Product::onlyTrashed()->get();
    return view('product/productview', compact('products', 'sofdeletes', 'categories'));
  }
  function productdelete($product_id)
  {

      product::withTrashed()->find($product_id)->delete();
      return back();
  }
  function productRestore($product_id)
  {
    $product_restore = product::onlyTrashed()->findorFail($product_id)->restore();
    return back();
  }
  function productinsert(Request $request){

    $request->validate([
      'product_name' => 'required',
      'product_price' => 'required',
      'product_details' => 'required',
      'product_quantity' => 'required | numeric',
      'alert_quantity' => 'required | numeric',
    ],[
      'product_name.required' =>'The product name field  dow',


    ]);
    $lastinsertedid = Product::insertGetId([
      'category_id' =>$request->category_id,
      'product_name' =>$request->product_name,
      'product_price' =>$request->product_price,
      'product_details' =>$request->product_details,
      'product_quantity' =>$request->product_quantity,
      'alert_quantity' =>$request->alert_quantity,
      'created_at' => Carbon::now()
    ]);
    if ($request->hasFile('product_image')) {
      $main_photo = $request->product_image;
      $imagename = $lastinsertedid. ".".$main_photo->getClientOriginalExtension();
      Image::make($main_photo)->resize(400, 450)->save(base_path('public/uploads/product_images/'.$imagename));
      Product::find($lastinsertedid)->update([
        'product_image' => $imagename
      ]);
    }
    return back()->with('message','The product is successsssfully!.');
  }
  // return view('product/productview');


function productedit($product_id)
{
  $product_info = product:: findorFail($product_id);
    return view('product/edit',compact('product_info'));
}
function producteditinsert(Request $request)
  {
    print_r($request->all());
    product:: find($request->product_id)->update([
      'product_name' => $request->product_name,
      'product_details' => $request->product_details,
      'product_price' => $request->product_price,
      'product_quantity' => $request->product_quantity,
      'alert_quantity' => $request->alert_quantity,
    ]);
    if ($request->hasFile('product_image')) {
      if(Product::find($request->product_id)->product_image != 'defaultproductimage.jpg'){
        $nameToDelete = Product::find($request->product_id)->product_image;
        unlink(base_path('public/uploads/product_images/'.$nameToDelete));
      }
      $main_photo = $request->product_image;
      $imagename = $request->product_id. ".".$main_photo->getClientOriginalExtension();
      Image::make($main_photo)->resize(400, 450)->save(base_path('public/uploads/product_images/'.$imagename));
      Product::find($request->product_id)->update([
        'product_image' => $imagename
      ]);
    }
    return back()->with('status','product Edited Successfulli!');
  }

}
