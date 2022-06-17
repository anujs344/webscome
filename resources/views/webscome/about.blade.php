@extends('webscome.layouts.master')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in" >
      <div class="container">
        <h2>About Us</h2>
        <p>Webscome company has app based marketplace that empowers professionals like you to become your own boss.  </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about about-h-b">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-3 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-9 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Who We Are?</h3>
            <p class="">
              Webscome is a on-demand service solution to sort all your home needs ranging from construction to maintenance, quickly, professionally and conveniently. We simplify your everyday living with a variety of at-home services all over Bihar, delivered by verified & qualified professionals only. Webscome on-demand home services include Interiors/Renovation/Construction Services, Home Cleaning, Bike & Car services, Interior & Exterior Designer at Home, Appliance Repairs, Pest Control, Plumbing/Electrical/Carpentry services & a lot more. We are serving all over Bihar currently.
            </p>
            @foreach ($services as $service )
            <h4>{{ $service->title }}</h4>

            <p>{!! $service->description !!}.</p>

            @endforeach
            
            
            <br>
            <p><b>Used, trusted and appreciated by many happy customers, download the Webscome App for all your home service needs now!</b></p>


          </div>
        </div>

      </div>
    </section><!-- End About Section -->


<!-- When need Un Comment this
    <section>
        
      <div class="container border border-info pb-5">
        <div class="row ">
          <div class="col-lg-12 pt-lg-2">
            <h2 class="text-center">Our Investors</h2>
          </div>
          <div class="col-lg-3 col-6 text-center">
              <img src="assets/img/image 52.png" class="">
          </div>
          <div class="col-lg-3 col-6 text-center">
              <img src="assets/img/image 53.png" class="">
          </div>
          <div class="col-lg-3 col-6 text-center">
              <img src="assets/img/image 54.png" class="">
          </div>
          <div class="col-lg-3 col-6 text-center">
              <img src="assets/img/image 55.png" class="">
          </div>
        </div>
      </div>
        
    </section>

    <section class="pb-md-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 pr-3 pl-3">
            <div class=" text-center box-webscome rounded p-3">
              <img src="assets/img/image 56.png" class="about-img">
              <h4>Debashis Barman</h4>
              <h4>
                  <i class="fab fa-linkedin-in text-primary"></i>
                  <i class="fab fa-twitter text-primary"></i>
              </h4>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus labore atque aperiam blanditiis. Ab in reiciendis exercitationem, cumque asperiores numquam ut eaque deleniti animi doloribus possimus perspiciatis doloremque dolor. Rerum omnis reprehenderit praesentium ipsum eligendi?
              </p>
            </div>
          </div>
          <div class="col-lg-4 pr-3 pl-3">
            <div class=" text-center box-webscome rounded p-3">
              <img src="assets/img/image 56.png" class="about-img">
              <h4>Debashis Barman</h4>
              <h4>
                  <i class="fab fa-linkedin-in text-primary"></i>
                  <i class="fab fa-twitter text-primary"></i>
              </h4>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus labore atque aperiam  blanditiis. Ab in reiciendis  exercitationem, cumque asperiores numquam ut eaque deleniti animi doloribus possimus perspiciatis doloremque dolor. Rerum omnis reprehenderit praesentium ipsum eligendi?
              </p>
            </div>
          </div><div class="col-lg-4 pr-3 pl-3">
            <div class=" text-center box-webscome rounded p-3">
              <img src="assets/img/image 56.png" class="about-img">
              <h4>Debashis Barman</h4>
              <h4>
                  <i class="fab fa-linkedin-in text-primary"></i>
                  <i class="fab fa-twitter text-primary"></i>
              </h4>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus labore atque aperiam blanditiis. Ab in reiciendis  exercitationem, cumque  asperiores numquam ut  eaque deleniti animi doloribus possimus perspiciatis doloremque dolor. Rerum omnis reprehenderit praesentium ipsum eligendi?
              </p>
            </div>
          </div>
          
        </div>
      </div>
    </section>

    
    <section class="mb-md-4 pb-md-5">
      <div class="container about-join-bg text-center pb-5">
        <div class="row mb-2">
          <div class="col-md-12 text-center">
            <h4>Join Webscome Company to change your life</h4>
            <p class="text-muted">Webscome company has app based marketplace that empowers professionals like you to become your own boss.</p>
          </div>
          <div class="col-lg-4 col-6 p-3 text-center">
            <h1 class="text-success glow-green">50,000+</h1>
            <p>Partners already on board</p>
          </div>
          <div class="col-lg-4 col-6 p-3 text-center">
            <h1 class="text-success glow-green">$1,000M</h1>
            <p>Paid out to partners in 2020</p>
          </div>
          <div class="col-lg-4 col-6 p-3 text-center">
            <h1 class="text-success glow-green">75,000+</h1>
            <p>Services delivered each month</p>
          </div>
        </div>
        <div class="row box-webscome pt-2 pb-2">
          <div class="col-md-12">
            <h2>Wondering who can join ?</h2>
            <p class="text-muted">If you have 1 year experience in any of these field, you can join Webscome company.</p>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-3 col-4 text-center">
            <div class="bg-primary rounded-circle p-4" style="width: 100px; height: 100px; margin: auto;">
              <img src="assets/img/repair (1) 1.png" class="img-fit-w" >
            </div>
            
            <h6>AC Repairing</h6>
          </div>
          <div class="col-md-3 col-4 text-center">
            <div class="bg-danger rounded-circle p-4" style="width: 100px; height: 100px; margin: auto;">
              <img src="assets/img/carpenter (1) 1.png" class="img-fit-w" >
            </div>
            
            <h6>Carpenter</h6>
          </div>
          <div class="col-md-3 col-4 text-center">
            <div class="bg-success rounded-circle p-4" style="width: 100px; height: 100px; margin: auto;">
              <img src="assets/img/household 1.png" class="img-fit-w" >
            </div>
            <h6>Cleaning</h6>
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
    </section>
-->

  </main><!-- End #main -->
@endsection