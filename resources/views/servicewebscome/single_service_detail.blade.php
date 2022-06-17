@extends('servicewebscome.layouts.master')

@section('content')

    <!--- Saperators   --->
    <section class="p-2"
             style="background-image: url(<?php echo asset(''); ?>webscome_service_assets/images/webscome-banner.png); background-size: 100% 100%; background-position: center; background-repeat: no-repeat;">
        <div class="container-fluid pt-2 pb-3">
            <nav aria-label="breadcrumb" class="text-center d-flex justify-content-center pt-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('services') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('services') }}">Service</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All</li>
                </ol>
            </nav>
        </div>
    </section>

    <!--- Services we provide   --->
    <section class="p-md-2 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pt-md-3 pb-md-3">

                    <h3 class="text-black text-center ">Services List</h3>
                    <hr class="d-block d-md-none">
                </div>
            </div>
{{--            <form class="bg-primary rounded p-3 box-webscome blue-form-box mr-md-5">--}}
{{--                <div class="form-row">--}}
{{--                    <div class="col-auto my-1">--}}
{{--                        <div class="font-weight-bold">--}}
{{--                            <label class="text-light">Where do you need a Service?</label>--}}

{{--                        </div>--}}
{{--                        <div class="input-group">--}}
{{--                            <select class="form-control font-weight-bold" name="city_name" id="city_name"--}}
{{--                                    placeholder="Select City" onchange="add_param()">--}}
{{--                                @if(!isset($_GET['city']))--}}
{{--                                    <option selected><strong>Select Your City </strong></option>--}}
{{--                                @else--}}
{{--                                    <option value="{{$_GET['city']}}" selected><strong>{{$_GET['city']}}</strong>--}}
{{--                                    </option>--}}
{{--                                @endif--}}
{{--                                <option disabled style="background: lightgray"><strong>India </strong></option>--}}
{{--                                <?php $cities = \App\Models\City::all()?>--}}
{{--                                @foreach($cities as $city)--}}
{{--                                    @if(isset($_GET['city']) and $_GET['city'] == $city)--}}
{{--                                        @continue--}}
{{--                                    @endif--}}
{{--                                    @if(!isset($_GET['city']))--}}
{{--                                        <option value="{{$city->city}}">{{$city->city}}</option>--}}
{{--                                    @else--}}
{{--                                        <option value="{{$city->city}}">{{$city->city}}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <script type="text/javascript">--}}
{{--                                function add_param() {--}}
{{--                                    var city = document.getElementById("city_name").value;--}}
{{--                                    const urlParams = new URLSearchParams(window.location.search);--}}
{{--                                    urlParams.set('city', city);--}}
{{--                                    window.location.search = urlParams;--}}
{{--                                }--}}
{{--                            </script>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </form>--}}


            <div class="row pt-2 pb-2">
                @foreach ($child_categories as $child_category)
                    @if ($child_category->status =='1')
                        <div class="col-6 col-md-3 mb-2 p-2">
                            <div class="card border-info">
                                <div class="card-img-top">
                                    <img src="{{asset('childcategory_images/'.$child_category->image)}}"
                                         class="card-img-top" alt="...">
                                </div>
                                <div class="card-body border-top border-info">
                                    <h6 class="text-warning font-weight-bold"> UP TO 30% OFF</h6>
                                    <h6 class="text-success">
                                        <span class="font-weight-bold">₹{{ $child_category->discounted_price }}  </span>

                                        <small><s class="text-muted">₹{{ $child_category->regular_price }} </s></small>
                                    </h6>
                                    <h6 class="text-black"><i class="fa fa-clock"></i> 45 mins </h6>
                                </div>
                                <div class="card-footer bg-warning">
                                    <form action="{{route('carts.store',$child_category->id)}}" method="POST">
                                        @csrf
                                        <h5 class="card-title text-center text-black">{{ $child_category->title }}</h5>
                                        <button class="btn btn-block btn-primary">Add To Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>



    <!--- Saperators   --->
    <section class="p-2" style="background: #ECEDEE;">
        <div class="container-fluid"></div>
    </section>
@endsection
