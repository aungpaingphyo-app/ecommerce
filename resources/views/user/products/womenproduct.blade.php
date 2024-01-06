<!DOCTYPE html>
<html lang="en">
<head>
<title>Fashion Shop womenproduct</title>
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
			<div class="col product_section clearfix">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="{{url('/')}}">Home</a></li>
						<li class="active"><a href="/allproducts"><i class="fa fa-angle-right" aria-hidden="true"></i>All</a></li>
						<li><a href="/womenpages"><i class="fa fa-angle-right" aria-hidden="true"></i>Women's</a></li>
						<li class="active"><a href="/accessorypages"><i class="fa fa-angle-right" aria-hidden="true"></i>Accessories's</a></li>
						<li class="active"><a href="/menpages"><i class="fa fa-angle-right" aria-hidden="true"></i>Men's</a></li>
						
					</ul>
				</div>

				<!-- Sidebar -->

				<div class="sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Product Category</h5>
						</div>
						@foreach($categories as $category)
						<ul class="sidebar_categories">
							<li><a href="#">{{$category->name}}</a></li>
							
						</ul>
						@endforeach
					</div>
					
				</div>

				<!-- Main Content -->

				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_top">
									<ul class="product_sorting">
										<li>
											<span class="type_sorting_text">Default Sorting</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_type">
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
											</ul>
										</li>
										<li>
											<span>Show</span>
											<span class="num_sorting_text">6</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_num">
												<li class="num_sorting_btn"><span>6</span></li>
												<li class="num_sorting_btn"><span>12</span></li>
												<li class="num_sorting_btn"><span>24</span></li>
											</ul>
										</li>
									</ul>
									

								</div>

								<!-- Product Grid -->

								<div class="product-grid">

									<!-- Product 1 -->
                                    
									@foreach($products as $product)
									<div class="product-item men">
										<div class="product discount product_filter">
											<div class="product_image">
												<a href="{{url("/detail_products/$product->id")}}">
												<img src="product/{{$product->image}}" alt="">
											    </a>
											</div>
											<div class="favorite favorite_left"></div>
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.html">{{$product->name}}</a></h6>
												<div class="product_price">${{$product->price}}<span>${{$product->discount_price}}</span></div>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="{{url("/detail_products/$product->id")}}">Select Option</a></div>
									</div>

									@endforeach

								</div>

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_bottom clearfix">
									
									<div class="pages d-flex flex-row align-items-center">
									{{ $products->links() }}
									</div>

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

<script src="home/js/jquery-3.2.1.min.js"></script>
<script src="home/styles/bootstrap4/popper.js"></script>
<script src="home/styles/bootstrap4/bootstrap.min.js"></script>
<script src="home/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="home/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="home/plugins/easing/easing.js"></script>
<script src="home/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="home/js/categories_custom.js"></script>
</body>

</html>
