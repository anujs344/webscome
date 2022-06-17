@extends('servicewebscome.layouts.master')

@section('content')
<section class="pb-5 mt-2 mt-md-4">
    <div class="container">
      <div class="row">
        <div class="col-md-8 p-md-4 border border-secondary mb-2">
          <div class="row border-bottom">
            <div class="col-12 p-2 mb-3">
              <h4 class="mb-sm-2">Services ({{ $cart_contents->count() }})

              </h4>

            </div>

          </div>
          @foreach ($cart_contents as $cart_content)
            <div class="row p-2 border-bottom mb-2">
                <div class="col-3 col-md-2">
                <img src="{{asset('childcategory_images/'.$cart_content->service_image)}}" class="w-100 img-thumbnail">

                </div>
                <div class="col-9 col-md-9">
                <h6><a class="cbl font-weight-bold" href="service-single-details.html">{{ $cart_content->service }}</a></h6>
                <h5><b> ₹{{ $cart_content->discounted_price }} </b> <small><s class="text-muted">₹{{ $cart_content->regular_price }} </s></small></h5>
                <h6 class="text-black-50">Service Provider : {{ $cart_content->professional_name }}</h6>

                </div>
            </div>
          @endforeach


          <div class="row p-2  border-bottom mb-2">
            <div class="col-lg-12">
              <h5>Address Details:</h5>
              <hr class="border-dark">
              <h5 class="font-weight-bold">{{ Auth::user()->name }}</h5>
              <p>+91 {{ Auth::user()->phone }}</p>
              <p>{{ Auth::user()->email }}</p>
              <p>{{ Auth::user()->address }} <br>{{ Auth::user()->city }}</p>

            </div>
          </div>
          <div class="row p-2  mb-2">
            <div class="col-lg-12">
              <a href="{{ route('services') }}" class="btn btn-md btn-primary">Get Other Services</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="col border border-success mb-2 pt-1">
            <h4 class="mb-sm-2 text-muted border-bottom p-2">PRICE DETAILS</h4>
            <h6>Price ({{ $cart_contents->count() }} services)    <span class="float-right"> ₹{{ $cart_contents->sum('regular_price') }}</span></h6>
            <h6>Discount      <span class="float-right text-success">− ₹{{ $cart_contents->sum('regular_price')-$cart_contents->sum('discounted_price') }}</span></h6>
            <h6>TAX      <span class="float-right"> ₹0.00</span></h6>
            <hr>
            <h6><strong>Total Amount    <span class="float-right"> ₹{{ $cart_contents->sum('discounted_price') }}</span></strong></h6>
            <hr>
            <p class="text-success"></p>


          </div>
          <div class="col  border border-success mb-2 pt-2">
            <h5 class="font-weight-bold"> <input type="radio" name="pay"> Cash on Delivery</h5>
            <p class="text-muted ml-2">You have to pay 5% more of cart amount for COD.</p>

            <h5 class="font-weight-bold"> <input type="radio" name="pay"> Paytm</h5>
            <p class=" ml-2 text-success">₹{{ $cart_contents->sum('discounted_price') }}</p>

            <h5 class="font-weight-bold"> <input type="radio" name="pay"> RozorPay</h5>
            <p class=" ml-2 text-success">₹{{ $cart_contents->sum('discounted_price') }} </p>
            <div class="row pt-3" >
              <div class="col-lg-12 p-2">
                <a href="{{ route('carts.orderdetails') }}" class="btn btn-block btn-success"><strong>PLACE ORDER</strong></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
