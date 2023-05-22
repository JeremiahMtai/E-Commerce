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
        <div  style="padding-bottom: 30px;" class="content-wrapper">
            
            
            @if(session()->has('message'))

            <div class="alert alert-success">

            {{session()->get('message')}}

            <button type="button" class="close" data-dismiss="alert">X</button>               
            
            </div>
            @endif

            <div class="container" align="center">
            <!-- <h1 style="text-transform: uppercase; font-weight: bold; background-color: gray; width: 100px;">Customer Order</h1> -->
            <br>
              <table>
                  <tr style="background-color: gray">
                      <td style="padding: 20px">Titlle</td>
                      <td style="padding: 20px">Description</td>
                      <td style="padding: 20px">Quantity</td>
                      <td style="padding: 20px">Price</td>
                      <td style="padding: 20px">Image</td>
                      <td style="padding: 20px">Update</td>
                      <td style="padding: 20px">Delete</td>
                  </tr>

                  @foreach($data as $product)

                  <tr style="background-color:darkgrey; align-items:center;">
                      <td>{{$product->title}}</td>
                      <td>{{$product->description}}</td>
                      <td>{{$product->quantity}}</td>
                      <td>{{$product->price}}</td>
                      <td>
                          <img height="100px" width="100px" src="/productimage/{{$product->image}}">
                      </td>
                      <td>
                          <a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Update</a>
                      </td>
                      <td>
                          <a class="btn btn-danger" onclick="return confirm('Are you sure !!')" href="{{url('deleteproduct',$product->id)}}">Delete</a>
                      </td>
                  </tr>

                  @endforeach
              </table>
            </div>

            <!-- footer -->
            @include('admin.footer')
            <!-- footer -->
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