<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.separate/css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.separate/sider')
      <!-- partial -->
      @include('admin.separate/header')
        <!-- partial -->
        <div class="main-panel">

         <div class="content-wrapper">  

                <h1 class="text-center mb-4">All Products List</h1> 

                <div class="m-auto">
                <div class="table-responsive">
                <table class="table-bordered">
                    <tr>
                        <th class="p-2">Image</th>
                        <th class="p-2">Name</th>
                        <th class="p-2">Description</th>
                        <th class="p-2">Price</th>
                        <th class="p-2">Discount Price</th>
                        <th class="p-2">Quantity</th>
                        <th class="p-2">Category</th>
                        <th class="p-2">Action</th>
                    </tr>

                    @forelse($products as $product)

                    <tr>
                        <td>
                          <img src="/product/{{$product->image}}" alt="Product Image" style="width: 100px;" >
                          
                        </td>
                        <td class="p-2">{{$product->name}}</td>
                        <td class="p-2">{{$product->description}}</td>
                        <td class="p-2">$ {{$product->price}}</td>
                        <td class="p-2">$ {{$product->discount_price}}</td>
                        <td class="p-2">{{$product->quantity}}</td>
                        <td class="p-2">{{$product->category}}</td>

                        <td class="p-2">
                          <a href="{{url("/edit_products/$product->id")}}" class="btn btn-sm btn-primary">Edit</a>
                          <a href="{{url("/delete_products/$product->id")}}" onclick="return confirm('Are you delete')" class="btn btn-sm btn-danger">Delelte</a>
                        </td>
                    </tr>

                      @empty
                         
                        <tr>
                            <td colspan="16" class="p-2 text-danger">
                                No Data Found !!
                            </td>
                        </tr>

                    @endforelse

                </table>

                </div>

                </div>

            </div>
          </div>
    </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
    <!-- plugins:js -->
    <script src="{{asset('admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/assets/js/misc.js')}}"></script>
    <script src="{{asset('admin/assets/js/settings.js')}}"></script>
    <script src="{{asset('admin/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
  </body>
</html>