<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">free shipping on all u.s orders over $50</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- Currency / Language / My Account -->
								<li class="language">
									<a href="#">
										English
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="language_selection">
										<li><a href="#">French</a></li>
										<li><a href="#">Italian</a></li>
										<li><a href="#">German</a></li>
									</ul>
								</li>
								<li class="account">
									<a href="#">
										My Account
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
										<li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="{{url('/')}}">fashion<span>shop</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="{{url('/')}}">home</a></li>
								<li><a href="{{url('/allproducts')}}">shop</a></li>
								<li><a href="{{url('/allproducts')}}">product</a></li>
								<li><a href="{{'/contact'}}">contact</a></li>

							    <li><a href="{{url("/showorder")}}">
									order
								</a></li>					
							
							</ul>

							<ul class="navbar_user">
								
								@if(Route::has('login'))
							    
								    @auth
	    
								    	<li>
								    		@include('layouts.nav')
								    	</li>
	    
								    @else
								    	<li class="navbar_user" style="margin-right: -15px;">
								    		<a class="nav-link text-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
								    	</li>
								    	<li class="navbar_user">
								    		<a class="nav-link text-warning" href="{{ route('register') }}">{{ __('Register') }}</a>
								    	</li>
	    
								    @endauth
									
								@endif
							    
								<li class="checkout ml-4">
									<a href="{{url("/showcart")}}">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span id="checkout_items" class="checkout_items">{{$total_cart}}</span>
									</a>
								</li>
							</ul>

							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>

						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>
								