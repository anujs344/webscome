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


          @if (Route::currentRouteName()=='loginVerification'||Route::currentRouteName()=='professional.service_order'||Route::currentRouteName()=='professional.dashboard'||Route::currentRouteName()=='professional.wallet')

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ $professional->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">



              <form action="{{ route('proWebscome') }}" method="POST">
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
                  <li><a href="{{ route('professional.wallet',[$professional->id]) }}"> Wallet</a></li>
                </ul>
              </ul>
              <br>
              <hr class="mt-3 mb-3" style="border: .5px solid #808080;">
              <ul class="list-unstyled p-2">
                <li><a href="{{ route('proWebscome') }}" class="btn btn-danger btn-block"><strong><i class="fa fa-power-off" ></i> &nbsp;  Logout </strong></a></li>
            </ul>

            </div>
          </div>
        </nav>
      </div>

      <?php $total_income=0; ?>

          <div class="col-md-9 pt-2">
            <div class="list-group">


              @foreach ($orders as $order)
                @if ($order->professional_paid_status == '0')
                <div class="list-group-item list-group-item-action border border-warning  mb-2">
                  <div class="row">
                    <div class="col-2 col-md-1">
                      <img src="<?php echo asset(''); ?>storage/cover_images_childcategory/{{ $order->service_image }}" class="w-100">
                    </div>
                    <div class="col-8 col-md-6">
                      <h6>{{ $order->service }}</h6>
                      <h6>Price: ₹{{ $order->discounted_price }} </h6>
                      <small><s class="text-muted">₹{{ $order->regular_price }} </s></small>
                      <h6>Service Date : 11, Jan 2022</h6>
                      <hr>
                      <h6>Service Address:</h6>
                      <p>{{ $order->user_address }},{{ $order->user_city }}</p>
                      <p>{{ $order->state }}, pin-{{ $order->user_pincode }}</p>

                    </div>
                    <div class="col-12 col-md-4 mt-2">
                      <hr class="d-block d-md-none d-lg-none">
                      <?php $total_income+=$order->discounted_price*$commission->professional_commission/100; ?>
                      <p class="text-success font-weight-bold">Your Earning : ₹{{ $order->price*$commission->professional_commission/100 }}</p>

                    </div>
                  </div>
                </div>
                @endif
              @endforeach

              <span class="list-group-item list-group-item-action list-group-item-info mb-2">
                <div class="row ml-2">
                  <div class="col-12">
                    <h5><i class="fa fa-wallet text-dark"> </i> Your Total Earning This Month  <span class="float-right text-success font-weight-bold">₹{{ $total_income }}</span></h5>

                  </div>
                </div>
              </span>

              <span class="list-group-item list-group-item-action list-group-item-info mb-2">
                <div class="row ml-2">
                  <div class="col-12">
                    <h5><i class=" text-dark"> </i> Paid Services  </h5>

                  </div>
                </div>
              </span>

              @foreach ($orders as $order)
                @if ($order->professional_paid_status == '1')
                <div class="list-group-item list-group-item-action border border-warning  mb-2">
                  <div class="row">
                    <div class="col-2 col-md-1">
                      <img src="<?php echo asset(''); ?>storage/cover_images_childcategory/{{ $order->service_image }}" class="w-100">
                    </div>
                    <div class="col-8 col-md-6">
                      <h6>{{ $order->service }}</h6>
                      <h6>Price: ₹{{ $order->price }} </h6>
                      <h6>Service Date : 11, Jan 2022</h6>
                      <hr>
                      <h6>Service Address:</h6>
                      <p>{{ $order->user_address }},{{ $order->user_city }}</p>
                      <p>{{ $order->state }}, pin-{{ $order->user_pincode }}</p>

                    </div>
                    <div class="col-12 col-md-4 mt-2">
                      <hr class="d-block d-md-none d-lg-none">
                      <?php $total_income+=$order->price*$commission->professional_commission/100; ?>
                      <p class="text-success font-weight-bold">Your Earning : ₹{{ $order->price*$commission->professional_commission/100 }}</p>

                    </div>
                  </div>
                </div>
                @endif
              @endforeach

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>



@endsection
