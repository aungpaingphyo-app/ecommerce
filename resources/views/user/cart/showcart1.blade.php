<!DOCTYPE html>
<html lang="en">
<head>
<title>Show Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('home/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('home/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('home/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/styles/categories_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/styles/categories_responsive.css')}}">
</head>

<body>

<div class="super_container">

	<!-- Header -->

	@include('user.products/producthead')

	<!-- Hamburger Menu -->
	<div class="container product_section_container">
		<div class="row">
				<!-- Breadcrumbs -->
			<div class="col">

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="/">Home</a></li>
						<li class="active"><a href="/showcart"><i class="fa fa-angle-right" aria-hidden="true"></i>Cart</a></li>
					</ul>
				</div>

			</div>
			
		</div>
	</div>


	<div class="container single_product_container" style="margin-top: -30px;">
		<div class="row">
			<div class="col">

                @if(session('message'))
                    <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session('message') }}
                    </div>
                @endif
                <div>
                    <h3 class="text-danger fw mb-2">All Carts</h3>
                    
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
                    
                                     <?php $totalprice = $totalprice + $cart->price ?>
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

	</div>

	<!-- Footer -->

	@include('user.products/productfooter')

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
