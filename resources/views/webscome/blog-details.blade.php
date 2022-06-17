@extends('webscome.layouts.master')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Blog Details</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="{{asset('blog_images/'.$blog->cover_image)}}" class="img-fluid" alt="">
            <h3>{{ $blog->service }}</h3>
            <p>
              {!! $blog->content !!}</p>
          </div>
          <div class="col-lg-4">


            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>No of Professionals </h5>
              <p>50</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Happy Customers</h5>
              <p>100</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>No of Servicing City</h5>
              <p>10</p>
            </div>

            <div class="course-info d-flex justify-content-end align-items-end">
              <a href="{{ route('services') }}" class="btn btn-outline-info">Get Services</a>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Cource Details Section -->



  </main><!-- End #main -->

@endsection
