@extends('professional_webscome.layouts.master')

@section('menu')
    <section class="nav-color">
        <nav class="navbar navbar-expand-lg container ">
            <a class="navbar-brand" href="{{ route('proWebscome') }}"><img
                        src="<?php echo asset(''); ?>webscome_professional_assets/images/logo.png"
                        class="menu-logo"></a>
            <button class="navbar-toggler btn btn-dark" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="fa fa-bars "></i>
            </button>


            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item menu-item active">
                        <a class="nav-link" href="{{ route('proWebscome') }}"> Home </a>
                    </li>


                    @if (Route::currentRouteName()=='loginVerification'||Route::currentRouteName()=='professional.service_order'||Route::currentRouteName()=='professional.dashboard')

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                                <!--<form action="{{ route('proWebscome') }}" method="GET">-->

                                <!--    <button type="submit" class="dropdown-item"><i-->
                                <!--                class='text-sm text-gray-700 dark:text-gray-500 underline'></i><span>Logout</span>-->
                                <!--    </button>-->
                                <!--</form>-->
                            </div>
                        </li>
                    @else
                        <li class="nav-item menu-item">
                            <a class="nav-link" href="{{ route('professional.login') }}"><i class="fa fa-user-lock"></i>
                                Login/ <i class="fa fa-sign-in-alt"></i> SignUp </a>
                        </li>

                    @endif

                </ul>

            </div>
        </nav>

    </section>
@endsection

@section('content')
    <!--- Banner   --->
    <section class="">
        <div class="banner">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo asset(''); ?>webscome_professional_assets/images/banner/banner1.png"
                             class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo asset(''); ?>webscome_professional_assets/images/banner/banner2.png"
                             class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo asset(''); ?>webscome_professional_assets/images/banner/banner3.png"
                             class="d-block w-100" alt="...">
                    </div>

                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>



    <!--- Register   --->
    <section class=" bg-primary text-light">

        <div class="container p-md-4">
            <div class="row ">

                <div class="col-lg-12 mb-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="font-weight-bold">Start earning straight away. Share your details and we’ll rich
                                out with next steps.</h3>

                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-12 p-2 d-flex justify-content-left">
                            <form class="form-inline">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="name" class="sr-only">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name">
                                </div>
                                <div class="input-group mx-sm-3 form-group mb-2">
                                    <div class="input-group-prepend">
                                        <select class="form-control font-weight-bold" id="CitySelect"
                                                placeholder="Select City">
                                            <option selected><strong>+91 </strong></option>
                                            <option><strong>+92 </strong></option>
                                            <option>+93</option>
                                            <option>+94</option>
                                            <option>+95</option>
                                        </select>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Mobile no">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="text" id="email" class="form-control" placeholder="email@example.com">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="whatdo" class="sr-only">What do you do?</label>
                                    <input type="text" class="form-control" id="whatdo" placeholder="What do you do?">
                                </div>
                                <button type="submit" class="btn btn-light mb-2">Get in touch</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!--- Saperators   --->
    <section class="p-2" style="background: #ECEDEE;">
        <div class="container-fluid"></div>
    </section>


    <section class="mb-md-4 pb-md-3">
        <div class="container about-join-bg text-center pt-4 pb-5 mt-5">
            <div class="row mb-2">
                <div class="col-md-12 text-center">
                    <h4>Join Webscome Company to change your life</h4>
                    <p class="text-muted">Webscome company has app based marketplace that empowers professionals like
                        you to become your own boss.</p>
                </div>
                <div class="col-lg-4 col-6 p-3 text-center">
                    <h1 class="text-success glow-green">50,000+</h1>
                    <p>Partners already on board</p>
                </div>
                <div class="col-lg-4 col-6 p-3 text-center">
                    <h1 class="text-success glow-green">$1,000M</h1>
                    <p>Paid out to partners in 2020</p>
                </div>
                <div class="col-lg-4 col-6 p-3 text-center">
                    <h1 class="text-success glow-green">75,000+</h1>
                    <p>Services delivered each month</p>
                </div>
            </div>
            <div class="row box-webscome pt-2 pb-2" id="register_as_professional">
                <div class="col-md-12">
                    <h2>Wondering who can join ?</h2>
                    <p class="text-muted">If you have 1 year experience in any of these field, you can join Webscome
                        company.</p>
                </div>

                @foreach($categories as $category)
                    <div class="col-md-1"></div>
                    <div class="col-md-3 col-4 text-center">
                        <div class="bg-primary rounded-circle p-4" style="width: 100px; height: 100px; margin: auto;">
                            <img src="{{asset('category_images/'.$category->image)}}" class="img-fit-w">
                        </div>

                        <h6>{{$category->title}}</h6>
                        <p class="mt-2">
                            <!-- Button trigger modal -->
                            <a href="" class="btn btn-primary" data-toggle="modal"
                               data-target="#exampleModal{{$category->id}}"> Register</a>
                        </p>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  border border-warning">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$category->title}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!---  Service include  --->
                                        <div class="container p-3 mb-2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <form action="{{route('professional.signup_success')}}"
                                                          method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <input type="text" class="form-control mb-2"
                                                               placeholder="Enter Full Name" name="name" onfocus="true"
                                                               maxlength="" required>
                                                        <input type="email" class="form-control mb-2"
                                                               placeholder="Enter Email" name="email" maxlength=""
                                                               required>
                                                        <input type="text" class="form-control mb-2"
                                                               placeholder="Enter Phone" name="phone" maxlength=""
                                                               required>
                                                        <input type="hidden" value="{{$category->id}}" name="service">
                                                        <select class="form-control mb-2" name="sub_service" required>
                                                            @foreach($category->sub_categories as $sub_category)
                                                                <option value="{{$sub_category->title}}">{{$sub_category->title}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="number" class="form-control mb-2"
                                                               placeholder="Experience years" name="experience"
                                                               maxlength="" required>
                                                        <hr>
                                                        <label class="text-left float-left">Address:</label>
                                                        <input type="text" class="form-control mb-2"
                                                               placeholder="Line 1*" name="line1" onfocus="true"
                                                               maxlength="" required>
                                                        <input type="text" class="form-control mb-2"
                                                               placeholder="Line 2" name="line2" onfocus="true"
                                                               maxlength="" required>
                                                        <?php $cities = App\Models\City::all(); ?>
                                                        <label class="text-left float-left" style="margin-top: 1rem">Select service City:</label>
                                                        <select name="city" class="form-control mb-2">
                                                            @foreach($cities as $city)
                                                                <option value="{{$city->city}}">{{$city->city}}</option>
                                                            @endforeach
                                                        </select>

                                                        <input type="text" class="form-control mb-2"
                                                               placeholder="Pincode" name="pincode" onfocus="true"
                                                               maxlength="" required>

                                                        <hr class="border border-warning">

                                                        <input type="password" class="form-control  mb-2"
                                                               placeholder="Enter Password" name="password" maxlength=""
                                                               required>
                                                        <hr class="border border-warning">

                                                        <label class="text-left float-left">Aadhar:</label>
                                                        <input type="file" class="form-control  mb-2"
                                                               placeholder="Upload Aadhar" name="aadhar_image"
                                                               maxlength="" required>

                                                        <label class="text-left float-left">Other Document:</label>
                                                        <input type="file" class="form-control  mb-2"
                                                               placeholder="Upload Aadhar" name="other_document"
                                                               maxlength="" required>
                                                        <button type="submit" name=""
                                                                class="btn btn-info btn-block float-right">Create
                                                            Account
                                                        </button>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <a href="login.html"><p>Already have an account? <big
                                                                        class="text-success"> Login. </big></p></a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>


    <section class="mt-2 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-5 pl-md-3 pr-md-3 mb-3">
                    <h4 class="font-weight-bold">Enter Your Quary</h4>
                    <form>

                        <input type="text" id="email" class="form-control mb-2" placeholder="Enter Email">
                        <textarea class="form-control mb-2" placeholder="Message"></textarea>
                        <button class="btn btn-block btn-primary">Send Message</button>
                    </form>
                    <hr class="d-block d-md-none d-lg-none">
                </div>
                <div class="col-md-3 border-right d-flex justify-content-center pt-lg-5 mt-lg-4 mb-3">
                    <i class="fa fa-facebook-square fa-2x text-primary"></i> &nbsp; &nbsp;
                    <i class="fa fa-twitter fa-2x text-primary"></i> &nbsp; &nbsp;
                    <i class="fa fa-instagram fa-2x text-primary"></i>


                </div>
                <div class="col-md-4 text-center p-2 mb-3 mt-lg-3">
                    <hr class="d-block d-md-none d-lg-none">
                    <p><i class="fa fa-building fa-3x text-primary"></i></p>
                    <p>DJ Block, Salt Lake, Kolkata<br> West Bengal, Pin-700236</p>
                    <hr class="d-block d-md-none d-lg-none">
                </div>

            </div>
        </div>
    </section>

@endsection
