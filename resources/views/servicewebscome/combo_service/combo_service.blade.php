<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset(''); ?>webscome_service_assets/css/main.css">
    <script src="https://kit.fontawesome.com/d177a7678c.js" crossorigin="anonymous"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        .wrapper {
            max-width: 1090px;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            margin: auto;
            justify-content: space-between;
        }

        .wrapper .table {
            background: #fff;
            width: calc(33% - 20px);
            padding: 30px 30px;
            position: relative;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 1020px) {
            .wrapper .table {
                width: calc(50% - 20px);
                margin-bottom: 40px;
            }
        }

        @media (max-width: 698px) {
            .wrapper .table {
                width: 100%;
            }
        }

        .table .price-section {
            display: flex;
            justify-content: center;
        }

        .price-section .price-area {
            height: 120px;
            width: 120px;
            background: #ffd861;
            border-radius: 50%;
            padding: 2px;
        }

        .price-section .price-area .inner-area {
            height: 100%;
            width: 100%;
            border-radius: 50%;
            border: 3px solid #fff;
            color: #fff;
            line-height: 117px;
            text-align: center;
            position: relative;
        }

        .price-area .inner-area .text {
            font-size: 25px;
            font-weight: 400;
            position: absolute;
            top: -10px;
            left: 17px;
        }

        .price-area .inner-area .price {
            font-size: 40px;
            font-weight: 400;
        }

        .table .package-name {
            width: 100%;
            height: 2px;
            background: #ffecb3;
            margin: 35px 0;
            position: relative;
        }

        .table .package-name::before {
            position: absolute;
            content: "Basic";
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            font-size: 25px;
            padding: 0 10px;
            font-weight: bolder;
        }

        .table .features li {
            list-style: none;
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .features li .list-name {
            font-size: 17px;
            font-weight: 400;
        }

        .features li .icon {
            font-size: 15px;
        }

        .features li .icon.check {
            color: #2db94d;
        }

        .features li .icon.cross {
            color: #cd3241;
        }

        .table .btn {
            display: flex;
            justify-content: center;
            margin-top: 35px;
        }

        .table .btn button {
            width: 80%;
            height: 50px;
            font-weight: 700;
            color: #fff;
            font-size: 20px;
            border: none;
            outline: none;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .Premium .price-area,
        .Premium .inner-area {
            background: #a26bfa;
        }

        .Premium .btn button {
            background: #fff;
            color: #a26bfa;
            border: 2px solid #a26bfa;
        }

        .Premium .btn button:hover {
            border-radius: 6px;
            background: #a26bfa;
            color: #fff;
        }


        .Premium .package-name {
            background: #a26bfa;
        }

        .Premium .package-name::before {
            content: "Premium";
        }

        .Premium ::selection,
        .Premium .price-area,
        .Premium .inner-area {
            background: #a26bfa;
        }


    </style>
    <script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
$services=App\Models\Category::all();
?>
<!--- Menu   --->
<section class="nav-color">
    <nav class="navbar navbar-expand-lg container ">
        <a class="navbar-brand" href=""><img src="{{asset('webscome_service_assets/images/logo.png')}}" class="menu-logo"></a>
        <button class="navbar-toggler btn btn-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>


        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item menu-item active">
                    <a class="nav-link" href="{{ route('webscome') }}"> Home </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Services
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($services as $service)
                            <a class="dropdown-item" href="{{ route('single_service',[$service->id]) }}">{{ $service->title }}</a>

                        @endforeach

                    </div>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <a href="{{ url('/redirects') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a><br>
                                <a href="{{ route('carts.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">My Cart
                                    {{--                    <i class="fa" style="font-size:24px">&#xf07a;</i>--}}
                                    {{--                    <span class='badge badge-warning' id='lblCartCount'> {{ auth()->user() ? $cart_contents->count() : '' }} </span>--}}
                                </a><br>
                                <a href="{{ route('carts.orderdetails') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">My Orders</a>

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class='text-sm text-gray-700 dark:text-gray-500 underline'></i><span>Logout</span></button>
                                </form>

                            </div>
                        </li>
                    @else
                        <li class="nav-item menu-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user-lock"></i> Login/ <i class="fa fa-sign-in-alt"></i> SignUp </a>
                        </li>
                    @endauth
                @endif

            </ul>

        </div>
    </nav>

</section>

@include('layouts.messages')
<form action="{{route('combo_service.make_payment')}}" method="POST">
    @csrf
    <div class="container" style="background: white; padding: 50px">

        <div class="table Premium">
            <div class="price-section">
                <div class="price-area">
                    <div class="inner-area">
                       <span class="text">
                       </span>
                        <span class="price"> &#8377;1999</span>
                    </div>
                </div>
            </div>
            <div class="package-name">

            </div>
            <div class="features">
                <li>
                    <span class="list-name">Tenure of 365 days</span>
                    <span class="icon check"><i class="fas fa-check-circle"></i></span>
                </li>
                <li>
                    <span class="list-name">All Categories Included</span>
                    <span class="icon check"><i class="fas fa-check-circle"></i></span>
                </li>
                <li>
                    <span class="list-name">Top-Most priority for your service</span>
                    <span class="icon check"><i class="fas fa-check-circle"></i></span>
                </li>
                <li>
                    <span class="list-name">Hassle-free service</span>
                    <span class="icon check"><i class="fas fa-check-circle"></i></span>
                </li>
                <li>
                    <span class="list-name">Customer care Support</span>
                    <span class="icon check"><i class="fas fa-check-circle"></i></span>
                </li>

                <div class="btn">
                    <button type="submit">Purchase</button>
                </div>
            </div>
        </div>
    </div>
</form>


{{--footer--}}
<section class="footer-box pb-3 mt-3">
    <div class="container">

        <div class="row">
            <div class="col-md-8 p-2">
            </div>
            <div class="col-md-4 p-2">
                <a class="btn float-right btn-warning text-dark font-weight-bold" href="{{ route('proWebscome') }}"><u> Register As a Professionals </u></a>
            </div>
        </div>
        <div class="row border-top p-2 ">
            <div class="col-4 col-md-2">
                <a href="index.html"><img src="<?php echo asset(''); ?>webscome_service_assets/images/logo.png" class="footer-logo"></a>
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
                <a href="#"><img src="<?php echo asset(''); ?>webscome_service_assets/images/google-playstore.png" class="footer-store"></a>
            </div>
            <div class="col-6 col-md-2">
                <a href="#"><img src="<?php echo asset(''); ?>webscome_service_assets/images/apple-store.png" class="footer-store"></a>
            </div>



        </div>

    </div>
</section>
</body>
</html>