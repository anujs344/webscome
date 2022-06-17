@extends('servicewebscome.layouts.master')

@section('content')
<!--- Saperators   --->
<section class="p-2" style="background-image: url(<?php echo asset(''); ?>webscome_service_assets/images/webscome-banner.png); background-size: 100% 100%; background-position: center; background-repeat: no-repeat;">
    <div class="container-fluid pt-2 pb-3">
      <nav aria-label="breadcrumb" class="text-center d-flex justify-content-center pt-2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('services') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('services') }}">Service</a></li>
          <li class="breadcrumb-item active" aria-current="page">Services Sub Category</li>
        </ol>
      </nav>
    </div>
  </section>

  <!--- Services we provide   --->
  <section class="p-md-2 pt-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 pt-md-5">

          <h3 class="text-primary text-center ">Select a Service</h3>
          <hr class="d-block d-md-none">
        </div>
        <div class="col-md-12 pt-2 pb-2">
          <div class="row">

            @foreach ($sub_categories as $sub_category)
                @if ($sub_category->status =='1')
                <div class="col-6 col-md-3 mb-2 p-2">
                    <div class="card border-info">
                      <img src="{{asset('subcategory_images/'. $sub_category->image)}}" class="card-img-top" style="width:267px; height:280px;" alt="...">
                      <div class="card-body bg-warning border-top border-info">
                        <h5 class="card-title text-center">{{ $sub_category->title }}</h5>
                        <a href="{{ route('single_service_detail',[$sub_category->category_id,$sub_category->id]) }}" class="btn btn-block btn-primary">Get Service</a>
                      </div>
                    </div>
                  </div>
                @endif
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

  <!--- Safety we    --->
  <section class="p-md-2 pt-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 pt-md-4 mb-md-2">
          <h3 class="text-center">Best-in-class safety measure</h3>
        </div>

      </div>
      <div class="row mt-2 mb-3">
        <div class="col-md-2"></div>
        <div class="col-md-2 col-6">
          <img src="<?php echo asset(''); ?>webscome_service_assets/images/safety/mask.png" class="w-100 border border-success">
          <p class="mt-1"> Usage of masks & gloves</p>
        </div>
        <div class="col-md-2 col-6">
          <img src="<?php echo asset(''); ?>webscome_service_assets/images/safety/temprature.png" class="w-100 border border-success">
          <p class="mt-1"> Temprature Check </p>
        </div>
        <div class="col-md-2 col-6">
          <img src="<?php echo asset(''); ?>webscome_service_assets/images/safety/senetizer.png" class="w-100 border border-success">
          <p class="mt-1"> Sanitization of tools & area </p>
        </div>
        <div class="col-md-2 col-6">
          <img src="<?php echo asset(''); ?>webscome_service_assets/images/safety/aarogysetu.png" class="w-100 border border-success">
          <p class="mt-1"> Arogya setu to ensure safety </p>
        </div>

        <div class="col-md-2"></div>
      </div>
    </div>
  </section>

  <!--- Saperators   --->
  <section class="p-2" style="background: #ECEDEE;">
    <div class="container-fluid"></div>
  </section>


   <!--- Our Carpenters   --->
  <!-- <section class="p-md-2 pt-3">-->
  <!--  <div class="container">-->
  <!--    <div class="row">-->
  <!--      <div class="col-md-12 pt-md-5">-->

  <!--        <h3 class="text-primary">Our Carpenters</h3>-->
  <!--        <hr class="d-block d-md-none">-->
  <!--      </div>-->
  <!--      <div class="col-md-12 pt-2 pb-2">-->
  <!--        <div class="row text-black">-->
  <!--          <div class="col-6 col-md-2 mb-2 p-2">-->
  <!--            <div class="card border-warning">-->
  <!--              <img src="<?php echo asset(''); ?>webscome_service_assets/images/user.jpg" class="card-img-top w-100" alt="...">-->
  <!--              <div class="card-body bg-light border-top border-warning">-->
  <!--                <h5 class="card-title text-center">Carpenter Varma</h5>-->
  <!--                <h6>Ex Matrix | 10+ Years Experience</h6>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--          </div>-->

  <!--          <div class="col-6 col-md-2 mb-2 p-2">-->
  <!--            <div class="card border-warning">-->
  <!--              <img src="<?php echo asset(''); ?>webscome_service_assets/images/user.jpg" class="card-img-top w-100" alt="...">-->
  <!--              <div class="card-body bg-light border-top border-warning">-->
  <!--                <h5 class="card-title text-center">Carpenter Varma</h5>-->
  <!--                <h6>Ex Matrix | 10+ Years Experience</h6>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--          </div>-->

  <!--          <div class="col-6 col-md-2 mb-2 p-2">-->
  <!--            <div class="card border-warning">-->
  <!--              <img src="<?php echo asset(''); ?>webscome_service_assets/images/user.jpg" class="card-img-top w-100" alt="...">-->
  <!--              <div class="card-body bg-light border-top border-warning">-->
  <!--                <h5 class="card-title text-center">Carpenter Varma</h5>-->
  <!--                <h6>Ex Matrix | 10+ Years Experience</h6>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--          </div>-->

  <!--          <div class="col-6 col-md-2 mb-2 p-2">-->
  <!--            <div class="card border-warning">-->
  <!--              <img src="<?php echo asset(''); ?>webscome_service_assets/images/user.jpg" class="card-img-top w-100" alt="...">-->
  <!--              <div class="card-body bg-light border-top border-warning">-->
  <!--                <h5 class="card-title text-center text-black">Carpenter Varma</h5>-->
  <!--                <h6 class="text-black">Ex Matrix | 10+ Years Experience</h6>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--          </div>-->

  <!--          <div class="col-6 col-md-2 mb-2 p-2">-->
  <!--            <div class="card border-warning">-->
  <!--              <img src="<?php echo asset(''); ?>webscome_service_assets/images/user.jpg" class="card-img-top w-100" alt="...">-->
  <!--              <div class="card-body bg-light border-top border-warning">-->
  <!--                <h5 class="card-title text-center">Carpenter Varma</h5>-->
  <!--                <h6>Ex Matrix | 10+ Years Experience</h6>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--          </div>-->

  <!--          <div class="col-6 col-md-2 mb-2 p-2">-->
  <!--            <div class="card border-warning">-->
  <!--              <img src="<?php echo asset(''); ?>webscome_service_assets/images/user.jpg" class="card-img-top w-100" alt="...">-->
  <!--              <div class="card-body bg-light border-top border-warning">-->
  <!--                <h5 class="card-title text-center">Carpenter Varma</h5>-->
  <!--                <h6>Ex Matrix | 10+ Years Experience</h6>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--          </div>-->


  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->

  <!--</section>-->

  <!--- Saperators   --->
  <section class="p-2" style="background: #ECEDEE;">
    <div class="container-fluid"></div>
  </section>

  <!---  users saying  --->
  <section class="pt-3 pb-3">
    <div class="container border border-info p-3">
      <div class="row">
        <div class="col-md-12 mb-2"><h4>What users are saying about us</h4></div>
        <div class="col-md-3 mb-2">
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
            <div class="col-2 col-md-1">
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
  </section>

  <!---  customers saying  --->
  <section class="pt-3 pb-3">
    <div class="container border border-success p-3">
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
  </section>

  <!--- Saperators   --->
  <section class="p-2" style="background: #ECEDEE;">
    <div class="container-fluid"></div>
  </section>
@endsection
