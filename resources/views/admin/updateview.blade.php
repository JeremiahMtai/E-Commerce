<!DOCTYPE html>
<html lang="en">
  <head>

  <base href="/public">
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
        <div  style="padding-bottom: 30px;" class="content-wrapper">
            <h1>Update</h1>

            <div class="content-wrapper">
            
                    <div class="container title align center">
                    <h1>Add Product</h1>
                    </div>

                    @if(session()->has('message'))

                    
                    <div class="alert alert-success">

                    {{session()->get('message')}}
                    
                    <button type="button" class="close" data-dismiss="alert">X</button>               
                    
                    </div>
                    @endif

                <form action="{{url('updateproduct',$data->id)}}" method="post" enctype="multipart/form-data"> 
                     @csrf

                    <div style="padding: 15px; border-radius: 30px;">
                    <label for="">Product Title</label>
                    <input style="color: black" type="text" name="title" value="{{$data->title}}" required>
                    </div>

                    <div style="padding: 15px; border-radius: 30px;" clas>
                    <label for="">Price</label>
                    <input style="color: black" type="number" name="price" value="{{$data->price}}" required>
                    </div>

                    <div style="padding: 15px; border-radius: 30px;">
                    <label for="">Description</label>
                    <input style="color: black" type="text" name="desc" value="{{$data->description}}" required>
                    </div>

                    <div style="padding: 15px; border-radius: 30px;">
                    <label for="">Quantity</label>
                    <input style="color: black" type="number" name="qty" value="{{$data->quantity}}" required>
                    </div>

                    <div style="padding: 15px; border-radius: 30px;">
                    <label for="">Old Image</label>

                        <img height="100" width="100" src="/productimage/{{$data->image}}">
                    
                    </div>

                    <div style="padding: 15px; border-radius: 30px;">
                    <label>Change the Image</label>
                    <input type="file" name="file">
                    </div>

                    <div style="padding: 15px; border-radius: 30px;">
                    <input class="btn btn-success" type="submit" name="Upload" id="">
                    </div>
                </form>
              
          </div>
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