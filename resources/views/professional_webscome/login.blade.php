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



              <form action="{{ route('proWebscome') }}" method="GET">

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
<section>
    <div class="container mb-5 pt-4">
      <div class="row justify-content-center">
        <div class="col-md-4 box-adi box-adi-shaddow pb-3 box-webscome">

          <div class="col-md-12 pt-1 justify-content-center p-2">
            <h2 class="text-center p-adi">Professional Login</h2>
            <hr>
          </div>
          <div class="col-md-12 pt-1">
            <form action="{{ route('loginVerification') }}" method="post">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter Email" name="email" id="email" onfocus="true" maxlength="" required>
              <input type="password" class="form-control  mb-4" placeholder="Enter Password" name="password" id="password" maxlength="" required>

              <p><input type="checkbox" name=""> Remember me</p>
              <button type="submit" name="" class="btn btn-info btn-block float-right ">Login</button>

              <br>
              <br>
              <br>
              <br>
             
              <a href="{{route('forget.password.get')}}" class="text-danger"><p>Forgot your password?</p></a>

              <a href="/professional#register_as_professional"><p>Didn't have an account? <big class="text-success">Create an account.</big></p></a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
