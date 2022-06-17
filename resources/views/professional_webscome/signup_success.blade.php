@extends('professional_webscome.layouts.master')

@section('menu')
  <section class="nav-color">
    <nav class="navbar navbar-expand-lg container ">
      <a class="navbar-brand" href="{{ route('proWebscome') }}"><img src="<?php echo asset(''); ?>webscome_professional_assets/images/logo.png" class="menu-logo"></a>
      <button class="navbar-toggler btn btn-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars "></i>
      </button>


      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item menu-item active">
            <a class="nav-link" href="{{ route('proWebscome') }}"> Home </a>
          </li>


          @if (Route::currentRouteName()=='loginVerification'||Route::currentRouteName()=='professional.service_order'||Route::currentRouteName()=='professional.dashboard')

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">



              <form action="{{ route('proWebscome') }}" method="GETT">

                  <button type="submit" class="dropdown-item"><i class='text-sm text-gray-700 dark:text-gray-500 underline'></i><span>Logout</span></button>
              </form>

          </div>
          </li>
          @else
          <li class="nav-item menu-item">
            <a class="nav-link" href="{{ route('professional.login') }}"><i class="fa fa-user-lock"></i> Login/ <i class="fa fa-sign-in-alt"></i> SignUp </a>
          </li>

          @endif

        </ul>

      </div>
    </nav>

  </section>
@endsection

@section('content')
<!--Forget Password  --->
<section>
    <div class="container mt-2 mb-5 pt-5">
      <div class="row justify-content-center">
        <div class="col-md-6 box-adi box-adi-shaddow pb-3 box-webscome">

          <div class="col-md-12 pt-2 justify-content-center">
            <hp class="text-success">Registration Sucessful We will contact you soon and verify your account. then we will send confirmation to your mail id</hp>
            <hr>
          </div>
        </div>
    </div>
  </section>

  @endsection
