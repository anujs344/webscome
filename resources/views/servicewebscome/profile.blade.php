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

              <ul class="list-unstyled">
                <li><strong><i class="fa fa-user p-adi" ></i> &nbsp;  ACCOUNT SETTINGS </strong></li>
                <hr>
                <ul class="list-unstyled pl-3">
                  <li><a href="#personalInfo"> Profile Information</a></li>
                  <li><a href="#address"> Manage Addresses</a></li>

                  
                </ul>
              </ul>
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
                    </form>
                </li>
            </ul>

            </div>
          </div>
        </nav>
      </div>
          
      <div class="col-md-9 border border-secondary pt-2">
        <div class="row p-md-2 pt-3" id="personalInfo">
          <div class="col-lg-12">
            <h3>Personal Information &nbsp; &nbsp; &nbsp; <a href="{{ route('user.update_profile') }}"> edit</a></h3>
            <hr>
          </div>
          <div class="col-lg-12">
            <div class="col-md-4">
              <form action="{{ route('user.update_profile') }}" method="get">
                  <input type="text" class="form-control mb-2" placeholder="Enter Name" value="{{ Auth::user()->name }}" name="" onfocus="true" maxlength="" disabled required>
                  <input type="text" class="form-control mb-2" placeholder="Enter Email" value="{{ Auth::user()->email }}" name="" maxlength=""  disabled required>
                  <input type="text" class="form-control mb-2" placeholder="Enter Phone" value="{{ Auth::user()->phone }}" name="" maxlength="" disabled required>
                  <div class="form-control mb-2"><input type="radio" name="gender" value="Male" checked disabled> Male  <input type="radio" name="gender" value="Female" disabled> Female </div>
                  
                  <button type="submit" name="" class="btn btn-info btn-block float-right ">Edit Account</button>

                  <br>
                  

                </form>
            </div>
          </div>

        </div>
        <div class="row p-lg-2">
          <div class="col-lg-12">
            <hr class="mt-3 mb-3" style="border: .5px solid #808080;">
          </div>
        </div>
        <div class="row p-lg-2 pt-3" id="address">
          <div class="col-lg-12">
            <h3>Manage Address</h3>
            <hr>
          </div>
          <div class="col-lg-12 p-3">
            <div class="col-md-8">
              <form action="{{ route('user.update_address') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <label for="category" class="fw-bold">Name:</label>

                      <input type="text" value="{{ Auth::user()->name }}" class="form-control mb-2" placeholder="Enter Name" name="" onfocus="true" maxlength="" disabled>
                  </div>
                  <div class="col-sm-6">
                    <label for="category" class="fw-bold">Phone:</label>

                    <input type="text" value="{{ Auth::user()->phone }}" class="form-control mb-2" placeholder="10-Digit Mobile No" name="phone" maxlength="" required>
                  </div>

                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <label for="category" class="fw-bold">Pincode</label>

                      <input type="text" value="{{ Auth::user()->pincode }}" class="form-control mb-2" placeholder="Pin Code" name="pincode" maxlength="" required>
                  </div>
                  

                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <label for="category" class="fw-bold">Address</label>

                      <textarea class="form-control mb-2"  placeholder="Address(Area and Street)" name="address" maxlength="" required>{{ Auth::user()->address }} </textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <label for="category" class="fw-bold">City</label>

                      <input type="text" class="form-control mb-2" value="{{ Auth::user()->city }}" placeholder="City/District/Town" name="city" maxlength="" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="category" class="fw-bold">State</label>

                    <input type="text" value="{{ Auth::user()->state }}" class="form-control mb-2" placeholder="State" name="state" maxlength="" required>
                  </div>

                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <label for="category" class="fw-bold">Landmark</label>

                      <input type="text" value="{{ Auth::user()->landmark }}" class="form-control mb-2" placeholder="Landmark(Optional)" name="landmark" maxlength="" >
                  </div>
                  <div class="col-sm-6">
                    <label for="category" class="fw-bold">Alternate Phone</label>

                    <input type="text" value="{{ Auth::user()->alternate_phone }}" class="form-control mb-2" placeholder="Alternet No(Optional)" name="alternate_phone" maxlength="" >
                  </div>

                </div>
                
                <div class="row pt-3">
                  <div class="col-12">
                    <hr>  
                  </div>
                  <div class="col-6">
                    <button type="submit" name="" class="btn btn-info float-center btn-block">Add Address</button>
                  </div>  
                    

                </div>
                  
                  
              </form>
            </div>
          </div>
          <div class="col-lg-12">
            <hr>
          </div>
          <div class="col-lg-12">
            <div class="row border border-warning p-md-3 pt-2 mb-2">
              <div class="col-8">
                <h6>{{ Auth::user()->name }} &nbsp; &nbsp; {{ Auth::user()->phone }},{{ Auth::user()->alternate_phone }}</h6>
                <p>Full Address: {{ Auth::user()->address }}, {{ Auth::user()->landmark }}, {{ Auth::user()->city }}, {{ Auth::user()->state }}  -{{ Auth::user()->pincode }} </p>
              </div>
              
            </div>
            
            
          </div>
        </div>
        
      </div>



      </div>
  </div>
</section>

@endsection