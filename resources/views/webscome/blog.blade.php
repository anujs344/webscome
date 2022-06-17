@extends('webscome.layouts.master')

@section('content')
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Blog</h2>
        <p>Webscome company has app based marketplace that empowers professionals like you to become your own boss. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          @foreach ($blogs as $blog)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="{{asset('blog_images/'.$blog->cover_image)}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>{{ $blog->category_title }}</h4>
                </div>

                <h3><a href="{{ route('blogdetails',[$blog->id]) }}">{{ $blog->title }}</a></h3>
                <p>{!! Str::limit($blog->content,130,$end='.......') !!}</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;50
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;65
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
          @endforeach
        </div>
      </div>
        <div class="row mt-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{$blogs->links()}}
                </ul>
            </nav>
        </div>

    </section><!-- End Blog Section -->

  </main><!-- End #main -->

@endsection
