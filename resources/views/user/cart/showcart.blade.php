<!DOCTYPE html>
<html lang="en">
<head>
<title>Single Product</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="/public">
<link rel="stylesheet" type="text/css" href="home/styles/bootstrap4/bootstrap.min.css">
<link href="home/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="home/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="home/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="home/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="home/plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="home/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="home/styles/single_styles.css">
<link rel="stylesheet" type="text/css" href="home/styles/single_responsive.css">
</head>

<body>

<div class="super_container">

	<!-- Header -->

	@include('user.section/header')

	<div class="fs_menu_overlay"></div>

	<!-- Hamburger Menu -->

	<div class="container single_product_container">
		<div class="row">
			<div class="col">

			    @if(session('message'))
                    <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session('message') }}
                    </div>
                @endif
                <div>
                    <h2 class="text-danger fw">All Carts</h2>
                    
                    <div style="text-align: center;">
                            <table class="table table-bordered">
                        
                                <tr class="bg-info">
                                    <th class="p-3">Product title</th>
                                    <th class="p-3">Quantity</th>
                                    <th class="p-3">Price</th>
                                    <th class="p-3">Image</th>
                                    <th class="p-3">Action</th>
                                    
                                </tr>
            
                                <?php $totalprice = 0; ?>
                        
                                @foreach($carts as $cart)
                                    <tr>
                                        <td>{{$cart->product_name}}</td>
                                        <td>{{$cart->quantity}}</td>
                                        <td> $ {{$cart->price}}</td>
                                        <td>
                                            <img src="/product/{{$cart->image}}" alt="" style="width: 100px;">
                                        </td>
                                        <td>
                                            <a href="{{url("/removecart/$cart->id")}}" onclick="return confirm('Are you sure!')" class="btn btn-sm btn-danger">Remove</a>
                                        </td>               
                                     </tr>
                    
                                     <?php $totalprice = $totalprice + intval($cart->price) ?>
                                @endforeach
                            </table>

						<div class="mb-4">
                           <h3>Total Price = <span class="text-warning"> $ {{$totalprice}}</span></h3>
            
                        </div>
    
                        <div>
                            <h3>Proceed To Order</h3>
                            <a href="{{url('cartorder')}}" class="btn btn-md btn-danger mr-3">Cash On Delivery</a>
                            <a href="{{url("/stripe/$totalprice")}}" class="btn btn-md btn-danger">Pay Using Card</a>
    
                        </div>                   
        
                    </div>
            
        
                </div>
        
		        		
			</div>
		</div>


	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
						<h4>Newsletter</h4>
						<p>Subscribe to our newsletter and get 20% off your first purchase</p>
					</div>
				</div>
				<div class="col-lg-6">
					<form action="post">
						<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
							<input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
							<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							<li><a href="#">Blog</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="contact.html">Contact us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="footer_nav_container">
						<div class="cr">©2018 All Rights Reserverd. This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp; distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>
</div>

<script src="home/js/jquery-3.2.1.min.js"></script>
<script src="home/styles/bootstrap4/popper.js"></script>
<script src="home/styles/bootstrap4/bootstrap.min.js"></script>
<script src="home/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="home/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="home/plugins/easing/easing.js"></script>
<script src="home/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="home/js/single_custom.js"></script>
</body>

</html>
