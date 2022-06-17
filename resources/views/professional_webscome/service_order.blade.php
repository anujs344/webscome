@extends('professional_webscome.layouts.master')

@section('menu')
    <section class="nav-color">
        <nav class="navbar navbar-expand-lg container ">
            <a class="navbar-brand" href="{{ route('proWebscome') }}"><img
                        src="<?php echo asset(''); ?>webscome_professional_assets/images/logo.png"
                        class="menu-logo"></a>
            <button class="navbar-toggler btn btn-dark" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="fa fa-bars "></i>
            </button>


            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item menu-item active">
                        <a class="nav-link" href="{{ route('proWebscome') }}"> Home </a>
                    </li>


                    @if (Route::currentRouteName()=='loginVerification'||Route::currentRouteName()=='professional.service_order'||Route::currentRouteName()=='professional.dashboard')

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $professional->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                                <form action="{{ route('proWebscome') }}" method="GET">

                                    <button type="submit" class="dropdown-item"><i
                                                class='text-sm text-gray-700 dark:text-gray-500 underline'></i><span>Logout</span></a>
                                </form>

                            </div>
                        </li>
                    @else
                        <li class="nav-item menu-item">
                            <a class="nav-link" href="{{ route('professional.login') }}"><i class="fa fa-user-lock"></i>
                                Login/ <i class="fa fa-sign-in-alt"></i> SignUp </a>
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
                        <button class="navbar-toggler btn-block" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                                aria-expanded="false" aria-label="Toggle navigation">
                            Profile <i class="fa fa-chevron-circle-down"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                            <div class="col-lg-12 pt-2">
                                <h4 class="align-content-between d-none d-md-block">Profile <i
                                            class="fa fa-chevron-up float-right"></i></h4>

                                <h5 class="pt-2 pb-2">Hello, {{ $professional->name }}</h5>

                                <ul class="list-unstyled">
                                    <li><strong><i class="fa fa-user p-adi"></i> &nbsp; ACCOUNT SETTINGS </strong></li>
                                    <hr>
                                    <ul class="list-unstyled pl-3">
                                        <li>
                                            <a href="{{ route('professional.dashboard',[$professional->id]) }}#personalInfo">
                                                Profile Information</a></li>
                                        <li><a href="{{ route('professional.dashboard',[$professional->id]) }}#address">
                                                Manage Address</a></li>


                                    </ul>
                                </ul>
                                <hr class="mt-3 mb-3" style="border: .5px solid #808080;">
                                <ul class="list-unstyled">
                                    <li><strong><i class="fa fa-id-card p-adi"></i> &nbsp; MY STUFF </strong></li>
                                    <hr>
                                    <ul class="list-unstyled pl-3">
                                        <li><a href="{{ route('professional.service_order',[$professional->id]) }}">
                                                Service Booking order</a></li>
                                        <li><a href="{{ route('professional.service_order',[$professional->id]) }}">
                                                Change Booking order Status</a></li>
                                        <!--<li><a href="{{ route('professional.wallet',[$professional->id]) }}"> Wallet</a>-->
                                        <!--</li>-->
                                    </ul>
                                </ul>
                                <br>
                                <hr class="mt-3 mb-3" style="border: .5px solid #808080;">
                                <!--<ul class="list-unstyled p-2">-->
                                <!--    <li><a href="{{ route('proWebscome') }}" class="btn btn-danger btn-block"><strong><i-->
                                <!--                        class="fa fa-power-off"></i> &nbsp; Logout </strong></a></li>-->
                                <!--</ul>-->

                            </div>
                        </div>
                    </nav>
                </div>

                <div class="col-md-9">
                    <div class="list-group">
              <span class="list-group-item list-group-item-action mb-2">
                <div class="row ml-2">
                  <h5 style="font-weight: bold">Orders assigned to you</h5>
                </div>
              </span>
                        @foreach ($orders as $order)
                            <div class="list-group-item list-group-item-action  mb-2">
                                <div class="row">
                                    <div class="col-2 col-md-2">
                                        <img src="{{asset('childcategory_images/'.$order->service_image)}}"
                                             class="w-100">
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <h6>{{ $order->service }}</h6>
                                        <h6><strong>Subtotal:</strong> ₹{{ $order->discounted_price }} </h6>
                                        <small><s class="text-muted">₹{{ $order->regular_price }} </s></small>
                                        <h6><strong>Quantity:</strong> {{ $order->service_quantity }} </h6>
                                        <h6><strong>Total:</strong>
                                            ₹{{ $order->service_quantity* $order->discounted_price }} </h6>
                                        <h6>Service Date : {{date('d-m-Y', strtotime($order->serviced_date))}}</h6>
                                        @if ($order->payment_mode == 'cod')
                                            <h6>Payment Mode : <span class="text-success font-weight-bold">Unpaid</span>
                                            </h6>
                                        @else
                                            <h6>Payment Mode : <span
                                                        class="text-danger font-weight-bold">Razorpay</span></h6>
                                        @endif

                                        <hr>
                                        <h6>Service Address:</h6>
                                        <p class="text-black font-weight-bold">Name : {{ $order->user_name }} <br>
                                            <a href="tel:9999887777"> Mob: {{ $order->user_phone }}</a>
                                        </p>
                                        <p>{{ $order->order_address }}, {{ $order->order_city }}
                                            , {{ $order->order_pincode }}</p>

                                    </div>
                                    @if ($order->service_order_status == 1)
                                        <div class="col-12 col-md-4 mt-2">
                                            <hr class="d-block d-md-none d-lg-none">


                                            <form action="{{ route('professional.accept_order') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Accept</button>
                                                <input type="text" name="order_id" value="{{ $order->order_id }}" hidden>
                                                <input type="text" name="service_id" value="{{ $order->service_id }}" hidden>
                                                <input type="number" name="professional_id"
                                                       value="{{ $professional->id }}" hidden>
                                            </form>
                                            &nbsp; &nbsp;
                                            <form action="{{ route('professional.reject_order') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Reject</button>
                                                <input type="text" name="order_id" value="{{ $order->order_id }}" hidden>
                                                <input type="text" name="service_id" value="{{ $order->service_id }}" hidden>
                                                <input type="number" name="professional_id"
                                                       value="{{ $professional->id }}" hidden>
                                            </form>

                                        </div>
                                    @elseif ($order->service_order_status == 3)
                                        <h6 class="text-danger"><b>Rejected</b></h6>
                                    @elseif ($order->service_order_status == 4)
                                        <h6 class="text-success"><b>Completed</b></h6>

                                    @elseif ($order->service_order_status == 5)
                                        <h6 class="text-danger"><b>Cancelled</b></h6>
                                    @elseif($order->service_order_status == 2)
                                        <div class="col-12 col-md-4 mt-2">
                                            <hr class="d-block d-md-none d-lg-none">
                                            <h6 class="text-success"><b>Accepted</b></h6>
                                            <form action="{{ route('professional.complete_order') }}" method="POST">
                                                @csrf
                                                <input type="text" name="order_id" value="{{ $order->order_id }}" hidden>
                                                <input type="text" name="service_id" value="{{ $order->service_id }}" hidden>
                                                <input type="number" name="professional_id"
                                                       value="{{ $professional->id }}" hidden>

                                                <select name="order_status" id="order_status" onchange="this.form.submit()"
                                                        class="form-control border border-warning">
                                                    <option value='2'>Accepted</option>
                                                    <option value='4'>Completed</option>
                                                </select>
                                            </form>


                                        </div>
                                    @endif

                                </div>
                            </div>

                        @endforeach


                    </div>
                </div>


            </div>
        </div>
        </div>
    </section>

@endsection

@section('script')

    <script>
        $('#order_status').on('change', function (e) {
            this.form.submit();
        });
    </script>
@endsection