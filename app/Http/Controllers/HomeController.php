<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Banner;
use App\About;
use App\Blog;
use Image;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
        // $this->middleware('rolechecker');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $users = User::paginate(1);
      return view('home', compact('users'));
    }
    function bannerview()
    {

       $banners = Banner::all();
       return view('banner/view', compact('banners'));
    }
    function bannerinsert(Request $request)
    {
      if ($request->hasFile('banner_image')) {
        $banner_image = $request->file('banner_image');
        $filename = str_random(30) . '.' . $banner_image->getClientOriginalExtension();
        Image::make($banner_image)->resize(1920, 1409)->save(base_path('public/uploads/banner_images/'.$filename),60);

        Banner::insert([
          'banner_name' => $request->banner_name,
          'banner_detile' => $request->banner_detile,
          'banner_image' => 'banner_images/'.$filename,
          'created_at' => Carbon::now()

        ]);
        return back()->with('status','Banner Inserted Successfulli!');
      }
      else {
        return back();
      }
    }
    function blogview()
    {

       // $blogs = Blog::all();
       return view('blog/view');
    }
    function bloginsert(Request $request)
    {
      if ($request->hasFile('blog_image')) {
        $blog_image = $request->file('blog_image');
        $filename = str_random(30) . '.' . $blog_image->getClientOriginalExtension();
        Image::make($blog_image)->resize(1920, 729)->save(base_path('public/uploads/blog_images/'.$filename),60);

        Blog::insert([
          'blog_name' => $request->blog_name,
          'blog_detile' => $request->blog_detile,
          'blog_image' => 'blog_images/'.$filename,
          'created_at' => Carbon::now()

        ]);
        return back()->with('status','Banner Inserted Successfulli!');
      }
      else {
        return back();
      }
    }
    function aboutview()
    {

       // $banners = Banner::all();
       return view('about/view');
    }
    function aboutoneinsert(Request $request)
    {
      if ($request->hasFile('aboutone_image')) {
        $aboutone_image = $request->file('aboutone_image');
        $filename = str_random(30) . '.' . $aboutone_image->getClientOriginalExtension();
        Image::make($aboutone_image)->resize(800, 897)->save(base_path('public/uploads/about_images/'.$filename),60);

        About::insert([
          'about_name' => $request->aboutone_name,
          'about_link' => $request->about_link,
          'about_image' => 'about_images/'.$filename,
          'created_at' => Carbon::now()

        ]);
        return back()->with('status','about Inserted Successfulli!');
      }
      else {
        return back();
      }
    }
}
