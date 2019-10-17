@extends('layouts.frontendmaster')

@section('frontend_main')
  <aside id="colorlib-hero" class="breadcrumbs">
  			<div class="flexslider">
  				<ul class="slides">
  			   	<li style="background-image: url({{ url('frontend_assets') }}/images/cover-img-1.jpg);">
  			   		<div class="overlay"></div>
  			   		<div class="container-fluid">
  			   			<div class="row">
  				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
  				   				<div class="slider-text-inner text-center">
  				   					<h1>Shopping Cart</h1>
  				   					<h2 class="bread"><span><a href="index.html">Home</a></span> <span><a href="shop.html">Product</a></span> <span>Shopping Cart</span></h2>
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
  				<div class="row row-pb-md">
  					<div class="col-md-10 col-md-offset-1">
  						<div class="process-wrap">
  							<div class="process text-center active">
  								<p><span>01</span></p>
  								<h3>Shopping Cart</h3>
  							</div>
  							<div class="process text-center">
  								<p><span>02</span></p>
  								<h3>Checkout</h3>
  							</div>
  							<div class="process text-center">
  								<p><span>03</span></p>
  								<h3>Order Complete</h3>
  							</div>
  						</div>
  					</div>
  				</div>
  				<div class="row row-pb-md">
  					<div class="col-md-10 col-md-offset-1">
  						<div class="product-name">
  							<div class="one-forth text-center">
  								<span>Product Details</span>
  							</div>
  							<div class="one-eight text-center">
  								<span>Price</span>
  							</div>
  							<div class="one-eight text-center">
  								<span>Quantity</span>
  							</div>
  							<div class="one-eight text-center">
  								<span>Total</span>
  							</div>
  							<div class="one-eight text-center">
  								<span>Remove</span>
  							</div>
  						</div>
              @php
                $sub_total = 0
              @endphp
              @if (session('success_cod'))
                <div class="alert alert-success">
                  {{ session('success_cod') }}
                </div>
              @endif
              @if (session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif
              <form action="{{ url('update/cart') }}" method="post">

              @foreach ($cart_items as $cart_item)
  						<div class="product-cart">
  							<div class="one-forth">
  								<div class="product-img" style="background-image: url({{ asset('uploads/product_images') }}/{{ $cart_item->relationToProduct->product_image }});">
  								</div>
  								<div class="display-tc">
  									<h3>{{ $cart_item->relationToProduct->product_name }}</h3>
  								</div>
  							</div>
  							<div class="one-eight text-center">
  								<div class="display-tc">
  									<span class="price">${{ $cart_item->relationToProduct->product_price }}</span>
  								</div>
  							</div>
  							<div class="one-eight text-center">
  								<div class="display-tc">
                    <input type="hidden" name="product_id[]" value="{{ $cart_item->product_id }}">
  									<input type="number" id="quantity" name="user_given_quantity[]" class="form-control input-number text-center" value="{{ $cart_item->product_quantity }}" min="1" max="100">

  								</div>
  							</div>
  							<div class="one-eight text-center">
  								<div class="display-tc">
  									<span class="price">
                      ${{ $cart_item->relationToProduct->product_price*$cart_item->product_quantity }}
                      @php
                        $sub_total = $sub_total + ($cart_item->relationToProduct->product_price*$cart_item->product_quantity);
                      @endphp
                    </span>
  								</div>
  							</div>
  							<div class="one-eight text-center">
  								<div class="display-tc">
  									<a href="{{ url('single/cart/delete') }}/{{ $cart_item->id }}" class="closed"></a>
  								</div>
  							</div>
  						</div>
              @endforeach
  					</div>
  				</div>

          {{-- cart apply --}}
          @csrf
          <div class="row cart-buttons text-left">
				<div class="col-lg-6 col-md-6 text-right">
          <a href="{{ url('clear/cart') }}"  class="btn btn-danger">Clear cart</a>
          <button type="submit" class="btn btn-primary ">Update Cart</button>
				</div>
			</div>
      </form>
		</div>
		<div class="card-warp">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="shipping-info">
							<h4>Shipping method</h4>
							<p>Select the one you want</p>
							<div class="shipping-chooes">
								<div class="sc-item">
									<input type="radio" name="sc" id="one">
									<label for="one" id="lavel_one">Next day delivery<span>$4.99</span></label>
								</div>
								<div class="sc-item">
									<input type="radio" name="sc" id="two">
									<label for="two" id="lavel_two">Standard delivery<span>$1.99</span></label>
								</div>
								<div class="sc-item">
									<input type="radio" name="sc" id="three">
									<label for="three" id="lavel_three">Personal Pickup<span>Free</span></label>
								</div>
							</div>
							<h4>Cupon code</h4>
							<p>Enter your cupone code</p>
              <div class="col-md-12">

                  <div class="row form-group">
                    <div class="col-md-9">
                      <input type="text" id="user_inserted_coupon_name" class="form-control input-number" value="{{ $coupon_name }}">
                    </div>
                    <div class="col-md-3">
                      <button class="btn btn-primary" id="apply_coupon_btn">Apply Coupon</button>
                    </div>
                  </div>
              </div>
						</div>
					</div>
					<div class="offset-lg-4 col-lg-4">
						<div class="cart-total-details">
							<h4>Cart total</h4>
							<p>Final Info</p>
							<ul class="cart-total-card">
								<li>Subtotal<span>${{ $sub_total }}</span></li>
								<li>Shipping<span id="shipping_amount">Free</span></li>
                <li>Discount<span>{{ $coupon_discount_amount }}%</span></li>
								<li class="total">
                  Total
                  <span style="display:none" id="take_grand_total">{{ $sub_total-($sub_total*($coupon_discount_amount/100)) }}</span>
                  <span id="grand_total">{{ $sub_total-($sub_total*($coupon_discount_amount/100)) }}</span>
                  <span>$</span>
                </li>
							</ul>
              <form action="{{ url('chekout') }}" method="post">
                @csrf
              <input type="hidden" id="grand_total_input" name="grand_total" value="{{ $sub_total-($sub_total*($coupon_discount_amount/100)) }}">
              <button type="submit" class="btn btn-primary">Proceed to checkout</button>
              </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

{{-- cart apply end --}}

  	{{-- <div class="colorlib-shop">
  			<div class="container">
  				<div class="row">
  					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
  						<h2><span>Recommended Products</span></h2>
  						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-3 text-center">
  						<div class="product-entry">
  							<div class="product-img" style="background-image: url({{ url('frontend_assets') }}/images/item-5.jpg);">
  								<p class="tag"><span class="new">New</span></p>
  								<div class="cart">
  									<p>
  										<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
  										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
  										<span><a href="#"><i class="icon-heart3"></i></a></span>
  										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
  									</p>
  								</div>
  							</div>
  							<div class="desc">
  								<h3><a href="shop.html">Floral Dress</a></h3>
  								<p class="price"><span>$300.00</span></p>
  							</div>
  						</div>
  					</div>
  					<div class="col-md-3 text-center">
  						<div class="product-entry">
  							<div class="product-img" style="background-image: url({{ url('frontend_assets') }}/images/item-6.jpg);">
  								<p class="tag"><span class="new">New</span></p>
  								<div class="cart">
  									<p>
  										<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
  										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
  										<span><a href="#"><i class="icon-heart3"></i></a></span>
  										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
  									</p>
  								</div>
  							</div>
  							<div class="desc">
  								<h3><a href="shop.html">Floral Dress</a></h3>
  								<p class="price"><span>$300.00</span></p>
  							</div>
  						</div>
  					</div>
  					<div class="col-md-3 text-center">
  						<div class="product-entry">
  							<div class="product-img" style="background-image: url({{ url('frontend_assets') }}/images/item-7.jpg);">
  								<p class="tag"><span class="new">New</span></p>
  								<div class="cart">
  									<p>
  										<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
  										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
  										<span><a href="#"><i class="icon-heart3"></i></a></span>
  										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
  									</p>
  								</div>
  							</div>
  							<div class="desc">
  								<h3><a href="shop.html">Floral Dress</a></h3>
  								<p class="price"><span>$300.00</span></p>
  							</div>
  						</div>
  					</div>
  					<div class="col-md-3 text-center">
  						<div class="product-entry">
  							<div class="product-img" style="background-image: url({{ url('frontend_assets') }}/images/item-8.jpg);">
  								<p class="tag"><span class="new">New</span></p>
  								<div class="cart">
  									<p>
  										<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
  										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
  										<span><a href="#"><i class="icon-heart3"></i></a></span>
  										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
  									</p>
  								</div>
  							</div>
  							<div class="desc">
  								<h3><a href="shop.html">Floral Dress</a></h3>
  								<p class="price"><span>$300.00</span></p>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div> --}}


  @endsection

  @section('footer_scripts')
	<script>
		$(document).ready(function(){
			$('#apply_coupon_btn').click(function(){
				var coupon_name = $('#user_inserted_coupon_name').val();
				window.location.href = "{{ url('Shipping/Cart') }}"+"/"+coupon_name;
			});

			$('#lavel_one').click(function(){
				var lavel_one_value = parseFloat(4.99);
				$('#shipping_amount').html(lavel_one_value);
				var grand_total = parseFloat($('#take_grand_total').html());
				var final_grand_total = grand_total + lavel_one_value;
				$('#grand_total').html(parseFloat(final_grand_total).toFixed(2));
        $('#grand_total_input').val(parseFloat(final_grand_total).toFixed(2));
			});

			$('#lavel_two').click(function(){
				var lavel_two_value = parseFloat(1.99);
				$('#shipping_amount').html(lavel_two_value);
				var grand_total = parseFloat($('#take_grand_total').html());
				var final_grand_total = grand_total + lavel_two_value;
				$('#grand_total').html(parseFloat(final_grand_total).toFixed(2));
        $('#grand_total_input').val(parseFloat(final_grand_total).toFixed(2));
			});

			$('#lavel_three').click(function(){
				var lavel_three_value = parseFloat(0);
				$('#shipping_amount').html(lavel_three_value);
				var grand_total = parseFloat($('#take_grand_total').html());
				var final_grand_total = grand_total + lavel_three_value;
				$('#grand_total').html(parseFloat(final_grand_total).toFixed(2));
        $('#grand_total_input').val(parseFloat(final_grand_total).toFixed(2));
			});
	   });
	</script>
@endsection
