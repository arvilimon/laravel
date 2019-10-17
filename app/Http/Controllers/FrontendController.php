<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use App\Coupon;
use App\User;
use App\Country;
use App\City;
use Carbon\Carbon;
use App\Billing;
use App\Billing_detail;
use App\Sale;
use Auth;
use Session;
use Mail;
use App\Banner;
use App\Blog;
use App\About;
use App\Mail\OrderConfirm;


class FrontendController extends Controller
{
  function index()
  {

    $ourproducts = Product::all();
    $banners = Banner::all();
    $blogs = Blog::all();
    $abouts = About::all();
    return view('welcome', compact('ourproducts', 'banners', 'blogs', 'abouts'));
  }
  function about()
  {
    return view('about');
  }
  function blog()
  {
    return view('blog');
  }
  function welcomeemail()
  {
    return view('welcomeemail');
  }
  function shop()
  {
    $products = Product::paginate(6);
    $categorys = Category::all();
    return view('shop', compact('products', 'categorys'));
  }
  function addCart($product_id)
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    if(Cart::where('customar_ip', $ip_address)->where('product_id', $product_id)->exists()){
      Cart::where('customar_ip', $ip_address)->where('product_id', $product_id)->increment('product_quantity', 1);
      return back();
    }
    else {
      Cart::insert([
        'customar_ip' => $ip_address,
        'product_id' => $product_id,
        'created_at' => Carbon::now(),
      ]);
    return back();
   }
  }
  function ShippingCart($coupon_name = "")
  {
    if($coupon_name == ""){
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $cart_items = Cart::where('customar_ip', $ip_address)->get();
        $coupon_discount_amount = 0;
        return view('ShippingCart', compact('cart_items', 'coupon_discount_amount', 'coupon_name'));
      }
      else{
        if(Coupon::where('coupon_name', $coupon_name)->exists()){
          if(Carbon::now()->format('Y-m-d') <= Coupon::where('coupon_name', $coupon_name)->first()->valid_till){
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $cart_items = Cart::where('customar_ip', $ip_address)->get();
            $coupon_discount_amount = Coupon::where('coupon_name', $coupon_name)->first()->discount_amount;
            return view('ShippingCart', compact('cart_items', 'coupon_discount_amount', 'coupon_name'));
          }
          else {
            echo "invalid coupon";
          }
        }
        else {
          echo "coupon nai";
        }
      }
    }
  function productdetail($product_id)
  {
    $productinfo = product::find($product_id);
    $related_products =product::where('category_id', $productinfo->category_id)->where('id', '!=', $product_id)->get();
    return view('productdetail', compact('productinfo', 'related_products'));
  }
  function chekout(Request $request)
  {
    $grand_total = $request->grand_total;
    $countries = Country::all();
    return view('chekout', compact('countries', 'grand_total'));
  }
  function checkoutinsert(Request $request)
  {
    $billing_id = Billing::insertGetId([
      'user_id' => Auth::id(),
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'address' => $request->address,
      'phone' => $request->phone,
      'zip_code' => $request->zip_code,
      'country_id' => $request->country_id,
      'city_id' => $request->city_id,
      'payment_type' => $request->payment_type,
      'payment_status' => 1,
      'created_at' =>Carbon::now()
    ]);
    $sale_id = Sale::insertGetId([
      'user_id' => Auth::id(),
      'billing_id' => $billing_id,
      'grand_total' => $request->grand_total,
      'created_at' =>Carbon::now()
    ]);

      session(['sale_id' => $sale_id]);

    $ip_address = $_SERVER['REMOTE_ADDR'];
    $cart_items = Cart::where('customar_ip', $ip_address)->get();
    foreach ($cart_items as $cart_item) {
      Billing_detail:: insert([
        'sale_id' => $sale_id,
        'product_id' => $cart_item->product_id,
        'product_unit_price' => Product::find($cart_item->product_id)->product_price,
        'product_quantity' => $cart_item->product_quantity,
        'created_at' =>Carbon::now()
      ]);
      Product::find($cart_item->product_id)->decrement('product_quantity',$cart_item->product_quantity);
      $cart_item->delete();
    }
    if($request->payment_type == 1){
      Mail::send(new OrderConfirm($sale_id));
      Session::flash('success_cod', 'your Order successful!');
      return redirect('Shipping/Cart');
    }
    else if($request->payment_type ==2){
      $grand_total = $request->grand_total;
      return redirect('stripe')->with('grand_total', $grand_total)->with('billing_id', $billing_id);
    }
  }
  function citylist(Request $request)
  {
    $stringToSend = "<option>Select One</option>";
    $cities = City::where('country_id', $request->country_id)->get();
    foreach ($cities as $city) {
      $stringToSend .= "<option value='".$city->id."'>".$city->name."</option>";
    }
    echo $stringToSend;
  }
  function ordercomplet()
  {
    return view('ordercomplet');
  }
  function wishlist()
  {
    return view('wishlist');
  }
  function contact()
  {
    return view('contact');
  }
  function categorywiseproduct($category_id)
  {
    $products = Product::where('category_id', $category_id)->get();
    return view('categorywiseproduct', compact('products'));
  }

  function allcategories($category_id){
      $products =  Product::where('category_id', $category_id)->paginate();
      return view('shop', compact('products'));
  }
  function clearcart()
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    Cart::where('customar_ip', $ip_address)->delete();
    return back();
  }
  function singlecartdelete($cart_id)
  {
     Cart::find($cart_id)->delete();
     return back();
  }
  function updatecart(Request $request)
  {
    print_r($request->all());
    $ip_address = $_SERVER['REMOTE_ADDR'];
    foreach ($request->product_id as $key_of_product_id => $value_of_product_id) {
    if (Product::find($value_of_product_id)->product_quantity >= $request->user_given_quantity [$key_of_product_id]) {
      Cart::where('customar_ip', $ip_address)->where('product_id', $value_of_product_id)->update([
        'product_quantity' => $request->user_given_quantity [$key_of_product_id]
      ]);

    }
     }
    return back();
    }
    function customarregister()
    {
      return view('customarregister');
    }
    function customarregisterinsert(Request $request)
   {
     User::insert([
       'name' => $request->name,
       'email' => $request->email,
       'password' => bcrypt($request->password),
       'role' => 2,
       'created_at' => Carbon::now()
     ]);
     return back();
   }
   function test()
   {
     Mail::send(new OrderConfirm());
   }
}
