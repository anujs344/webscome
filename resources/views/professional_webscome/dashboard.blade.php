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


          @if (Route::currentRouteName()=='loginVerification'||Route::currentRouteName()=='loginVerification.success'||Route::currentRouteName()=='professional.service_order'||Route::currentRouteName()=='professional.dashboard')

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ $professional->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">



                <form action="{{ route('professional.logout') }}" method="POST">
                    @csrf
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
  <!--Profile  --->
  <section class="pb-5 mt-2 mt-md-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 sticky-sm-top sticky-xs-top ">
          <nav class="navbar navbar-expand-lg navbar-light ml-lg-3 pl-lg-3 p-2 sticky-top border border-secondary">
            <button class="navbar-toggler btn-block" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
              Profile <i class="fa fa-chevron-circle-down"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
              <div class="col-lg-12 pt-2">
                <h4 class="align-content-between d-none d-md-block">Profile <i class="fa fa-chevron-up float-right" ></i></h4>

                <h5 class="pt-2 pb-2">Hello, {{ $professional->name }}</h5>

                <ul class="list-unstyled">
                  <li><strong><i class="fa fa-user p-adi" ></i> &nbsp;  ACCOUNT SETTINGS </strong></li>
                  <hr>
                  <ul class="list-unstyled pl-3">
                    <li><a href="#personalInfo"> Profile Information</a></li>
                    <li><a href="#address"> Manage Address</a></li>



                  </ul>
                </ul>
                <hr class="mt-3 mb-3" style="border: .5px solid #808080;">
                <ul class="list-unstyled">
                  <li><strong><i class="fa fa-id-card p-adi" ></i> &nbsp; MY STUFF </strong></li>
                  <hr>
                  <ul class="list-unstyled pl-3">
                    <li><a href="{{ route('professional.service_order',[$professional->id]) }}"> Service Booking order</a></li>
                    <li><a href="{{ route('professional.service_order',[$professional->id]) }}"> Change Booking order Status</a></li>
                    <!--<li><a href="{{ route('professional.wallet',[$professional->id]) }}"> Wallet</a></li>-->
                  </ul>
                </ul>
                <br>
                <hr class="mt-3 mb-3" style="border: .5px solid #808080;">
              <!--  <ul class="list-unstyled p-2">-->
              <!--    <li><a href="{{ route('proWebscome') }}" class="btn btn-danger btn-block"><strong><i class="fa fa-power-off" ></i> &nbsp;  Logout </strong></a></li>-->
              <!--</ul>-->

              </div>
            </div>
          </nav>
        </div>

        <div class="col-md-9 border border-secondary pt-2">
          <div class="row p-md-2 pt-3" id="personalInfo">
            <div class="col-lg-12">
              <h3>Personal Information &nbsp; &nbsp; &nbsp;
              <hr>
            </div>
            <div class="col-lg-12">
              <div class="col-md-4">
                <form action="{{ route('professional_account_edit') }}" method="post">
                  @csrf
                  <input type="number" name="professional_id" value="{{ $professional->id }}" hidden>

                    <input type="text" class="form-control mb-2" placeholder="Enter Name" value="{{ $professional->name }}" name="name" onfocus="true" maxlength="" disabled required>
                    <input type="text" class="form-control mb-2" placeholder="Enter Email" value="{{ $professional->email }}" name="email" maxlength=""  disabled required>
                    <input type="text" class="form-control mb-2" placeholder="Enter Phone" value="{{ $professional->phone }}" name="phone" maxlength="" disabled required>

{{--                    <input type="text" class="form-control mb-2" placeholder="Enter Profession" value="{{ $service->title }}" name="" maxlength="" disabled required>--}}

                    <input type="number" class="form-control mb-2" placeholder="Enter Exprihence year" value="{{ $professional->experience }}" name="experience" maxlength="" disabled required>

                    <div class="form-control mb-2"><input type="radio" name="gender" value="Male" checked disabled> Male  <input type="radio" name="gender" value="Female" disabled> Female </div>

                    <button type="submit" name="" class="btn btn-info btn-block float-right ">Edit Account</button>

                    <br>

                  </form>
              </div>
            </div>

          </div>
          <div class="row p-lg-2">
            <div class="col-lg-12">
              <hr class="mt-3 mb-3" style="border: .5px solid #808080;">
            </div>
          </div>
          <div class="row p-lg-2 pt-3" id="address">
            <div class="col-lg-12">
              <h3>Manage Address</h3>
              <hr>
            </div>
            <div class="col-lg-12 p-3">
              <div class="col-md-8">
                <form action="#" method="post">
                  <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control mb-2" placeholder="Enter Name" name="" onfocus="true" maxlength="" required>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control mb-2" placeholder="10-Digit Mobile No" name="" maxlength="" required>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control mb-2" placeholder="Pin Code" name="" maxlength="" required>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control mb-2" placeholder="Locality" name="" maxlength="" required>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                        <textarea class="form-control mb-2" placeholder="Address(Area and Street)" name="" maxlength="" required> </textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control mb-2" placeholder="City/District/Town" name="" maxlength="" required>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control mb-2" placeholder="State" name="" maxlength="" required>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control mb-2" placeholder="Landmark(Optional)" name="" maxlength="" >
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control mb-2" placeholder="Alternet No(Optional)" name="" maxlength="" >
                    </div>

                  </div>

                  <div class="row pt-3">
                    <div class="col-12">
                      <hr>
                    </div>
                    <div class="col-6">
                      <button type="submit" name="" class="btn btn-info float-center btn-block">Add Address</button>
                    </div>
                    <div class="col-6">
                      <button type="submit" name="" class="btn btn-outline-danger float-right ">Cancel</button>
                    </div>

                  </div>


                </form>
              </div>
            </div>
            <div class="col-lg-12">
              <hr>
            </div>
            <div class="col-lg-12">
              <div class="row border border-warning p-md-3 pt-2 mb-2">
                <div class="col-8">
                  <h6>{{ $professional->name }} &nbsp; &nbsp; {{ $professional->phone }}</h6>
                  <p>Full Address: {{ $professional->address }} {{ $professional->pincode }} </p>
                </div>
                <div class="col-3">
                  <button class="btn btn-warning mb-2">Edit</button>
                  <button class="btn btn-danger mb-2">Delete</button>
                </div>

              </div>

            </div>
          </div>

        </div>



        </div>
    </div>
  </section>

  @endsection
