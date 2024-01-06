<!DOCTYPE html>
<html lang="en">
@include('user.section/head')
<body>

<div class="super_container">

	<!-- Header -->

	@include('user.section/header')

	@include('user.section/bander')
	<!-- New Arrivals -->
     @include('user.section/products')

     @include('user.section/newarrival')

     @include('user.section/dealoftheweek')

	<!-- Best Sellers -->

	@include('user.section/bestseller')


	<!-- Blogs -->
	@include('user.section/footer')

</div>

<script>
  document.addEventListener("DOMContentLoaded", function(event) { 
      var scrollpos = localStorage.getItem('scrollpos');
      if (scrollpos) window.scrollTo(0, scrollpos);
  })
  window.onbeforeunload = function(e) {
      localStorage.setItem('scrollpos', window.scrollY);
  };
</script>


<script src="{{asset('home/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('home/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('home/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('home/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('home/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('home/plugins/easing/easing.js')}}"></script>
<script src="{{asset('home/js/custom.js')}}"></script>
</body>

</html>
