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

                <h2 class="text-white fw" style="text-align: center;">All Orders</h2>

                <div class="mb-3" style="text-align: center;">
                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input type="text" name="search" placeholder="Search For Something">
                        <input type="submit" class="btn btn-sm btn-outline-danger" value="Submit">
                    </form>
                </div>
                <div class="m-0">
                      
                   <div class="table-responsive">
                    <table class="table-bordered">
                
                        <tr class="">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Image</th>
                            <th>Delivered</th>
                            <th>Print PDF</th>
                            
                        </tr>
                        
                        @forelse($orders as $order)
                        <tr>
                            <td class="text-white">{{$order->name}}</td>
                            <td class="text-white">{{$order->email}}</td>
                            <td class="text-white">{{$order->address}}</td>
                            <td class="text-white">{{$order->phone}}</td>
                            <td class="text-white">{{$order->product_title}}</td>
                            <td class="text-white">{{$order->quantity}}</td>
                            <td class="text-white">{{$order->price}}</td>
                            <td class="text-white">{{$order->payment_status}}</td>
                            <td class="text-white">{{$order->delivery_status}}</td>
                            <td>
                                <img src="product/{{$order->image}}" alt="" style="width: 50px; height: 50px;">
                            </td>
                
                            <td>
                
                            @if($order->delivery_status == 'processing')
                            
                                <a href="{{url("/delivered/$order->id")}}" onclick="return confirm('Are you sure this product is delevered!!!')" class="btn btn-sm btn-warning">Delivered</a>
                            @else
                                <p class="text-success">Deliverd</p>
                            @endif
                
                            </td>
                
                            <td>
                                <a href="{{url("/print_pdf/$order->id")}}" class="btn btn-sm btn-danger">Print</a>
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