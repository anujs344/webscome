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
    <div class="container mb-5 pt-5">
      <div class="row justify-content-center">
        <div class="col-md-4 box-adi box-adi-shaddow pb-3 box-webscome">
          <div class="col-md-12 pt-1 justify-content-center p-2">
            <h4 class="text-center p-adi">Sign Up As Professional</h4>
            <hr>
          </div>
          <div class="col-md-12 pt-1">
              <form action="{{route('professional.signup_success')}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <input type="text" class="form-control mb-2" placeholder="Enter Full Name" name="name" onfocus="true" maxlength="" required>
                  <input type="email" class="form-control mb-2" placeholder="Enter Email" name="email" maxlength="" required>
                  <input type="text" class="form-control mb-2" placeholder="Enter Phone" name="phone" maxlength="" required>
{{--                  <input type="hidden" value="{{$category->id}}" name="service">--}}
                  <select class="form-control mb-2" name="service" required>
                      @foreach($categories as $category)
                          <option value="{{$category->title}}">{{$category->title}}</option>
                      @endforeach
                  </select>
                  <select class="form-control mb-2" name="sub_service" required>

                  </select>
                  <input type="number" class="form-control mb-2" placeholder="Experience years" name="experience" maxlength="" required>
                  <hr>
                  <label class="text-left float-left">Address:</label>
                  <input type="text" class="form-control mb-2" placeholder="Line 1*" name="line1" onfocus="true" maxlength="" required>
                  <input type="text" class="form-control mb-2" placeholder="Line 2" name="line2" onfocus="true" maxlength="" required>
                  <input type="text" class="form-control mb-2" placeholder="City" name="city" onfocus="true" maxlength="" required>
                  <input type="text" class="form-control mb-2" placeholder="Pincode" name="pincode" onfocus="true" maxlength="" required>

                  <hr class="border border-warning">

                  <input type="password" class="form-control  mb-2" placeholder="Enter Password" name="password" maxlength="" required>
                  <hr class="border border-warning">

                  <label class="text-left float-left">Aadhar:</label>
                  <input type="file" class="form-control  mb-2" placeholder="Upload Aadhar" name="aadhar_image" maxlength="" required>

                  <label class="text-left float-left">Other Document:</label>
                  <input type="file" class="form-control  mb-2" placeholder="Upload Aadhar" name="other_document" maxlength="" required>
                  <button type="submit" name="" class="btn btn-info btn-block float-right">Create Account</button>
                  <br>
                  <br>
                  <br>
                  <br>
                  <a href="login.html"><p>Already have an account? <big class="text-success"> Login. </big></p></a>
              </form>
          </div>
        </div>
    </div>
  </section>

@endsection
