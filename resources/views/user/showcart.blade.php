<!DOCTYPE html>
<html lang="en">

  <head>

  <!-- Cart CDN -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Simple E-Commerce</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> 
    

    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <!-- <a class="navbar-brand mt-fixed" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="#">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>

              <li>
                @if (Route::has('login'))
                      @auth

                      <!-- cart -->
                      <li class="nav-item">
                        <a class="nav-link" href="{{url('showcart')}}"> <i class="fa fa-shopping-cart"></i> Cart &nbsp;[{{$count}}]</a>
                      </li>

                     <!-- end of cart -->
                      <x-app-layout>
                      </x-app-layout>
                      @else
                          <li>
                            <a class="nav-link" href="{{route('login')}}">Log in</a>
                          </li>
                            
                           
                          @if (Route::has('register'))
                          
                          <li>
                            <a class="nav-link" href="{{route('register')}}">Register</a>
                          </li>
                            
                          
                          @endif
                      @endauth
                  </div>
                @endif
              </li>

              <!-- message that the product is removed from cart -->
              @if(session()->has('message'))

              
              <div class="alert alert-success">

              {{session()->get('message')}}
              
                <button type="button" class="close" data-dismiss="alert">X</button>               
                
              </div>
              @endif
              <!-- end of message -->


            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- table -->
    <div style="padding: 100px;" align="center">

    <form action="{{url('order')}}" method="POST">
        @csrf
        <table>
            <tr style="background-color: gray;">
                <td style="padding: 10px; font-size: 20px; color: white">Product Name</td>
                <td style="padding: 10px; font-size: 20px; color: white">Quantity</td>
                <td style="padding: 10px; font-size: 20px; color: white">Price</td>
                <td style="padding: 10px; font-size: 20px; color: white">Action</td>
            </tr>

            @foreach($cart as $carts)
            <tr>
                <td style="background-color: dark-gray; color: black">

                <input type="text" name="product_name[]" value="{{$carts->product_title}}" hidden>{{$carts->product_title}}</td>

                <td style="background-color: dark-gray; color: black">

                <input type="text" name="quantity[]" value="{{$carts->quantity}}" hidden>{{$carts->quantity}}</td>

                <td style="background-color: dark-gray; color: black">

                <input type="text" name="price[]" value="{{$carts->price}}" hidden>{{$carts->price}}</td>

                <td style="background-color: dark-gray; color: black"><a class="btn btn-danger" href="{{url('deletecart',$carts->id)}}">Delete</a></td>
                
            </tr>
            @endforeach

        </table>

        <button class="btn btn-success">Confirm Order</button>
    </form>
    </div>

    

    
    


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
