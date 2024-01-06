<!DOCTYPE html>
<html lang="en">
<head>
<title>Single Product</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="{{asset('home/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('home/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('home/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" href="{{asset('home/plugins/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/styles/single_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/styles/single_responsive.css')}}">

</head>

<body>

<div class="super_container">

	<!-- Header -->

	@include('user.products/producthead')

	<div class="fs_menu_overlay"></div>

	<!-- Hamburger Menu -->

	<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="/homes">Home</a></li>
						<li><a href="/allproducts"><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $product->category }}</a></li>
						<li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $product->name }}</li>
					</ul>
				</div>

			</div>
		</div>

		@if(session('message')) 
		   <div class="alert alert-success">
			  {{session('message')}}
		   </div>
		@endif

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>
									
									<li><img src="/product/{{$product->image}}" alt="" data-image="images/single_1.jpg"></li>
									<li class="active"><img src="/product/{{$product->image}}" alt="" data-image="images/single_2.jpg"></li>
									<li><img src="/product/{{$product->image}}" alt="" data-image="images/single_3.jpg"></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url(/product/{{$product->image}})"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2>{{$product->name}}</h2>
						<p>{{$product->description}}</p>
					</div>
					<div class="free_delivery d-flex flex-row align-items-center justify-content-center mb-4">
						<span class="ti-truck"></span><span>free delivery</span>
					</div>

					<div>
						@if($product->discount_price != null)

                        <h5 class="text-primary mb-2" style="text-decoration: line-through;"> 
						   Or- {{$product->price}}          
						</h5>
						<h4 class="text-danger">                          
                           Ds- {{$product->discount_price}}
                        </h4>

                        @else
                        <h6 class="text-blue">
                           {{$product->price}}
                        </h6>
                       @endif
			
					</div>

					<form action="{{url("/addcart/$product->id")}}" method="post">
                      @csrf
					    <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
							<div>
							    <span><b>Quantity:</b></span>
					    	    <input type="number" style="width: 70px; height: 34px;" name="quantity" value="1" min="1">
							</div>
					    	   
					    	<button class="btn btn-md btn-danger ml-2">
								Add to cart
							</button>
					    	<div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
					    </div>
					</form>
				</div>
			</div>
		</div>

	</div>

	<!-- Tabs -->

	<div class="tabs_section_container">

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabs_container">
						<ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
							<li class="tab active" data-active-tab="tab_1"><span>Description</span></li>
							<li class="tab" data-active-tab="tab_2"><span>Additional Information</span></li>
							<li class="tab" data-active-tab="tab_3"><span>Comments (2)</span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">

					<!-- Tab Description -->

					<div id="tab_1" class="tab_container active">
						<div class="row">
							<div class="col-lg-5 desc_col">
								<div class="tab_title">
									<h4>Description</h4>
								</div>
								<div class="tab_text_block" style="margin-bottom: -8px;">
									<h2>{{$product->name}}</h2>
									<p>{{$product->description}}</p>
								</div>
								<div class="tab_image" style="width: 200px; height: 200px;">
									<img src="/product/{{$product->image}}" alt="">
								</div>
								
							</div>
						</div>
					</div>

					<!-- Tab Additional Info -->

					<div id="tab_2" class="tab_container">
						<div class="row">
							<div class="col additional_info_col">
								<div class="tab_title additional_info_title">
									<h4>Additional Information</h4>
								</div>
								<p>{{$product->description}}</p>
								
							</div>
						</div>
					</div>

					<!-- Tab Reviews -->

					<div id="tab_3" class="tab_container">
						<div class="row">

							<div class="col-lg-6 reviews_col">
								<div class="tab_title reviews_title">
									<h4>Comments(2)</h4>
								</div>

								<!-- User Review -->
								@foreach($comment as $comment)

								<div class="user_review_container d-flex flex-column flex-sm-row">
									<div class="user">
										<div class="user_pic"></div>
										
									</div>
									<div class="review">
										<div class="review_date">
											{{$comment->created_at->diffForHumans()}}
										</div>
										<div class="user_name">{{$comment->name}}</div>
										<p>{{$comment->comment}}</p>

									</div>
																		
								</div>
								@endforeach
								
							</div>

							<!-- Add Review -->

							<div class="col-lg-6 add_review_col">

								<div class="add_review">
									<form id="review_form" action="{{url('/add_comment')}}" method="post">
										@csrf
										<div>
											<h1>Add Comment</h1>
								
											<textarea id="review_message" class="input_review" name="comment"  placeholder="Your Comment" rows="4" required></textarea>
										</div>
										<div class="text-left text-sm-right">
											<button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">Comment</button>
										</div>
									</form>
								</div>

							</div>


						</div>
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
