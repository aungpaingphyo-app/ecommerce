<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
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

              <h1 class="text-center mb-4">Add Products List</h1> 

              @if(session('message'))
                 <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                     {{session('message')}}
                 </div>
              @endif

              <div class="m-auto" style="max-width: 700px;">
             
                <form action="{{url("/update_products/$product->id")}}" method="post" enctype="multipart/form-data">

                  @csrf
                  <div class="mb-3">
                    <label class="text-white" for="">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="text-white" for="">Description:</label>
                    <input type="text" class="form-control" name="description" value="{{$product->description}}" required>
                  </div>
                  <div class="mb-3">
                    <label class="text-white" for="">Price:</label>
                    <input type="number" class="form-control" name="price" value="{{$product->price}}" required>
                  </div>
                  <div class="mb-3">
                    <label class="text-white" for="">Discount Price:</label>
                    <input type="text" class="form-control" name="ds_price" value="{{ $product->discount_price }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="text-white" for="">Quantity:</label>
                    <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}" required>
                  </div>
                  <div class="mb-3">
                    <label class="text-white" for="">Category:</label>
                    <input type="text" class="form-control" name="category" value="{{$product->category}}" required>
                  </div>

                  <div class="mb-3">
                    
                    <label class="text-white">Product Category:</label>
                       <select name="category_id" class="form-select mb-3 w-80px" required>
                            
                          <option value="{{$product->category_id}}" selected>{{$product->category}}</option>
                            
                            @foreach($category as $category)
                              <option value="{{$category->category_name}}">
                                {{$category->name}}
                              </option>
                            @endforeach
                            
                       </select>
                  </div>

                  <div class="mb-3">
                     <label class="text-white" for="">Current Image:</label>
                     <img src="/product/{{$product->image}}" class="m-auto"  width="100" alt="">
                  </div>

                  <div class="mb-3">
                    <label class="text-white" for="">Change Image:</label>
                    <input type="file" class="form-control" name="image" placeholder="Add image">
                  </div>
                  
                  <input type="submit" class="btn btn-warning" value="Update Product">
                </form>

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