@extends('servicewebscome.layouts.master')

@section('content')
    <!--- Saperators   --->
    <section class="p-2" style="background-image: url(<?php echo asset(''); ?>webscome_service_assets/images/webscome-banner.png); background-size: 100% 100%; background-position: center; background-repeat: no-repeat;">
        <div class="container-fluid pt-2 pb-3">
          <nav aria-label="breadcrumb" class="text-center d-flex justify-content-center pt-2">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="index.html#service">Service</a></li>
              <li class="breadcrumb-item active" aria-current="page">Service Provider</li>
            </ol>
          </nav>
        </div>
      </section>


      <section class="p-md-2 pt-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12 pt-md-3 pb-md-3">

              <h3 class="text-black text-center">{{ $service->title }} Service provider List</h3>
              <hr class="d-block d-md-none">
            </div>
          </div>
          @foreach ($professionals as $professional)
            @if ($professional->verification_status== '1')
                <div class="row pt-2 pb-2 border border-secondary mb-3">
                    <div class="col-12 col-md-3 mb-2">
                    <img src="{{asset('childcategory_images/'.$service->image )}}" class="w-100 img-thumbnail" alt="...">
                    </div>
                    <div class="col-12 col-md-6 mb-2 p-2">
                    <h4 class="">{{ $service->title }} by <span class="badge-info pl-2 pr-2">{{ $professional->name }}</span></h4>
                    <p class="text-muted"> 4.76 <i class="fa fa-star text-black"></i><br>
                        300+ ratings
                    </p>
                    <h4 class="text-warning"> UP TO 30% OFF</h4>
                    <h4 class="text-success">
                        ₹{{ $service->discounted_price }}
                        <span class="text-black">
                        <s class="text-muted">₹{{ $service->regular_price }}</s>  &nbsp;&nbsp;
                        <i class="fa fa-clock"></i> 45 mins
                        </span>
                    </h4>
                    <!-- Button trigger modal -->
                    <a href="" data-toggle="modal" data-target="#exampleModal1"> View Details</a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chair repair 1</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <!---  Service include  --->
                            <div class="container border border-warning p-3 mb-2">
                                <div class="row">
                                <div class="col-12">
                                    <h4>What does ths service include</h4>
                                    <p>This service include this and that</p>
                                    <p>This service include this and that</p>
                                    <p>This service include this and that</p>
                                </div>
                                </div>
                            </div>
                            <!---  users saying  --->
                            <div class="container border border-info p-3 mb-2">
                                <div class="row">
                                <div class="col-md-12 mb-2"><h4>What users are saying about us</h4></div>
                                <div class="col-md-5 mb-2">
                                    <div class="row">
                                    <div class="col-2 col-md-2">
                                        <i class="fa fa-2x fa-star text-warning"></i>
                                    </div>
                                    <div class="col-9 col-md-10">
                                        <p>4.8 out of 5 stars<br>
                                        <span class="text-muted">Average rating of our service</span></p>
                                    </div>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="row">
                                    <div class="col-2 col-md-2">
                                        <i class="fa fa-2x fa-comment-dots text-warning"></i>
                                    </div>
                                    <div class="col-9 col-md-10">
                                        <p>36,000+ reviews<br>
                                        <span class="text-muted">Of our service by user</span></p>
                                    </div>
                                    </div>

                                </div>

                                </div>
                            </div>

                            <!---  customers saying  --->
                            <div class="container border border-success p-3 mb-2">
                                <div class="row">
                                <div class="col-md-12 mb-2"><h4>What our customers say</h4></div>
                                </div>
                                <div class="row mb-3">
                                <div class="col-2 col-lg-1 pt-1">
                                    <i class="fa fa-user-circle fa-3x text-dark"></i>
                                </div>
                                <div class="col-8 col-lg-9">
                                    <p class="text-black"><b> Customer Kumar </b><br>
                                    <span class="text-muted"> "Best Service. He was punctual, polit and professional, thanks. "</span>
                                    </p>
                                </div>
                                <div class="col-2 col-lg-2 pt-1">
                                    <p>4.5 <i class="fa fa-star text-warning"></i></p>
                                </div>

                                </div>
                                <div class="row mb-3">
                                <div class="col-2 col-lg-1 pt-1">
                                    <i class="fa fa-user-circle fa-3x text-dark"></i>
                                </div>
                                <div class="col-8 col-lg-9">
                                    <p class="text-black"><b> Customer Kumar </b><br>
                                    <span class="text-muted"> "Best Service. He was punctual, polit and professional, thanks. "</span>
                                    </p>
                                </div>
                                <div class="col-2 col-lg-2 pt-1">
                                    <p>4.5 <i class="fa fa-star text-warning"></i></p>
                                </div>

                                </div>
                                <div class="row mb-3">
                                <div class="col-2 col-lg-1 pt-1">
                                    <i class="fa fa-user-circle fa-3x text-dark"></i>
                                </div>
                                <div class="col-8 col-lg-9">
                                    <p class="text-black"><b> Customer Kumar </b><br>
                                    <span class="text-muted"> "Best Service. He was punctual, polit and professional, thanks. "</span>
                                    </p>
                                </div>
                                <div class="col-2 col-lg-2 pt-1">
                                    <p>4.5 <i class="fa fa-star text-warning"></i></p>
                                </div>

                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>

                    </div>
                    <div class="col-12 col-md-3 mb-2 p-2">
                    <a href="{{ route('carts.store',[$service->id,$professional->id]) }}" class="btn btn-success">Add <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            @endif

        @endforeach

        </div>

      </section>


      <!--- Services we provide   --->




      <!--- Saperators   --->
      <section class="p-2" style="background: #ECEDEE;">
        <div class="container-fluid"></div>
      </section>
@endsection
