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


          @if (Route::currentRouteName()=='professional_account_edit'||Route::currentRouteName()=='professional.service_order'||Route::currentRouteName()=='professional.dashboard')

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ $professional->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">



                <form action="{{ route('proWebscome') }}" method="GET">

                  <button type="submit" class="dropdown-item"><i class='text-sm text-gray-700 dark:text-gray-500 underline'></i><span>Logout</span></a>
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
  <!--Profile  --->
  <section class="pb-5 mt-2 mt-md-4">
    <div class="container-fluid">
      <div class="row">


        <div class="col-md-9 border border-secondary pt-2">
          <div class="row p-md-2 pt-3" id="personalInfo">
            <div class="col-lg-12">
              <h3>Personal Information <a href="#">Edit </a></h3>
              <hr>
            </div>
            <div class="col-lg-12">
              <div class="col-md-4">
                <form action="{{ route('professional.update') }}" method="post">
                    @csrf
                    <input type="number" name="professional_id" value="{{ $professional->id }}" hidden>
                    <input type="text" class="form-control mb-2" placeholder="Enter Name" value="{{ $professional->name }}" name="name" onfocus="true" maxlength=""  required>
                    <input type="text" class="form-control mb-2" placeholder="Enter Email" value="{{ $professional->email }}" name="email" maxlength=""  required>
                    <input type="text" class="form-control mb-2" placeholder="Enter Phone" value="{{ $professional->phone }}" name="phone" maxlength="" required>

                    <select name="service_id" disabled id="service_id" class="form-control shadow-none">
                        <option value="{{ $professional->service_id }}" selected disabled >{{ $service }}</option>
                    </select>

                    <label for="exp" style="margin-top: 1rem">Experience Years</label>
                    <input type="number" class="form-control mb-2" placeholder="Enter Experience year" value="{{ $professional->experience }}" name="experience" maxlength=""  required>


                    <button type="submit" name="" class="btn btn-info btn-block float-right ">Edit Account</button>

                    <br>

                  </form>
              </div>
            </div>

          </div>


        </div>



        </div>
    </div>
  </section>

  @endsection
