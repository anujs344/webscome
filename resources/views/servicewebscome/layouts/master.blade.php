<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <!-- Favicons -->
    <link href="<?php echo asset(''); ?>webscome_service_assets/images/favicon.png" rel="icon">
    <link href="<?php echo asset(''); ?>webscome_service_assets/images/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset(''); ?>webscome_service_assets/css/main.css">
    <script src="https://kit.fontawesome.com/d177a7678c.js" crossorigin="anonymous"></script>
      <style>
          .badge {
              padding-left: 9px;
              padding-right: 9px;
              -webkit-border-radius: 9px;
              -moz-border-radius: 9px;
              border-radius: 9px;
          }

          .label-warning[href],
          .badge-warning[href] {
              background-color: #c67605;
          }
          #lblCartCount {
              font-size: 12px;
              background: #ff0000;
              color: #fff;
              padding: 0 5px;
              vertical-align: top;
              margin-left: -10px;
          }

      </style>
    <title>Webscome</title>

  </head>

  <body>
    <?php
    $services=App\Models\Category::all();
    ?>
    <!--- Menu   --->
    <section class="nav-color">
      <nav class="navbar navbar-expand-lg container ">
        <a class="navbar-brand" href="index.html"><img src="{{asset('webscome_service_assets/images/logo.png')}}" class="menu-logo"></a>
        <button class="navbar-toggler btn btn-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars "></i>
        </button>


        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item menu-item active">
              <a class="nav-link" href="{{ route('webscome') }}"> Home </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Services
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($services as $service)
                <a class="dropdown-item" href="{{ route('single_service',[$service->id]) }}">{{ $service->title }}</a>

                @endforeach

              </div>
            </li>
            @if (Route::has('login'))
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                <a href="{{ url('/redirects') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a><br>
                <a href="{{ route('carts.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">My Cart
{{--                    <i class="fa" style="font-size:24px">&#xf07a;</i>--}}
{{--                    <span class='badge badge-warning' id='lblCartCount'> {{ auth()->user() ? $cart_contents->count() : '' }} </span>--}}
                </a><br>
                <a href="{{ route('carts.orderdetails') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">My Orders</a>

                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class='text-sm text-gray-700 dark:text-gray-500 underline'></i><span>Logout</span></button>
                  </form>

              </div>
            </li>
            @else
                <li class="nav-item menu-item">
                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user-lock"></i> Login/ <i class="fa fa-sign-in-alt"></i> SignUp </a>
                </li>
            @endauth
            @endif

          </ul>

        </div>
      </nav>

    </section>

    @include('layouts.messages')
  @yield('content')
    <!--- footer   --->
    <section class="footer-box pb-3 mt-3">
      <div class="container">

        <div class="row">
          <div class="col-md-8 p-2">
{{--            <form>--}}
{{--              <div class="form-row align-items-center">--}}
{{--                <div class="col-auto my-1">--}}
{{--                  <div class="input-group">--}}
{{--                    <div class="input-group-prepend">--}}
{{--                      <div class="input-group-text">Select Your City</div>--}}
{{--                    </div>--}}
{{--                    <select class="form-control font-weight-bold" id="CitySelect" placeholder="Select City">--}}
{{--                      <option selected><strong>Select Your City </strong></option>--}}
{{--                      <option disabled><strong>India </strong></option>--}}
{{--                      <option>Patna </option>--}}
{{--                      <option>Delhi </option>--}}
{{--                      <option><strong>Muzaffarpur </strong></option>--}}

{{--                    </select>--}}

{{--                  </div>--}}
{{--                </div>--}}

{{--                <div class="col-auto my-1">--}}
{{--                  <button type="submit" class="btn btn-primary">Search</button>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </form>--}}
          </div>
          <div class="col-md-4 p-2">
            <a class="btn float-right btn-warning text-dark font-weight-bold" href="{{ route('proWebscome') }}"><u> Register As a Professionals </u></a>
          </div>
        </div>
        <div class="row border-top p-2 ">
          <div class="col-4 col-md-2">
            <a href="index.html"><img src="<?php echo asset(''); ?>webscome_service_assets/images/logo.png" class="footer-logo"></a>
          </div>
          <div class="col-8 col-md-3  pt-3">
            <p class=""> &copy; 2021-22 Webscome company</p>
          </div>
          <div class="col-12 col-md-3 pt-3">
            <p class="">
              <a href="#"><i class="fa fa-twitter"></i></a> &nbsp;
              <a href="#"><i class="fa fa-facebook-square"></i></a> &nbsp;
              <a href="#"><i class="fa fa-instagram"></i></a> &nbsp;
              <a href="#"><i class="fa fa-youtube"></i></a> &nbsp;
              <a href="#"><i class="fa fa-linkedin"></i></a> &nbsp;
              <a href="#"><i class="fa fa-pinterest-p"></i></a>
            </p>

          </div>
          <div class="col-6 col-md-2">
            <a href="#"><img src="<?php echo asset(''); ?>webscome_service_assets/images/google-playstore.png" class="footer-store"></a>
          </div>
          <div class="col-6 col-md-2">
            <a href="#"><img src="<?php echo asset(''); ?>webscome_service_assets/images/apple-store.png" class="footer-store"></a>
          </div>



        </div>

      </div>
    </section>

    @yield('scripts')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
