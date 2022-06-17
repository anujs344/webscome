@extends('webscome.layouts.master')

@section('content')

 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>WE PROVIDING SERVICES<br> THAT DRIVES VALUE AND IMPACT</h1>
      <a href="{{ route('services') }}" class="btn-get-started">Get Service</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{asset('webscome_assets/img/about.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>WE PROVIDING SERVICES THAT DRIVES VALUE AND IMPACT.</h3>
            <p class="fst-italic">
              Everyone attached with Webscome truly believes that, we are here with the purpose of delivering on-demand service solutions on their location that solves the problems of their home appliances and other hardware material. We improve the lives of people.
            </p>
            <p>Webscome has over 20+ home services offered in its platform. You can start out with AC repair service, get an electrician or a plumber, clean your house or office, repair your TV, fridge and other appliances, have your interior design done, get your computer working, carry out pest control, fix your mobile, get RO service & repair, service your car & bike, take care of various stuff list is endless.</p>
            <p>You are guaranteed to find a fair price on your job. Go through its website and application you can directly search which services you want to take. All professionals will be from your local area and verified by Webscome to assure the quality of the work. You can set the date and time as per your convenience for the job to be done.
            </p>
            <p>Professional can register themselves on the platform after going through the formalities and having their qualifications verified.</p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ App\Models\Professional::all()->count() }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>No of Professionals</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ App\Models\Category::all()->count() }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Services</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ App\Models\User::all()->count() }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>No of Customers</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1" class="purecounter"></span>
            <p>No of Servicing City</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose Webscome?</h3>
              <p>Webscome is a on-demand service solution to sort all your home needs ranging from construction to maintenance, quickly, professionally and conveniently. We simplify your everyday living with a variety of at-home services all over Bihar, delivered by verified & qualified professionals only.

              </p>
              <div class="text-center">
                <a href="about.html" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <img src="{{asset('webscome_assets/img/play-store.png')}}" class="w-100 img-thumbnail">
                    <h4 class="mt-4">Step 1</h4>
                    <p>Install Our App</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <img src="{{asset('webscome_assets/img/register-icon.png')}}" class="w-100 img-thumbnail">
                    <h4 class="mt-4">Step 2</h4>
                    <p>Register</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <img src="{{asset('webscome_assets/img/service.png')}}" class="w-100 img-thumbnail">
                    <h4 class="mt-4">Step 3</h4>
                    <p>Enjoy Our Service</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

        <!-- ======= Popular Services Section ======= -->
    <section id="popular-Services" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Popular Services</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          @foreach ($services as $service )
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" style="margin-top:6px;">
              <div class="course-item">
                <img src="{{asset('category_images/'.$service->image)}}" style="height: 250px;width: 100%" class="img-fluid" alt="...">
                <div class="course-content">
                  <h3>{{ $service->title }} Services</h3>
                  <p>{{ Str::limit($service->description,400,$end='.......') }}</p>
                  <div class="trainer d-flex justify-content-between align-items-center">
                    <div class="trainer-profile d-flex align-items-center">

                    </div>
                    <div class="trainer-rank d-flex align-items-center">
                      <a href="{{ route('services') }}" class="btn btn-outline-info">Get Services</a>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- End Course Item-->
          @endforeach
           <!-- End Course Item-->

        </div>

      </div>
    </section><!-- End Popular Courses Section -->



  </main><!-- End #main -->

  @endsection
