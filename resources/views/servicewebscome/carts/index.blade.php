@extends('servicewebscome.layouts.master')

@section('content')
    <form action="{{route('carts.placeorder')}}" method="POST">
        @csrf
        <section class="pb-5 mt-2 mt-md-4">
            <div class="container">
                <div class="row" id="">
                    <div class="col-md-8 p-md-4 border border-secondary mb-2">
                        <div class="row border-bottom">
                            <div class="col-4 p-2 mb-3">
                                <h4 class="mb-sm-2">My Cart (
                                    <i class="fa" style="font-size:24px">&#xf07a;</i>
                                    <span class='badge badge-warning'
                                          id='lblCartCount'> {{ $cart_contents->count() }} </span> )
                                </h4>
                                <button class="btn btn-dark" style="margin: 7px">
                                    <a href="{{route('services')}}"
                                       style="color:white;padding: 3px;text-decoration: none">Add More Services</a>
                                </button>
                            </div>
                            <div class="col-8 p-2 mb-3">
                                <strong> Service Address:</strong><br>
                                <input type="text" required class="form-control" name="order_address"
                                       placeholder="Address on which service needs to be done"><br>
                                <input type="number" required name="order_pincode" placeholder="Pincode">
                            </div>
                        </div>
                        {{--                        <div class="bg-light rounded p-1 mr-md-5">--}}
                        <div class="form-row">
                            <div class="col-auto my-1">
                                <div class="font-weight-bold bg-light-cyne">
                                    <label style="color:black">Where do you need the Services</label>
                                </div>
                                <div class="input-group">
                                    <select class="form-control required font-weight-bold" name="order_city_name"
                                            id="order_city_name"
                                            placeholder="Select City" onchange="add_param()">
                                        <option disabled style="background: black;color:white"><strong>India </strong>
                                        </option>
                                        <?php $cities = \App\Models\City::all()?>
                                        @foreach($cities as $city)
                                            <option value="{{$city->city}}">{{$city->city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php
                            $regular_total=0;
                            $discounted_total=0;
                            $discount=0;
                        ?>
                        @foreach ($cart_contents as $cart_content)
                            <?php $regular_total+=($cart_content->regular_price * $cart_content->quantity) ?>
                            <?php $discounted_total+=($cart_content->discounted_price * $cart_content->quantity) ?>
                            <?php $discount+=(($cart_content->regular_price-$cart_content->discounted_price) * $cart_content->quantity) ?>
                            <div class="row p-2 border-bottom mb-2">
                                <div class="col-3 col-md-3">
                                    <img src="{{asset('childcategory_images/'.$cart_content->service_image)}}"
                                         class="w-100 img-thumbnail">
                                    <div class="col-sm-12 my-1">
                                        <div class="input-group">
                                            @if($cart_content->quantity > 1)
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-primary decrease_quantity"
                                                            id="{{$cart_content->id}}">-
                                                    </button>
                                                </div>
                                            @endif
                                            <input type="text" class="form-control" style="text-align: center"
                                                   name="quantity" disabled value="{{$cart_content->quantity}}"
                                                   id="quantity{{$cart_content->id}}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary increase_quantity"
                                                        id="{{$cart_content->id}}">+
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9 col-md-5">
                                    <h6><a class="cbl font-weight-bold"
                                           href="service-single-provider.html">{{ $cart_content->service }}</a></h6>
                                    <h6>
                                        Sub-price: <b> ₹{{ $cart_content->discounted_price }} </b>
                                        <s class="text-muted">
                                            ₹{{ $cart_content->regular_price }}
                                        </s>
                                        <font class="text-success">&nbsp;{{ (($cart_content->regular_price-$cart_content->discounted_price)/$cart_content->regular_price)*100 }}
                                            % Off</font>
                                    </h6>
                                    <h6>
                                        Service Price: <b> ₹{{ $cart_content->discounted_price * $cart_content->quantity }} </b>
                                        (for {{$cart_content->quantity}} quantity)
                                    </h6>

                                    <button type="submit" id="{{$cart_content->id}}"
                                            class="remove_service_btn btn btn-info">REMOVE
                                    </button>
                                </div>

                                <div class="col-12 col-md-4 pl-sm-2">
                                    <label for="service_date">Select Service Date</label>
                                    <input type="date" id="date" min="{{date('Y-m-d')}}" name="service_date[]" class="form-control shadow-none"
                                           placeholder="service date" required>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="col-md-4 border border-success mb-2 pt-1" id="divToReload_WithDAta">
                        <div class="col-md-12 border border-success mb-2 pt-1">
                            <h4 class="mb-sm-2 text-muted border-bottom p-2">PRICE DETAILS</h4>

                            <input type="hidden" name="cart_value" id="cart_value"
                                   value="{{ $discounted_total }}">
                            {{--          ***********************--}}
                            <br>
                            <h6>Price ({{ $cart_contents->count() }} Services) <span
                                        class="float-right"> ₹{{ $regular_total  }}</span></h6>
                            <br>
                            <h6>Discount <span
                                        class="float-right text-success">− ₹{{ $discount }}</span>
                            </h6>
                            <h6 hidden id="c_d">Coupon Discount (₹)<span
                                        class="float-right text-success" id="coupon_discount"></span>
                            </h6>
                            <input type="hidden" name="coupon_discount_applied" id="coupon_discount_applied">
                            <br>
                            <div id="coupon_form">
                                <div style="display: flex; flex-direction: column;margin-top: 5px">
                                    Have a Coupon ?
                                    <input type="text" oninput="this.value = this.value.toUpperCase()" name="coupon"
                                           id="coupon"
                                           style="text-decoration: none;outline: none;margin-top:5px">
                                    <button class="btn btn-primary round" style="margin-top: 1px"
                                            id="apply_coupon">Apply
                                    </button>
                                    <input type="hidden" name="is_coupon_applied" id="is_coupon_applied" value="false">
                                    <div class="alert alert-primary" id="coupon_success" hidden role="alert">

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h6><strong>Total Amount (₹) <span
                                            class="float-right" name="total_order_value"
                                            id="total_order_value">{{ $discounted_total }}</span></strong>
                            </h6>
                            <input type="hidden" id="final_payment_value" name="final_payment_value"
                                   value="{{ $discounted_total }}">
                            <hr>
                            <p class="text-success"></p>
                        </div>
                        <div class="col-md-12  border border-success mb-2 pt-2">
                            <button type="button" class="btn btn-info" style="width: 100%;margin-bottom: 10px">PAY WITH
                            </button>
                            <h5 class="font-weight-bold"><input type="radio" name="pay" value="cod" checked="checked">
                                Cash on Delivery</h5>
                            <p class="text-muted ml-2">You have to pay 5% more of cart amount for COD.</p>

                            <h5 class="font-weight-bold"><input type="radio" name="pay" value="razorpay"> RozorPay</h5>
                            <div class="row pt-3">
                                <div class="col-lg-12 p-2">
                                    <button type="submit" class="btn btn-block btn-success"><strong>PLACE ORDER</strong>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#apply_coupon").click(function (e) {
                e.preventDefault();
                var coupon = $("#coupon").val();
                var order_val = $("#cart_value").val();


                $.ajax({
                    type: 'POST',
                    url: "{{route('applycoupon')}}",
                    data: {coupon: coupon, order_val: order_val, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        if (data.error) {
                            $("#coupon_success").attr("hidden", false);
                            $("#coupon_success").html(data.error);
                            $("#coupon").val('');
                        } else if (data.discount) {
                            $("#coupon_success").attr("hidden", false);
                            $("#coupon_success").html("COUPON APPLIED SUCCESSFULLY !!");
                            $("#coupon").attr("readonly", true);
                            $("#c_d").attr("hidden", false);
                            $("#coupon_discount").text(data.discount);
                            $("#coupon_discount_applied").val(data.discount);

                            $("#is_coupon_applied").val("true");

                            $("#total_order_value").text(Math.round($("#total_order_value").text() - data.discount));
                            $("#final_payment_value").val(Math.round($("#final_payment_value").val() - data.discount));
                        }
                    }

                })
            });

            $(".remove_service_btn").click(function (e) {
                e.preventDefault();
                var id = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: "{{route('cart.remove')}}",
                    data: {id: id, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        location.reload();
                    }

                })
            });

            $(".increase_quantity").click(function (e) {
                e.preventDefault();
                var id = $(this).attr('id');
                var quantity = $("#quantity"+id).val();
                $.ajax({
                    type: 'POST',
                    url: "{{route('cart.cart_quantity_increment')}}",
                    data: {id: id, quantity: quantity, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        location.reload();
                    }
                })
            });

            $(".decrease_quantity").click(function (e) {
                e.preventDefault();
                var id = $(this).attr('id');
                var quantity = $("#quantity"+id).val();
                $.ajax({
                    type: 'POST',
                    url: "{{route('cart.cart_quantity_decrement')}}",
                    data: {id: id, quantity: quantity, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        location.reload();
                    }
                })
            });

        });
    </script>
@endsection
