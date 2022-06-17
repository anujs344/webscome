<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Webscome</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo asset(''); ?>webscome_assets/img/favicon.png" rel="icon">
  <link href="<?php echo asset(''); ?>webscome_assets/img/apple-touch-icon.png" rel="apple-touch-icon">





  <!-- Vendor CSS Files -->
  <link href="{{asset('webscome_assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('webscome_assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('webscome_assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('webscome_assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('webscome_assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('webscome_assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('webscome_assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('webscome_assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top nav-color">
    <div class="container d-flex align-items-center nav-color">


      <!-- Uncomment below if you prefer to use an image logo
        <h1 class="logo me-auto"><a href="index.html">Mentor</a></h1> -->
      <a href="index.html" class=" me-auto menu-logo"><img src="<?php echo asset(''); ?>webscome_assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar  order-lg-0 nav-color">
        <ul>
          <li><a class="active" href="{{ route('webscome') }}" id="home">Home</a></li>
          <li><a href="{{ route('about') }}" id="about">About</a></li>
          <li><a href="{{ route('team') }}" id="team">Our Team</a></li>
          <li><a href="{{ route('blog') }}" id="blog">Blog</a></li>

          <li><a href="{{ route('contact') }}" id="contact">Contact</a></li>
        </ul>
        <i class="fa fa-bars text-light d-block d-md-none mobile-nav-toggle pr-2"></i>
      </nav><!-- .navbar -->

      <a href="{{ route('services') }}" class="get-started-btn btn-warning" style="color:black !important;">Get Service</a>
      <a href="{{ route('premium_service') }}" class="get-started-btn btn-warning" style="color:black !important;">1999 Plan</a>


    </div>
  </header><!-- End Header -->
<div style="background-color: rgb(68, 0, 0)">
  @include('layouts.messages')
</div>
 @yield('content')
  <!--- footer   --->
  <section class="footer-box pb-3 mt-3">
    <div class="container">
      <div class="row pb-2 border-bottom">
          <div class="col-md-2 col-6 text-light">
            <a href="{{ route('webscome') }}" ><h6 class="">Home</h6></a>
          </div>
          <div class="col-md-2 col-6 text-light">
            <a href="{{ route('about') }}" ><h6 class="">About Us </h6></a>
          </div>
          <div class="col-md-2 col-6 text-light">
            <a href="{{ route('privacy') }}" ><h6 class="">Privacy Policy </h6></a>
          </div>
          <div class="col-md-2 col-6 text-light">
            <a href="{{ route('blog') }}"><h6 class="">Blog </h6></a>
          </div>
          <div class="col-md-2 col-6 text-light">
            <a href="{{ route('career') }}" ><h6 class="">Careers </h6></a>
          </div>
          <div class="col-md-2 col-6 text-light">
            <a href="{{ route('contact') }}" ><h6 class="">Contact Us </h6></a>
          </div>
        </div>
      <div class="row">
        <div class="col-md-4 p-2">
          <a class="btn float-right btn-warning text-dark font-weight-bold" href="{{ route('proWebscome') }}"><u> Register As a Professionals </u></a>
        </div>
        <div class="col-md-2 col-6 p-2">
          <img src="<?php echo asset(''); ?>webscome_assets/img/google-playstore.png" style="width:80%; height:auto;">
        </div>
        <div class="col-md-2 col-6 p-2">
          <img src="<?php echo asset(''); ?>webscome_assets/img/apple-store.png" style="width:80%; height:auto;">
        </div>
        <div class="col-md-3 p-2">
          <p class="font-weight-bold"><i class="fas fa-map-marker text-primary badge-light p-1"></i> Flat No. 302, 3rd Floor, Radhey Shayam Apartment, Beside Chapan Bhog Sweets,Gola Road , Patna-801503</p>
        </div>

      </div>
      <div class="row border-top p-2 ">
        <div class="col-4 col-md-2">
          <a href="{{ route('webscome') }}"><img src="<?php echo asset(''); ?>webscome_assets/img/logo.png" class="footer-logo"></a>
        </div>
        <div class="col-8 col-md-3  pt-3">
          <p class=""> &copy; 2021-22 Webscome Private Limited</p>
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



      </div>

    </div>
  </section>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa fa-arrow-up"></i></a>


    @yield('scripts')
  <!-- Vendor JS Files -->
  <script src="<?php echo asset(''); ?>webscome_assets/vendor/aos/aos.js"></script>
  <script src="<?php echo asset(''); ?>webscome_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo asset(''); ?>webscome_assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo asset(''); ?>webscome_assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo asset(''); ?>webscome_assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="<?php echo asset(''); ?>webscome_assets/js/main.js"></script>
  <script type="text/javascript">
    $('.carousel').carousel({
  interval: 2000
})</script>

  <script type="text/javascript">

      $(document).ready(function (){
          var url= window.location.pathname;
          var arr = url.split('/');
          var curr_tab= arr[3];  //local

          // var curr_tab= arr[1];  //production
          if (curr_tab==""){
              $("#home").addClass('active');
              $("#about").removeClass('active');
              $("#team").removeClass('active');
              $("#blog").removeClass('active');
              $("#contact").removeClass('active');
          }else if (curr_tab=="about"){
              $("#home").removeClass('active');
              $("#about").addClass('active');
              $("#team").removeClass('active');
              $("#blog").removeClass('active');
              $("#contact").removeClass('active');
          }else if (curr_tab=="team"){
              $("#home").removeClass('active');
              $("#about").removeClass('active');
              $("#team").addClass('active');
              $("#blog").removeClass('active');
              $("#contact").removeClass('active');
          }else if (curr_tab=="blog"){
              $("#home").removeClass('active');
              $("#about").removeClass('active');
              $("#team").removeClass('active');
              $("#blog").addClass('active');
              $("#contact").removeClass('active');
          }else if (curr_tab=="contact"){
              $("#home").removeClass('active');
              $("#about").removeClass('active');
              $("#team").removeClass('active');
              $("#blog").removeClass('active');
              $("#contact").addClass('active');
          }
      })
  </script>
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
