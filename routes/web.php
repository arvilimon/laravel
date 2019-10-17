<?php
//All frontend Routeing//

Route::get('/','FrontendController@index');
Route::get('our/product','FrontendController@ourproduct');
Route::get('/product/details/{product_id}','FrontendController@productdetails');
Route::get('contact','FrontendController@contact');
Route::get('about','FrontendController@about');
Route::get('blog','FrontendController@blog');
Route::get('shop','FrontendController@shop');
Route::get('productdetail/{product_id}','FrontendController@productdetail');
Route::post('chekout','FrontendController@chekout');
Route::post('checkout/insert','FrontendController@checkoutinsert');
Route::post('city/list','FrontendController@citylist');
Route::get('Shipping/Cart','FrontendController@ShippingCart');
Route::get('Shipping/Cart/{coupon_name}','FrontendController@ShippingCart');
Route::get('addCart/{product_id}','FrontendController@addCart');
Route::get('order/complet','FrontendController@ordercomplet');
Route::get('wishlist','FrontendController@wishlist');
Route::get('category/wise/product/{category_id}','FrontendController@categorywiseproduct');
Route::get('shop/{category_id}', 'FrontendController@allcategories');
Route::get('clear/cart', 'FrontendController@clearcart');
Route::post('update/cart','FrontendController@updatecart');
Route::get('customar/register','FrontendController@customarregister');
Route::post('customar/register/insert','FrontendController@customarregisterinsert');
Route::get('single/cart/delete/{cart_id}', 'FrontendController@singlecartdelete');


Route::get('welcome/email', 'FrontendController@welcomeemail');

Route::get('change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('banner/view', 'HomeController@bannerview');
Route::post('banner/insert', 'HomeController@bannerinsert');
Route::get('about/view', 'HomeController@aboutview');
Route::post('aboutone/insert', 'HomeController@aboutoneinsert');
Route::get('blog/view', 'HomeController@blogview');
Route::post('blog/insert', 'HomeController@bloginsert');

//testing
Route::get('/test', function(){
  return new App\Mail\OrderConfirm(26);
});

//customar controller
Route::get('customer/dashboard','CustomerController@customerdashboard');
Route::get('customar/profile','CustomerController@customarprofile');
Route::post('customar/profile/insert','CustomerController@customarprofileinsert');
Route::post('customar/profile/update','CustomerController@customarprofileupdate');
Route::get('customar/order','CustomerController@order');
Route::get('customar/order/details/{sale_id}','CustomerController@customarorderdetails');
Route::get('add/review/{billing_detail_id}','CustomerController@addreview');
Route::post('add/review/insert','CustomerController@addreviewinsert');

//all backend rauting
Route::get('product/view','productController@productview');
Route::post('product/insert','productController@productinsert');
Route::get('product/delete/{product_id}','ProductController@productdelete');
Route::get('product/edit/{product_id}','ProductController@productedit');
Route::post('product/edit/insert','ProductController@producteditinsert');
Route::get('product/restore/{product_id}','ProductController@productRestore');

// category rauting

Route::get('category/view','CategoryController@categoryview');
Route::post('category/insert','categoryController@categoryinsert');
Route::get('category/delete/{category_id}','CategoryController@categorydelete');

// Coupon rauting

Route::get('coupon/view','CouponController@couponview');
Route::post('coupon/insert','CouponController@couponinsert');


// payment rauting

Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
