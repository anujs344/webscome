@extends('servicewebscome.layouts.master')

@section('content')
    <!--- Banner   --->
<section class="">
    <div class="banner">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>

        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo asset(''); ?>webscome_service_assets/images/banner/banner1.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="<?php echo asset(''); ?>webscome_service_assets/images/banner/banner2.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="<?php echo asset(''); ?>webscome_service_assets/images/banner/banner3.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="<?php echo asset(''); ?>webscome_service_assets/images/banner/banner4.png" class="d-block w-100" alt="...">
          </div>


        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>



  <!--- Search City   --->
  <section>

    <div class="container p-md-3 mt-3">
      <div class="row ">

        <div class="col-lg-6 mb-2">
          <div class="row">
            <div class="col-lg-12">
              <h4 class="d-none d-sm-block d-md-block">WEBSCOME COMPANY</h4>
              <h3 class="font-weight-bold">Quality Home Service, On Demand</h3>
              <p>Experinced, hand-picked Professionals to serve at your door steps </p>
            </div>
          </div>
          <div class="row ">
            <div class="col-lg-12 p-2">

              
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-md-2 pr-md-2 mt-3 mb-3">
          <h2 class="pb-lg-2">Book Professional from your mobile</h2>
          <h5 class="text-muted pb-lg-4">Enter your mobile number to get app download link</h5>
          <form class="mt-3">
            <div class="form-row align-items-center">
              <div class="col-auto my-1">
                <div class="input-group">
                  <select class="form-control font-weight-bold" id="CitySelect" placeholder="Select City">
                    <option selected>+91</option>
                    <option>+92 </option>
                    <option>+111 </option>
                    <option><strong>+123 </strong></option>

                  </select>
                  <div class="input-group-pretpend">
                    <input type="text" class="form-control" placeholder="Enter Mobile No">
                  </div>

                </div>
              </div>

              <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary"><strong>Send</strong></button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>

  </section>

  <!--- Saperators   --->
  <section class="p-2" style="background: #ECEDEE;">
    <div class="container-fluid"></div>
  </section>

  <!--- Services we provide   --->
  <section class="p-md-2 pt-3" id="service">
    <div class="container">
      <div class="row">
          <div class="col-md-3">
            <div class=" pt-md-5  mt-md-5  text-center">

              <h4 class="text-primary text-center ">Services <br class="d-none d-sm-block"> we provide</h4>
              <hr class="d-block d-md-none">
            </div>
          </div>
          <div class="col-md-9 pt-2 pb-2">
            <div class="row">
              <!--loading the services -->
              @foreach ($services as $service )
                <div class="col-6 col-md-4 pl-md-2 mb-2">
                  <a href="{{ route('single_service',[$service->id]) }}" style="text-decoration: none;">
                    <div class="text-light">
                      <center class="bg-primary rounded">
                        <img src="{{asset('category_images/'.$service->image)}}" class="pt-3 " style="width:100px; height:100px;">
                        <h4 class="pt-2">{{ $service->title }} Repair</h4>
                        <p>{!! Str::limit($service->description,130,$end='.......') !!}</p>
                      </center>
                    </div>
                  </a>
                </div>
              @endforeach



            </div>
          </div>
        </div>
    </div>

  </section>

  <!--- Saperators   --->
  <section class="p-2" style="background: #ECEDEE;">
    <div class="container-fluid"></div>
  </section>



  <!--- Why Webscome   --->
  <section class=" pt-lg-4 pt-2 pb-lg-4">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <h2 class="p-2"> Why Webscome company?</h2>
            <hr class="d-block d-md-none">
          </div>
          <div class="row">
            <div class="col-3 col-md-2">
              <i class="fa fa-4x fa-file-invoice text-primary"></i>
            </div>
            <div class="col-9">
              <h4>Transparent pricing</h4>
              <p class="text-muted">See fixed price before you book. No hidden Charges.</p>
            </div>

          </div>
          <div class="row">
            <div class="col-3 col-md-2">
              <i class="fa fa-4x fa-user-secret text-primary"></i>
            </div>
            <div class="col-9">
              <h4>Expert Only</h4>
              <p class="text-muted">Our Professionls is well trained.</p>
            </div>

          </div>
          <div class="row">
            <div class="col-3 col-md-2">
              <i class="fa fa-4x fa-suitcase text-primary"></i>
            </div>
            <div class="col-9">
              <h4>Fully Equiped</h4>
              <p class="text-muted">We bring every thing need on job.</p>
            </div>

          </div>

        </div>
        <div class="col-md-6" style="background: #ECEDEE;">
          <div class="row">
            <div class="col-md-12 p-4">
              <center>
              <br>
              <img src="<?php echo asset(''); ?>webscome_service_assets/images/security 1.png" class="img img-responsive">

              <br><br>

              <h3>100% Quality Assured</h3>
              </center>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!--- Saperators   --->
  <section class="p-2" style="background: #ECEDEE;">
    <div class="container-fluid"></div>
  </section>

   <!--- Booking Professionals   --->
  <section class="">
    <div class="container">
      <div class="row pt-3 pb-3">
        <div class="col-md-6 pl-md-2 pr-md-2 pt-md-5">
          <h2 class="text-center">Download it now!</h2>


          <p class="mt-3 mt-lg-4 text-center">
            <a href="#"><img src="<?php echo asset(''); ?>webscome_service_assets/images/google-playstore.png" class="footer-store"></a>
            <a href="#"><img src="<?php echo asset(''); ?>webscome_service_assets/images/apple-store.png" class="footer-store"></a>
          </p>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6 col-6"><img src="<?php echo asset(''); ?>webscome_service_assets/images/main page 1.png" style="width: 100%; height: auto;"></div>
            <div class="col-md-6 col-6" ><img src="<?php echo asset(''); ?>webscome_service_assets/images/All details of service 1.png"  style="width: 100%; height: auto;"></div>
          </div>


        </div>

      </div>
    </div>
  </section>

@endsection
