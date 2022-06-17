@extends('webscome.layouts.master')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Career Details</h2>
        <p>Start earning straight away. Share your details and we’ll rich out with next steps.</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12">
            <img src="{{asset('assets/img/course-details.jpg')}}" class="img-fluid" alt="">
            <h3>About {{ $career->title }} Job</h3>

            <p>{!! $career->description !!}</p>
            <h3>ELigibility Criteria:</h3>

            <p>
              {!! $career->eligibility !!}
            </p>

            <h3>Responsibilities:</h3>

            <p>
              {!! $career->responsibilities !!}
            </p>
            <h3>Important</h3>
            <ul>
                <div>
                  <b>Deadline-</b>
                  {!! $career->deadline !!}
                </div>

                <div>
                    <br/>
                        <b>Location-</b>
                        {!! $career->location !!}
                </div>

                <div>
                    <br/>
                        <b>Salary-</b>
                        {{ $career->salary }}
                </div>

                <div>
                    <br/>
                        <b>Timing-</b>
                        {{ $career->timing }}
                </div>
            </ul>


          </div>

        </div>

      </div>
    </section><!-- End Cource Details Section -->

    <div id="apply">
      <hr class="border border-warning" style="margin-top: -50px; margin-bottom: 30px;">
    </div>

    <!-- ======= Apply form  Section ======= -->
    <section class="cource-details-tabs">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-center">
          <div class="col-md-6 border border-info p-3">
            <h3 class="text-center">Apply Now</h3>
            <hr class="border border-info">
            <form accept-charset="UTF-8" action="{{ route('career_applications.store') }}" method="POST" enctype="multipart/form-data" target="_blank">
              @csrf
              <div class="form-group mb-2">
                <label for="exampleInputName">Full Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter your name" required="required">
              </div>
              <div class="form-group mb-2">
                <label for="exampleInputEmail1" required="required">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email address">
              </div>
              <div class="form-group mb-2">
                <label for="example-tel-input" class="col-2 col-form-label">Mobile No</label>
                <input class="form-control" name="phone" type="tel" placeholder="9999999999" id="example-tel-input">
              </div>
              <div class="form-group mb-2">
                <label for="inputAddress">Address</label>
                <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Address">
              </div>
              <div class="row mb-2">
                <div class="form-group col-md-6">
                  <label for="inputCity">City</label>
                  <input type="text" name="city" class="form-control" id="inputCity" placeholder="City">
                </div>
                <div class="form-group col-md-6 mb-2">
                  <label for="inputZip">Zip</label>
                  <input type="text" name="pincode" class="form-control" id="inputZip" placeholder="Pin Code">
                </div>
              </div>

              <div class="form-group mt-3 mb-2">
                <label class="mr-4">Upload your CV:</label>
                <input type="file" name="cv">
              </div>
              <hr class="border border-info">
              <div class="row w-100 mt-3 mb-2 jusstify-content-end">

                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary" style="background: dodgerblue">Submit</button>
                </div>

              </div>
            </form>
          </div>
        </div>

      </div>
    </section><!-- End Cource Details Tabs Section -->

  </main><!-- End #main -->
@endsection
