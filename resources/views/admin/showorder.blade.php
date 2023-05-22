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
            

            <div class="container" align="center">
            <!-- <h1 style="text-transform: uppercase; font-weight: bold; background-color: gray; width: 100px;">Customer Order</h1> -->
            <br>

            <table>
                <tr style="background-color: gray;">
                    <td style="padding: 20px;">Customer Name</td>
                    <td style="padding: 20px;">Phone</td>
                    <td style="padding: 20px;">Address</td>
                    <td style="padding: 20px;">Price</td>
                    <td style="padding: 20px;">Quantity</td>
                    <td style="padding: 20px;">Status</td>
                    <td style="padding: 20px;">Action</td>
                </tr>

                @foreach($order as $orders)
                <tr align="center" style="background-color: antiquewhite; color: black;">
                    <td style="padding: 20px;">{{$orders->name}}</td>
                    <td style="padding: 20px;">{{$orders->phone}}</td>
                    <td style="padding: 20px;">{{$orders->address}}</td>
                    <td style="padding: 20px;">{{$orders->price}}</td>
                    <td style="padding: 20px;">{{$orders->quantity}}</td>
                    <td style="padding: 20px;">{{$orders->status}}</td>
                    <td style="padding: 20px;">
                        <a class="btn btn-success" href="{{url('updatestatus',$orders->id)}}">Delivered</a>
                    </td>
                </tr>
                @endforeach
            </table>

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