@extends('servicewebscome.layouts.master')

@section('content')


<section class="pb-5 mt-2 mt-md-4">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 sticky-sm-top sticky-xs-top ">
        <nav class="navbar navbar-expand-lg navbar-light ml-lg-3 pl-lg-3 p-2 sticky-top border border-secondary">
          <button class="navbar-toggler btn-block" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
            Profile <i class="fa fa-chevron-circle-down"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent1">
            <div class="col-lg-12 pt-2">
              <h4 class="align-content-between d-none d-md-block">Profile <i class="fa fa-chevron-up float-right" ></i></h4>

              <h5 class="pt-2 pb-2">Hello, {{ Auth::user()->name }}</h5>

              
              <hr class="mt-3 mb-3" style="border: .5px solid #808080;">
              <ul class="list-unstyled">
                <li><strong><i class="fa fa-id-card p-adi" ></i> &nbsp; MY STUFF </strong></li>
                <hr>
                <ul class="list-unstyled pl-3">
                  <li><a href="{{ route('user.booked_services',[Auth::user()->id]) }}"> My booking Service</a></li>                      
                </ul>
              </ul>
              <br>
              <hr class="mt-3 mb-3" style="border: .5px solid #808080;">
              <ul class="list-unstyled p-2">
                  <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-block" ><strong><i class="fa fa-power-off" ></i> &nbsp;  Logout </strong></button>
                  </form></li>
            </ul>

            </div>
          </div>
        </nav>
      </div>
          
      <div class="col-md-9 border border-secondary pt-2">
        <div class="row p-md-2 pt-3" id="personalInfo">
          <div class="col-lg-12">
            <h3>Personal Information &nbsp; &nbsp; &nbsp; </h3>
            <hr>
          </div>
          <div class="col-lg-12">
            <div class="col-md-4">
              <form action="{{ route('user.profile.update') }}" method="post">
                @csrf
                  <input type="text" class="form-control mb-2" placeholder="Enter Name" value="{{ Auth::user()->name }}" name="name" onfocus="true" maxlength=""  required>
                  <input type="text" class="form-control mb-2" placeholder="Enter Email" value="{{ Auth::user()->email }}" name="email" maxlength=""   required>
                  <input type="text" class="form-control mb-2" placeholder="Enter Phone" value="{{ Auth::user()->phone }}" name="phone" maxlength=""  required>
                  
                  <button type="submit" name="" class="btn btn-info btn-block float-right ">Edit Account</button>

                  <br>
                  
                  

                </form>
            </div>
          </div>

        </div>
       
      </div>



      </div>
  </div>
</section>

@endsection