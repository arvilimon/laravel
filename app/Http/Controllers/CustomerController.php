<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;
use Auth;
use App\Sale;
use App\Billing_detail;
use App\Review;
use Carbon\Carbon;

class CustomerController extends Controller
{
  function customerdashboard()
  {
    $total_sale = Sale::where('user_id', Auth::id())->count();
    return view('customer/dashboard', compact('total_sale'));
  }
  function customarprofile()
    {
      return view('customer/profile');
    }
    function customarprofileinsert(Request $request)
    {

      Profile::insert([
        'user_id' => Auth::id(),
        'first_name' =>$request->first_name,
        'last_name' =>$request->last_name,
        'address' =>$request->address,
        'phone' =>$request->phone,
        'zip_code' =>$request->zip_code,
        'created_at' =>Carbon::now(),
      ]);
      return back();
    }
    function customarprofileupdate(Request $request)
    {

      Profile::where('user_id', Auth::id())->update([
        'first_name' =>$request->first_name,
        'last_name' =>$request->last_name,
        'address' =>$request->address,
        'phone' =>$request->phone,
        'zip_code' =>$request->zip_code,
      ]);
      return back();
    }
    function order()
    {
      $all_orders = Sale::where('user_id', Auth::id())->get();
      return view('customer/order', compact('all_orders'));
    }
    function customarorderdetails($sale_id)
    {
      $products = Billing_detail::where('sale_id', $sale_id)->get();
      return view('customer/orderdetails', compact('products'));
    }
    function addreview($billing_detail_id)
    {
      if (Review::where('billing_detail_id', $billing_detail_id)->exists()) {
        echo "You Provide Your Review Once!!!!";
      }
      else {
        return view('customer/review', compact('billing_detail_id'));
      }
    }
    function addreviewinsert(Request $request)
    {
      Review::insert([
        'product_id' => $request->product_id,
        'billing_detail_id' => $request->billing_detail_id,
        'user_id' => Auth::id(),
        'comments' => $request->comments,
        'rating' => $request->rating,
        'created_at' => Carbon::now(),
      ]);
      return redirect('customar/order');
    }
}
