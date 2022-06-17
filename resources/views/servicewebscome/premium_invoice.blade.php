<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>invoice-47</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 20px;
            background: #eee;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }

        .invoice {
            background: #fff;
            padding: 20px
        }

        .invoice-company {
            font-size: 20px
        }

        .invoice-logo {
            width: 10rem;
        }

        .invoice-logo img {
            max-width: 100%;
        }

        .invoice-header {
            margin: 0 -20px;
            background: #f0f3f4;
            padding: 20px
        }

        .invoice-date,
        .invoice-from,
        .invoice-to {
            display: table-cell;
            width: 1%
        }

        .invoice-from,
        .invoice-to {
            padding-right: 20px
        }

        .invoice-date .date,
        .invoice-from strong,
        .invoice-to strong {
            font-size: 16px;
            font-weight: 600
        }

        .invoice-date {
            text-align: right;
            padding-left: 20px
        }

        .invoice-price {
            background: #f0f3f4;
            display: table;
            width: 100%
        }

        .invoice-price .invoice-price-left,
        .invoice-price .invoice-price-right {
            display: table-cell;
            padding: 20px;
            font-size: 20px;
            font-weight: 600;
            width: 75%;
            position: relative;
            vertical-align: middle
        }

        .invoice-price .invoice-price-left .sub-price {
            display: table-cell;
            vertical-align: middle;
            padding: 0 20px
        }

        .invoice-price small {
            font-size: 12px;
            font-weight: 400;
            display: block
        }

        .invoice-price .invoice-price-row {
            display: table;
            float: left
        }

        .invoice-price .invoice-price-right {
            width: 25%;
            background: #2d353c;
            color: #fff;
            font-size: 28px;
            text-align: right;
            vertical-align: bottom;
            font-weight: 300
        }

        .invoice-price .invoice-price-right small {
            display: block;
            opacity: .6;
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 12px
        }

        .invoice-footer {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            font-size: 10px
        }

        .invoice-note {
            color: #999;
            margin-top: 80px;
            font-size: 85%
        }

        .invoice > div:not(.invoice-footer) {
            margin-bottom: 20px
        }

        .btn.btn-white,
        .btn.btn-white.disabled,
        .btn.btn-white.disabled:focus,
        .btn.btn-white.disabled:hover,
        .btn.btn-white[disabled],
        .btn.btn-white[disabled]:focus,
        .btn.btn-white[disabled]:hover {
            color: #2d353c;
            background: #fff;
            border-color: #d9dfe3;
        }
    </style>
</head>

<body class="bg-dark">
<div class="container ">
    <div class="col-md-12">
        <div class="invoice">
            <!-- begin invoice-company -->
            <div class="invoice-company text-inverse f-w-600">
                    <span class="pull-right hidden-print">

                        <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i
                                    class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                    </span>
                <div class="invoice-logo">
                    <a href="{{ route('webscome') }}"><img
                                src="<?php echo asset(''); ?>webscome_service_assets/images/logo.png"
                                alt="no image"></a>
                </div>

            </div>
            <!-- end invoice-company -->
            <!-- begin invoice-header -->
            <div class="invoice-header">
                <div class="invoice-from">
                    <address class="m-t-5 m-b-5">
                        <strong class="text-inverse text-capitalize">Webscome</strong><br>
                        Flat No. 302, 3rd Floor,<br> Radhey Shayam Apartment,<br> Beside Chapan Bhog Sweets,Gola
                        Road,<br> Patna-801503
                    </address>
                </div>
                <div class="invoice-to">
                    <strong><small>To</small></strong>
                    <address class="m-t-5 m-b-5">
                        <strong class="text-inverse text-capitalize">{{ $user_name }}</strong><br>
                        Email: {{ $user_email }}<br>

                    </address>
                </div>
                <div class="invoice-date">
                    <small>Invoice Date</small>
                    <div class="date text-inverse m-t-5">{{ Carbon\Carbon::now()->format('d-m-Y') }}</div>
                    <div class="invoice-detail">
                    </div>
                </div>
            </div>
            <!-- end invoice-header -->
            <!-- begin invoice-content -->
            <div class="invoice-content">
                <!-- begin table-responsive -->
                <div class="table-responsive">
                    <table class="table table-invoice">
                        <thead>
                        <tr>
                            <th class="text-left">PLAN</th>
                            <th class="text-left">Price</th>
                            <th class="text-left">Plan Opted Date</th>
                            <th class="text-left" width="5%">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Premium Service Plan</td>
                            <td>₹1999</td>
                            <td>{{$plan_date}}</td>
                            <td>₹1999</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
                <!-- begin invoice-price -->

                <!-- end invoice-price -->
            </div>
            <!-- end invoice-content -->
            <!-- begin invoice-note -->
            <div class="invoice-note">
                <p>
                    Terms & Conditions:
                </p>
                <ul>
                    <li>Returns Policy: At nalandabazaar we try to perfectly deliver each time. But in the off chance
                        that you
                        need to
                        return/Exchange the item, <br>please do so within return window with the original Brand
                        box/price
                        tag,
                        original packing, and
                        invoice without which <br>it will be difficult for us to act on your request. Please help us
                        in
                        helping
                        you. Terms and
                        conditions apply.
                    </li>
                    <li>The goods sold as are intended for end user consumption and not for re-sale.</li>
                </ul>
            </div>
            <!-- end invoice-note -->
            <!-- begin invoice-footer -->
            <div class="invoice-footer">
                <p class="text-center m-b-5 f-w-600">
                    THANK YOU FOR Order
                </p>
                <p class="text-center">
                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> https://webscome.com/</span>
                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone"></i> +91 </span>
                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> </span>
                </p>
            </div>
            <!-- end invoice-footer -->
        </div>
    </div>
</div>
</body>

</html>