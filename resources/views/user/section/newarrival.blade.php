<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>New Arrivals</h2>
					</div>
				</div>
			</div>

			<!--
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
						    <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">women's</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessory">accessories</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".">men's</li>
						</ul>
					</div>
				</div>
			</div> -->
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<!-- Product 1 -->
                            @foreach($products as $product)
						    <div class="product-item men">
						    	<div class="product discount product_filter">
						    		
						    		<div class="product_image m-auto" style="width: 200px;">
						    		    <a href="{{url("/detail_products/$product->id")}}"><img src="product/{{$product->image}}" alt=""></a>
						    		</div>
						    		<div class="favorite favorite_left">ddd</div>
						    		<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>new</span></div>
						    		<div class="product_info">
						    			<h6 class="product_name"><a href="single.html">{{$product->name}}</a></h6>
						    			<div class="product_price">${{$product->price}}<span>${{$product->discount_price}}</span></div>
						    		</div>
						    		
						    	</div>

						    	<div class="red_button add_to_cart_button"><a href="{{url("/detail_products/$product->id")}}">Select Option</a></div>
								
						    </div>
						    @endforeach
												
					</div>
				</div>
			</div>

			<div class="mt-4">
	           {{ $products->links() }}
	        </div>

		</div>
	</div>