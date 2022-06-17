@extends('servicewebscome.layouts.master')
@section('content')
<section class="pb-5 mt-2 mt-md-4">
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 sticky-sm-top sticky-xs-top ">
            <nav class="navbar navbar-expand-lg navbar-light ml-lg-3 sticky-top border border-secondary">
              <button class="navbar-toggler btn-block" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                Service Status <i class="fa fa-chevron-circle-down"></i>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="col-lg-12 pt-2">

                  <h5 class="pt-2 pb-2 d-none d-md-block" >Filters </h4>
                  <div class="list-group">
                    <span class="list-group-item list-group-item-action">
                      <div class="row">
                        <h6>SERVICE STATUS</h6>
                      </div>
                    </span>
                    <a href="#" class="list-group-item list-group-item-action">
                      <div class="row ml-2">
                        <p><input type="checkbox" name=""> Upcoming Services</p>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action ">
                      <div class="row ml-2">
                        <p><input type="checkbox" name=""> Serviceded</p>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action ">
                      <div class="row ml-2">
                        <p><input type="checkbox" name=""> Cancelled</p>
                      </div>
                    </a>
                    <span class="list-group-item list-group-item-action">
                      <div class="row">
                        <h6>SERVICE TIME</h6>
                      </div>
                    </span>
                    <a href="#" class="list-group-item list-group-item-action">
                      <div class="row ml-2">
                        <p><input type="checkbox" name=""> On the way</p>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action ">
                      <div class="row ml-2">
                        <p><input type="checkbox" name=""> Last 30 days</p>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action ">
                      <div class="row ml-2">
                        <p><input type="checkbox" name=""> 2021</p>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action ">
                      <div class="row ml-2">
                        <p><input type="checkbox" name=""> 2020</p>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action ">
                      <div class="row ml-2">
                        <p><input type="checkbox" name=""> Older</p>
                      </div>
                    </a>

                  </div>


                </div>
              </div>
            </nav>
          </div>

          <div class="col-md-9">
            <div class="list-group">
              <span class="list-group-item list-group-item-action mb-2">
                <div class="row ml-2">
                  <h5>Are you looking for these Servies?</h5>
                </div>
              </span>

              @foreach ($cart_contents as $order)
              <a href="orderdetails.html" class="list-group-item list-group-item-action  mb-2">
                <div class="row">
                  <div class="col-2 col-md-2">
                    <img src="{{asset('childcategory_images/'.$order->service_image)}}" class="w-100">
                  </div>
                  <div class="col-8 col-md-6">
                    <h6>{{ $order->service }}</h6>
                    <h6>Price: ₹{{ $order->price }} </h6>
                    <h6 class="text-black-50">Service Provider : {{ $order->professional_name }}</h6>

                  </div>
                  <div class="col-12 col-md-4">
                    <hr class="d-block d-md-none d-lg-none">
                    @if($order->order_status=='1')
                    <p class="text-primary">Your order has been placed.</p>
                    @elseif ($order->order_status=='2')
                    <p class="text-success">Your order has been accepted by professional.</p>
                    @elseif ($order->order_status=='3')
                    <p class="text-danger">Your order has been rejected by professional.</p>
                    @elseif ($order->order_status=='4')
                    <p class="text-success">Your order has been completed.</p>
                    @elseif ($order->order_status=='5')
                    <p class="text-danger">Your order has been cancelled by you.</p>
                    @endif
                  </div>
                </div>
              </a>
              @endforeach







            </div>
          </div>


        </div>
      </div>
    </div>
  </section>
@endsection
