@extends('webscome.layouts.master')

@section('content')
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Career</h2>
         <p>Start earning straight away. Share your details and we’ll rich out with next steps.</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="courses" class="courses mb-2">
      <div class="container" data-aos="fade-up">
        <form class="form-inline">
          <div class="row mb-4" >
            <div class="col-lg-3 form-inline">
                <input type="text" class="form-control frm-txt" id="exampleFormControlInput1" placeholder="Search Jobs">
            </div>
            <div class="col-lg-3">
                <input type="text" class="form-control frm-txt" id="exampleFormControlInput1" placeholder="Enter Location">
            </div>
            <div class="col-lg-3">
              <button type="submit" class="btn mb-2 btn-primary">Find jobs</button>
            </div>
          </div>
        </form>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          @foreach ($careers as $career)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="{{asset('career_images/'.$career->image)}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="font-weight-bold">Electrician</h4>
                  <p class="price"><i class="fas fa-calendar-alt"></i> {{ $career->created_at->toDateString() }}  </p>
                </div>

                <h3>{!! $career->title !!}</h3>
                <p>{!! Str::limit($career->description,130,$end='.......') !!}<br><br></p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">

                    <span><i class="fas fa-map-marker con-icon"></i> {{ $career->location }}, India</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <a href="mailto:example@gmail.com"><i class="fas fa-phone-alt con-icon"></i></a>&nbsp;
                    &nbsp;&nbsp;
                    <a href="tel:+911234567890"><i class="fas fa-envelope con-icon"></i></a>&nbsp;
                  </div>

                </div>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                     <a href="{{ route('careerdetails',[$career->id]) }}#apply" class="btn btn-warning">Apply Now...</a>

                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <a href="{{ route('careerdetails',[$career->id]) }}" class="btn btn-success">View More...</a>
                  </div>

                </div>

              </div>
            </div>
          </div>
          @endforeach
          <!-- End Course Item-->
        </div>


        <div class="row mt-4 mb-2">
            <div class=" text-center">
                <button type="button" class="btn btn-outline-primary">Prev</button>
                &nbsp;
                <button type="button" class="btn btn-primary">Next</button>
            </div>
        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection
