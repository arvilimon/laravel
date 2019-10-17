@extends('layouts.frontendmaster')

@section('frontend_main')
  <aside id="colorlib-hero" class="breadcrumbs">
  			<div class="flexslider">
  				<ul class="slides">
  			   	<li style="background-image: url({{ asset('frontend_assets/images/cover-img-1.jpg') }});">
  			   		<div class="overlay"></div>
  			   		<div class="container-fluid">
  			   			<div class="row">
  				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
  				   				<div class="slider-text-inner text-center">
  				   					<h1>Products</h1>
  				   					<h2 class="bread"><span><a href="{{ url('/') }}">Home</a></span> <span>Shop</span></h2>
  				   				</div>
  				   			</div>
  				   		</div>
  			   		</div>
  			   	</li>
  			  	</ul>
  		  	</div>
  		</aside>

  		<div class="colorlib-shop">
  			<div class="container">
  				<div class="row">
  					<div class="col-md-10 col-md-push-2">
  						<div class="row row-pb-lg">
                @foreach ($products as $product)
  							<div class="col-md-4 text-center">
  								<div class="product-entry">
  									<div class="product-img" style="background-image: url({{ asset('uploads/product_images') }}/{{ $product->product_image }});">
  										<p class="tag"><span class="new">New</span></p>
  										<div class="cart">
  											<p>
  												<span class="addtocart"><a href="{{ url('addCart') }}/{{ $product->id }}"><i class="icon-shopping-cart"></i></a></span>
  												<span><a href="{{ url('productdetail') }}/{{ $product->id }}"><i class="icon-eye"></i></a></span>
  												<span><a href="#"><i class="icon-heart3"></i></a></span>
  												<span><a href="{{ url('wishlist') }}"><i class="icon-bar-chart"></i></a></span>
  											</p>
  										</div>
  									</div>
  									<div class="desc">
  										<h3><a href="{{ url('productdetail') }}/{{ $product->id }}">{{ $product->product_name }}</a></h3>
  										<p class="price"><span>$300.00</span></p>
  									</div>
  								</div>
  							</div>
                @endforeach
  						</div>
              {{ $products->links() }}
  					</div>
  					<div class="col-md-2 col-md-pull-10">
  						<div class="sidebar">
  							<div class="side">
  								<h2>Categories</h2>
  								<div class="fancy-collapse-panel">
                    @php
                      $allcategory = App\category::all();
                    @endphp
  			                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            @foreach ($allcategory as $category)
                              <div class="panel panel-default">
   			                         <div class="panel-heading" role="tab" id="headingOne">
   			                             <h4 class="panel-title">
   			                                 <a href="{{ url('shop') }}/{{ $category->id }}"
                                          aria-expanded="true" aria-controls="collapseOne">{{ $category->category_name }}
   			                                 </a>
   			                             </h4>
   			                         </div>
   			                     </div>
                            @endforeach
  			                  </div>
  			               </div>
  							</div>
  							{{-- <div class="side">
  								<h2>Price Range</h2>
  								<form method="post" class="colorlib-form-2">
  				              	<div class="row">
  				                <div class="col-md-12">
  				                  <div class="form-group">
  				                    <label for="guests">Price from:</label>
  				                    <div class="form-field">
  				                      <i class="icon icon-arrow-down3"></i>
  				                      <select name="people" id="people" class="form-control">
  				                        <option value="#">1</option>
  				                        <option value="#">200</option>
  				                        <option value="#">300</option>
  				                        <option value="#">400</option>
  				                        <option value="#">1000</option>
  				                      </select>
  				                    </div>
  				                  </div>
  				                </div>
  				                <div class="col-md-12">
  				                  <div class="form-group">
  				                    <label for="guests">Price to:</label>
  				                    <div class="form-field">
  				                      <i class="icon icon-arrow-down3"></i>
  				                      <select name="people" id="people" class="form-control">
  				                        <option value="#">2000</option>
  				                        <option value="#">4000</option>
  				                        <option value="#">6000</option>
  				                        <option value="#">8000</option>
  				                        <option value="#">10000</option>
  				                      </select>
  				                    </div>
  				                  </div>
  				                </div>
  				              </div>
  				            </form>
  							</div>
  							<div class="side">
  								<h2>Color</h2>
  								<div class="color-wrap">
  									<p class="color-desc">
  										<a href="#" class="color color-1"></a>
  										<a href="#" class="color color-2"></a>
  										<a href="#" class="color color-3"></a>
  										<a href="#" class="color color-4"></a>
  										<a href="#" class="color color-5"></a>
  									</p>
  								</div>
  							</div>
  							<div class="side">
  								<h2>Size</h2>
  								<div class="size-wrap">
  									<p class="size-desc">
  										<a href="#" class="size size-1">xs</a>
  										<a href="#" class="size size-2">s</a>
  										<a href="#" class="size size-3">m</a>
  										<a href="#" class="size size-4">l</a>
  										<a href="#" class="size size-5">xl</a>
  										<a href="#" class="size size-5">xxl</a>
  									</p>
  								</div>
  							</div> --}}
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>

@endsection
