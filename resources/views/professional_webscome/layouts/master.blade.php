<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <!-- Favicons -->
    <link href="<?php echo asset(''); ?>webscome_professional_assets/images/favicon.png" rel="icon">
    <link href="<?php echo asset(''); ?>webscome_professional_assets/images/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php echo asset(''); ?>webscome_professional_assets/css/main.css">
    <script src="https://kit.fontawesome.com/d177a7678c.js" crossorigin="anonymous"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <title>Webscome</title>

  </head>

  <body>

    <!--- Menu   --->
    @yield('menu')
    @include('layouts.messages')
    @yield('content')
    <!--- footer   --->
    <section class="footer-box pb-3 mt-3">
      <div class="container">

        <div class="row">
          <div class="col-md-8 p-2">
            <!--<form>-->
            <!--  <div class="form-row align-items-center">-->
            <!--    <div class="col-auto my-1">-->
            <!--      <div class="input-group">-->
            <!--        <div class="input-group-prepend">-->
            <!--          <div class="input-group-text">Select Your City</div>-->
            <!--        </div>-->
            <!--        <select class="form-control font-weight-bold" id="CitySelect" placeholder="Select City">-->
            <!--          <option selected><strong>Select Your City </strong></option>-->
            <!--          <option disabled><strong>India </strong></option>-->
            <!--          <option>Patna </option>-->
            <!--          <option>Delhi </option>-->
            <!--          <option><strong>Muzaffarpur </strong></option>-->

            <!--        </select>-->

            <!--      </div>-->
            <!--    </div>-->

            <!--    <div class="col-auto my-1">-->
            <!--      <button type="submit" class="btn btn-primary">Search</button>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</form>-->
          </div>
          @if(!Session::has('professional'))
          <div class="col-md-4 p-2">
            <a class="btn float-right btn-warning text-dark font-weight-bold" href="/professional/login"><u> Register As a Professionals </u></a>
          </div>
          @endif
        </div>
        <div class="row border-top p-2 ">
          <div class="col-4 col-md-2">
            <a href="index.html"><img src="<?php echo asset(''); ?>webscome_professional_assets/images/logo.png" class="footer-logo"></a>
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
            <a href="#"><img src="<?php echo asset(''); ?>webscome_professional_assets/images/google-playstore.png" class="footer-store"></a>
          </div>
          <div class="col-6 col-md-2">
            <a href="#"><img src="<?php echo asset(''); ?>webscome_professional_assets/images/apple-store.png" class="footer-store"></a>
          </div>



        </div>

      </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      @yield('script')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        @if(Session::has('success'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.success("{{ session('success') }}");
        @endif

            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.error("{{ session('error') }}");
        @endif

            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.info("{{ session('info') }}");
        @endif

            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.warning("{{ session('warning') }}");
        @endif
    </script>
  </body>
</html>
