<!DOCTYPE html>
<html lang="en">
  <head>
   <!-- style -->
   @include('admin.css')

   <style>
   .title{
      color: white;
      padding-top: 25px;
      font-size: 25px;
    }
    label{
      display: inline-block;
      width: 200px;
    }

    input{
      color: black;
    }

  </style>
   <!-- style -->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        
        <div class="main-panel">
          <div class="content-wrapper">

              @if(session()->has('message'))

              
              <div class="alert alert-success">

              {{session()->get('message')}}
              
                <button type="button" class="close" data-dismiss="alert">X</button>               
                
              </div>
              @endif


              <div class="container" align="center">
            <!-- <h1 style="text-transform: uppercase; font-weight: bold; background-color: gray; width: 100px;">Customer Order</h1> -->
            <br>
              <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data"> 
              @csrf

                <div style="padding: 15px; border-radius: 30px;">
                  <label for="">Product Title</label>
                  <input style="color: black" type="text" name="title" placeholder="Give a product title" required>
                </div>

                <div style="padding: 15px; border-radius: 30px;" clas>
                  <label for="">Price</label>
                  <input style="color: black" type="number" name="price" placeholder="Give a price" required>
                </div>

                <div style="padding: 15px; border-radius: 30px;">
                  <label for="">Description</label>
                  <input style="color: black" type="text" name="desc" placeholder="Give a a description" required>
                </div>

                <div style="padding: 15px; border-radius: 30px;">
                  <label for="">Quantity</label>
                  <input style="color: black" type="number" name="qty" placeholder="Give the quantity" required>
                </div>

                <div style="padding: 15px; border-radius: 30px;">
                  <input type="file" name="file">
                </div>

                <div style="padding: 15px; border-radius: 30px;">
                  <input class="btn btn-success" type="submit" name="Upload" id="">
                </div>
              </form>
              </div>
            </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.footer')
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>