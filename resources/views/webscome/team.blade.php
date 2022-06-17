@extends('webscome.layouts.master')

@section('content')

<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Team</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= team Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          @foreach($teams as $team)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member border border-info">
                <img src="{{asset('team_members/'.$team->img_url)}}" class="img-fluid" alt="">
                <div class="member-content">
                  <h4>{{$team->name}}</h4>
                  <span>{{$team->designation}}</span>
                  <p>
                    {{$team->description}}
                  </p>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-instagram"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

        </div>

      </div>
        <div class="row mt-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{$teams->links()}}
                </ul>
            </nav>
        </div>
    </section><!-- End team Section -->
  </main><!-- End #main -->

@endsection