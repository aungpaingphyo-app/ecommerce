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

                <h1 class="text-center mb-4">Add Category</h1> 

                @if(session('message'))
                   <div class="alert alert-primary">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session('message')}}
                   </div>
                @endif

                <form action="{{url('/categories')}}" method="post">
                    @csrf
                        <div class="container" style="max-width: 600px">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="category" placeholder="Enter New Category">
                                <input type="submit" class="btn btn-sm btn-primary" name="submit" value="Add Category">
                            </div>                            
                        </div>
                </form>

                <div class="m-auto mt-4" style="max-width: 600px">
                    <table class="table table-bordered">
                        <tr>
                            <th>Categor Name</th>
                            <th>Action</th>
                        </tr>
    
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>
                                <a onclick="return confirm('Are You Sure!')" href="{{url("/delete_categories/$category->id")}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
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