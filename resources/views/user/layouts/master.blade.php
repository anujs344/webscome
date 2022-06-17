<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <!-- Favicons -->
    <link href="images/favicon.png" rel="icon">
    <link href="images/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://kit.fontawesome.com/d177a7678c.js" crossorigin="anonymous"></script>

    <title>Webscome</title>

  </head>

  <body>

    <!--- Menu   --->
    <section class="nav-color">
      <nav class="navbar navbar-expand-lg container ">
        <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="menu-logo"></a>  
        <button class="navbar-toggler btn btn-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars "></i>
        </button>
      
      
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item menu-item active">
              <a class="nav-link" href="index.html"> Home </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Services
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="service-single.html">AC Repair</a>
                <a class="dropdown-item" href="#">Bike Service</a>
                <a class="dropdown-item" href="#">Car Service</a>
                <a class="dropdown-item" href="#">Carpenter</a>
                <a class="dropdown-item" href="#">House Cleaners</a>
                <a class="dropdown-item" href="#">Electrician</a>
                <a class="dropdown-item" href="#">Appliance Repire</a>
                <a class="dropdown-item" href="#">RO Service</a>
                <a class="dropdown-item" href="#">Interier / Exterier
                    Design</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item menu-item">
              <a class="nav-link" href="login.html"><i class="fa fa-user-lock"></i> Login/ <i class="fa fa-sign-in-alt"></i> SignUp </a>
            </li>

          </ul>
          
        </div>
      </nav>

    </section>
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

                  <h5 class="pt-2 pb-2">Hello, Nitish</h5>

                  <ul class="list-unstyled">
                    <li><strong><i class="fa fa-user p-adi" ></i> &nbsp;  ACCOUNT SETTINGS </strong></li>
                    <hr>
                    <ul class="list-unstyled pl-3">
                      <li><a href="profile.html#personalInfo"> Profile Information</a></li>
                      <li><a href="profile.html#address"> Manage Addresses</a></li>

                      
                    </ul>
                  </ul>
                  <hr class="mt-3 mb-3" style="border: .5px solid #808080;">
                  <ul class="list-unstyled">
                    <li><strong><i class="fa fa-id-card p-adi" ></i> &nbsp; MY STUFF </strong></li>
                    <hr>
                    <ul class="list-unstyled pl-3">
                      <li><a href="booked-service.html"> My booking Service</a></li>                      
                    </ul>
                  </ul>
                  <br>
                  <hr class="mt-3 mb-3" style="border: .5px solid #808080;">
                  <ul class="list-unstyled p-2">
                    <li><a href="#" class="btn btn-danger btn-block"><strong><i class="fa fa-power-off" ></i> &nbsp;  Logout </strong></a></li>
                </ul>

                </div>
              </div>
            </nav>
          </div>
              
          <div class="col-md-9 border border-secondary pt-2">
            <div class="row p-md-2 pt-3" id="personalInfo">
              <div class="col-lg-12">
                <h3>Personal Information &nbsp; &nbsp; &nbsp; <a href="#">Edit </a></h3>
                <hr>
              </div>
              <div class="col-lg-12">
                <div class="col-md-4">
                  <form action="#" method="post">
                      <input type="text" class="form-control mb-2" placeholder="Enter Name" value="Abc Name" name="" onfocus="true" maxlength="" disabled required>
                      <input type="text" class="form-control mb-2" placeholder="Enter Email" value="Xysdfh@fdg.com" name="" maxlength=""  disabled required>
                      <input type="text" class="form-control mb-2" placeholder="Enter Phone" value="00998888" name="" maxlength="" disabled required>
                      <div class="form-control mb-2"><input type="radio" name="gender" value="Male" checked disabled> Male  <input type="radio" name="gender" value="Female" disabled> Female </div>
                      
                      <button type="submit" name="" class="btn btn-info btn-block float-right ">Edit Account</button>

                      <br>
                      <a href="forget-password.html"><p>Forgot/Change your password?</p></a>

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
                  <form action="#" method="post">
                    <div class="row">
                      <div class="col-sm-6">
                          <input type="text" class="form-control mb-2" placeholder="Enter Name" name="" onfocus="true" maxlength="" required>
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control mb-2" placeholder="10-Digit Mobile No" name="" maxlength="" required>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                          <input type="text" class="form-control mb-2" placeholder="Pin Code" name="" maxlength="" required>
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control mb-2" placeholder="Locality" name="" maxlength="" required>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                          <textarea class="form-control mb-2" placeholder="Address(Area and Street)" name="" maxlength="" required> </textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                          <input type="text" class="form-control mb-2" placeholder="City/District/Town" name="" maxlength="" required>
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control mb-2" placeholder="State" name="" maxlength="" required>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                          <input type="text" class="form-control mb-2" placeholder="Landmark(Optional)" name="" maxlength="" >
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control mb-2" placeholder="Alternet No(Optional)" name="" maxlength="" >
                      </div>

                    </div>
                    
                    <div class="row pt-3">
                      <div class="col-12">
                        <hr>  
                      </div>
                      <div class="col-6">
                        <button type="submit" name="" class="btn btn-info float-center btn-block">Add Address</button>
                      </div>  
                      <div class="col-6">
                        <button type="submit" name="" class="btn btn-outline-danger float-right ">Cancel</button>
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
                    <h6>Mohan Kumar &nbsp; &nbsp; 9098909090</h6>
                    <p>Full Address: dshfshdfskjdf klsdjfklsjad -844101 </p>
                  </div>
                  <div class="col-3">
                    <button class="btn btn-warning mb-2">Edit</button>
                    <button class="btn btn-danger mb-2">Delete</button>
                  </div>

                </div>
                <div class="row  border border-warning p-md-3 pt-2 mb-2">
                  <div class="col-8">
                    <h6>Mohan Kumar &nbsp; &nbsp; 9098909090</h6>
                    <p>Full Address: dshfshdfskjdf klsdjfklsjad -844101 </p>
                  </div>
                  <div class="col-3">
                    <button class="btn btn-warning mb-2">Edit</button>
                    <button class="btn btn-danger mb-2">Delete</button>
                  </div>

                </div>
                <div class="row  border border-warning p-md-3 pt-2 mb-2">
                  <div class="col-8">
                    <h6>Mohan Kumar &nbsp; &nbsp; 9098909090</h6>
                    <p>Full Address: dshfshdfskjdf klsdjfklsjad -844101 </p>
                  </div>
                  <div class="col-3">
                    <button class="btn btn-warning mb-2">Edit</button>
                    <button class="btn btn-danger mb-2">Delete</button>
                  </div>

                </div>
                
              </div>
            </div>
            
          </div>



          </div>
      </div>
    </section>

    <!--- footer   --->
    <section class="footer-box pb-3 mt-3">
      <div class="container">  
        
        <div class="row">
          <div class="col-md-8 p-2">
            <form>
              <div class="form-row align-items-center">
                <div class="col-auto my-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Select Your City</div>
                    </div>
                    <select class="form-control font-weight-bold" id="CitySelect" placeholder="Select City">
                      <option selected><strong>Select Your City </strong></option>
                      <option disabled><strong>India </strong></option>
                      <option>Patna </option>
                      <option>Delhi </option>
                      <option><strong>Muzaffarpur </strong></option>

                    </select>
                    
                  </div>
                </div>
                
                <div class="col-auto my-1">
                  <button type="submit" class="btn btn-primary">Search</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-4 p-2">
            <a class="btn float-right btn-warning text-dark font-weight-bold" href="https://professional.webscome.com"><u> Register As a Professionals </u></a>
          </div>
        </div>
        <div class="row border-top p-2 ">
          <div class="col-4 col-md-2">
            <a href="index.html"><img src="images/logo.png" class="footer-logo"></a>
          </div>
          <div class="col-8 col-md-3  pt-3">
            <p class=""> &copy; 2021-22 Webscome company</p>
          </div>
          <div class="col-12 col-md-3 pt-3">
            <p class=""> 
              <a href="#"><i class="fa fa-twitter"></i></a> &nbsp; 
              <a href="#"><i class="fa fa-facebook-square"></i></a> &nbsp; 
              <a href="#"><i class="fa fa-instagram"></i></a> &nbsp; 
              <a href="#"><i class="fa fa-youtube"></i></a> &nbsp; 
              <a href="#"><i class="fa fa-linkedin"></i></a> &nbsp; 
              <a href="#"><i class="fa fa-pinterest-p"></i></a> 
            </p>

          </div>
          <div class="col-6 col-md-2">
            <a href="#"><img src="images/google-playstore.png" class="footer-store"></a>
          </div>
          <div class="col-6 col-md-2">
            <a href="#"><img src="images/apple-store.png" class="footer-store"></a>
          </div>
          
          

        </div>

      </div>    
    </section>
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>