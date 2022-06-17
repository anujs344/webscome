@extends('webscome.layouts.master')

@section('content')

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Contact Us</h2>
      <p>Fill Up the form and our team will get back to you within 24 hours. </p>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">


    <div class="container" data-aos="fade-up">

      <div class="row mt-5 mb-2">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="fas fa-map-marker con-icon"></i>
              <h4>Location:</h4>
              <p class="font-weight-bold">Flat No. 302, 3rd Floor, Radhey Shayam Apartment, Beside Chapan Bhog Sweets,Gola Road , Patna-801503</p>
            </div>

            <div class="email">
              <i class="fas fa-envelope con-icon"></i>
              <h4>Email:</h4>
              <a href="mailto:example@gmail.com"><p class="font-weight-bold">info@example.com</p></a>
            </div>

            <div class="phone">
              <i class="fas fa-phone-alt con-icon"></i>
              <h4 class="flex flex-row" style="padding-left:15px !important">Call 
              <img src="https://cdn-icons-png.flaticon.com/512/724/724664.png" style="height:25px;width:25px;margin-left:4px" alt="" title="" class="loaded"/></h4>
            <ul>
                <li>
                    <a href="tel:18001212448"><p class="font-weight-bold">18001212448 <strong><small>( TollFree )</small></strong></p></a>
                </li>
                <li>
                    <a href="tel:7360051037"><p class="font-weight-bold">7360051037</p></a>
                </li>
                <li>
                    <a href="tel:7360051038"><p class="font-weight-bold">7360051038</p></a>
                </li>
            </ul>
            </div>
              

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">

          <form action="{{ route('contact_us.store') }}" method="POST" >
            @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" id="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" id="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Your Mobile number" required>
              </div>
            <div class="form-group mt-3">
              <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            

            <div class="text-center" style="margin-top: 10px"><button type="submit" class="btn" style="background: deepskyblue">Send Message</button></div>
          </form>

        </div>

      </div>

      <div class="row mb-4 mt-5">
          <div class="col-lg-12 box-adi-s mb-2" style="height:300px; width: 100%;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3598.3093030951586!2d85.18099711494195!3d25.594636383712828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed58ae16dcbfd1%3A0x312e454ce47c2a2f!2sRadheyShyam%20Apartment!5e0!3m2!1sen!2sin!4v1650619436571!5m2!1sen!2sin" height="300" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        
        </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

@endsection
