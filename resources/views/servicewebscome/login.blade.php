@extends('servicewebscome.layouts.master')

@section('content')
<!--Login  --->
<section> 
    <div class="container mb-5 pt-4">
      <div class="row justify-content-center">
        <div class="col-md-4 box-adi box-adi-shaddow pb-3 box-webscome">
          
          <div class="col-md-12 pt-1 justify-content-center p-2">
            <h2 class="text-center p-adi">Login</h2>
            <hr>
          </div>
          <div class="col-md-12 pt-1">
            <form action="profile.html" method="get">
              <input type="text" class="form-control mb-2" placeholder="Enter Email" name="" onfocus="true" maxlength="" required>
              <input type="password" class="form-control  mb-4" placeholder="Enter Password" name="" maxlength="" required>

              <p><input type="checkbox" name=""> Remember me</p>
              <button type="submit" name="" class="btn btn-info btn-block">Login</button>

              <br>
              <br>
              <br>
              <br>
        
              <a href="" class="text-danger"><p>Forgot your password?</p></a>

              <a href="signup.html"><p>Didn't have an account? <big class="text-success">Create an account.</big></p></a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection