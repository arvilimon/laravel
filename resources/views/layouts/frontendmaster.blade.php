<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Store Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap.css') }}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/magnific-popup.css') }}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/flexslider.css') }}">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/owl.theme.default.min.css') }}">

	<!-- Date Picker -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap-datepicker.css') }}">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/fonts/flaticon/font/flaticon.css') }}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}">

	<!-- Modernizr JS -->
	<script src="{{ asset('frontend_assets/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="{{ url('/') }}"></a></div>
							<img src="{{ asset('frontend_assets/images/logo.png') }}" alt="">
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="active"><a href="{{ url('/') }}">Home</a></li>
								<li class="has-dropdown">
									<a href="{{ url('shop')}}">Shop</a>
								</li>
								<li><a href="{{ url('blog')}}">Blog</a></li>
								<li><a href="{{ url('about')}}">About</a></li>
								<li><a href="{{ url('contact')}}">Contact</a></li>
								<li><a href="{{ route('login') }}">Login</a></li>
								<li><a href="{{ url('customar/register') }}">Register</a></li>
								<li><a href="{{ url('Shipping/Cart') }}"><i class="icon-shopping-cart"></i> Cart [
									{{ App\Cart::where('customar_ip', $_SERVER['REMOTE_ADDR'])->count() }}
									]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	<!-- Header section end -->
   @yield('frontend_main')
	<!-- Footer top section -->
	{{-- subscribe part --}}
	<div id="colorlib-subscribe">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="col-md-6 text-center">
						<h2><i class="icon-paperplane"></i>Sign Up for a Newsletter</h2>
					</div>
					<div class="col-md-6">
						<form class="form-inline qbstp-header-subscribe">
							<div class="row">
								<div class="col-md-12 col-md-offset-0">
									<div class="form-group">
										<input type="text" class="form-control" id="email" placeholder="Enter your email">
										<button type="submit" class="btn btn-primary">Subscribe</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer id="colorlib-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 colorlib-widget">
					<h4>About Store</h4>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
					<p>
						<ul class="colorlib-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
				<div class="col-md-2 colorlib-widget">
					<h4>Customer Care</h4>
					<p>
						<ul class="colorlib-footer-links">
							<li><a href="#">Contact</a></li>
							<li><a href="#">Returns/Exchange</a></li>
							<li><a href="#">Gift Voucher</a></li>
							<li><a href="#">Wishlist</a></li>
							<li><a href="#">Special</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Site maps</a></li>
						</ul>
					</p>
				</div>
				<div class="col-md-2 colorlib-widget">
					<h4>Information</h4>
					<p>
						<ul class="colorlib-footer-links">
							<li><a href="#">About us</a></li>
							<li><a href="#">Delivery Information</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Order Tracking</a></li>
						</ul>
					</p>
				</div>

				<div class="col-md-2">
					<h4>News</h4>
					<ul class="colorlib-footer-links">
						<li><a href="blog.html">Blog</a></li>
						<li><a href="#">Press</a></li>
						<li><a href="#">Exhibitions</a></li>
					</ul>
				</div>

				<div class="col-md-3">
					<h4>Contact Information</h4>
					<ul class="colorlib-footer-links">
						<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
						<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
						<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
						<li><a href="#">yoursite.com</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="copy">
			<div class="row">
				<div class="col-md-12 text-center">
					<p>

						<span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart2" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
						<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
					</p>
				</div>
			</div>
		</div>
	</footer>
</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>

<!-- jQuery -->
<script src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>
<!-- jQuery Easing -->
<script src="{{ asset('frontend_assets/js/jquery.easing.1.3.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
<!-- Waypoints -->
<script src="{{ asset('frontend_assets/js/jquery.waypoints.min.js') }}"></script>
<!-- Flexslider -->
<script src="{{ asset('frontend_assets/js/jquery.flexslider-min.js') }}"></script>
<!-- Owl carousel -->
<script src="{{ asset('frontend_assets/js/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('frontend_assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/magnific-popup-options.js') }}"></script>
<!-- Date Picker -->
<script src="{{ asset('frontend_assets/js/bootstrap-datepicker.js') }}"></script>
<!-- Stellar Parallax -->
<script src="{{ asset('frontend_assets/js/jquery.stellar.min.js') }}"></script>
<!-- Main -->
<script src="{{ asset('frontend_assets/js/main.js') }}"></script>
@yield('footer_scripts')
</body>
</html>
