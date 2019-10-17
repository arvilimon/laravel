<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
   public function __construct()
 {
   $this->middleware('auth');
   $this->middleware('rolechecker');
  }
  function couponview()
  {
    $coupons = Coupon::all();

    return view('coupon/view', compact('coupons'));
  }
  function couponinsert(Request $request)
  {
    $request ->validate([
      'coupon_name' => 'unique:coupons,coupon_name',
      'discount_amount' => 'numeric|max:60'
    ]);
    Coupon::insert([
      'coupon_name' =>$request->coupon_name,
      'discount_amount' =>$request->discount_amount,
      'valid_till' =>$request->valid_till,
      'created_at' =>Carbon::now()
    ]);
    return back()->with('message','coupon Added successsssfully!');
  }
  function coupondelete($coupon_id)
  {

      Coupon::withTrashed()->find($coupon_id)->delete();
      return back();
  }
}
