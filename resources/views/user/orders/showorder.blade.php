<!DOCTYPE html>
<html lang="en">
<head>
<title>Show Order</title>
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
						<li class="active"><a href="/showorder"><i class="fa fa-angle-right" aria-hidden="true"></i>Order</a></li>
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
				<h2 class="text-danger fw">All Orders</h2>

                <div style="text-align: center;" class="mb-5">
                    <table class="table table-bordered m-auto">
                
                        <tr class="bg-info">
                            
                            <th class="p-3">Product title</th>
                            <th class="p-3">Quantity</th>
                            <th class="p-3">Price</th>
                            <th class="p-3">Payment Status</th>
                            <th class="p-3">Delivery Status</th>
                            <th class="p-3">Image</th>
                            <th class="p-3">Cancel Order</th>
                            
                            
                        </tr>

                        <?php $totalprice=0 ?>

                        @foreach($orders as $order)
                        <tr>
                            <td class="p-1">{{ $order->product_title }}</td>
                            <td class="p-1">{{$order->quantity}}</td>
                            <td class="p-1">{{$order->price}}</td>
                            <td class="p-1">{{$order->payment_status}}</td>
                            <td class="p-1">{{$order->delivery_status}}</td>
                            <td class="p-1">
                                <img src="product/{{$order->image}}" alt="" style="width: 100px;">
                            </td>
                            <td>
                                @if($order->delivery_status == 'processing')
                                <a href="{{"/cancel_order/$order->id"}}" onclick="return confirm('Are you sure cancel')" class="btn btn-sm btn-danger">Cancel</a>

                                @else
                                <p class="text-primary">Not Allowed</p>
                                @endif

                            </td>
                        </tr>

						<?php $totalprice = $totalprice + $order->price ?>  

                        @endforeach 						  
                         
                    </table>

					<div class="mt-5">

						<h3>Total Order = <span class="text-danger"> {{$total_order}}</span></h3>
                        <h3>Total Price = <span class="text-danger"> $ {{$totalprice}}</span></h3>

                    </div>

                </div>
				
			</div>
		</div>

	</div>

	<!-- Footer -->

	@include('user.products/productfooter')

</div>

<script src="{{asset('home/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('home/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('home/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('home/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('home/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('home/plugins/easing/easing.js')}}"></script>
<script src="{{asset('home/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{asset('home/js/single_custom.js')}}"></script>
</body>

</html>
