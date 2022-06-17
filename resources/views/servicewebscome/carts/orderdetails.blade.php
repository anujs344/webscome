@extends('servicewebscome.layouts.master')
@section('content')
    <section class="pb-5 mt-2 mt-md-4">
        <div class="container">
            <h3 style="text-align: center;font-family: cursive">Your Orders</h3>
            <div class="row" style="margin-top: 1rem">
                {{--                <div class="col-lg-12 p-4 border border-secondary  mb-2">--}}
                {{--                    <h5>Service Address</h5>--}}
                {{--                    <p>{{ Auth::user()->name }}</p>--}}

                {{--                    <h6>{{ $orders[0]->order_address }} - {{  $orders[0]->order_pincode }}, {{  $orders[0]->order_city }}</h6>--}}
                {{--                    <h6><strong>Phone number: </strong>{{ Auth::user()->phone }}</h6>--}}
                {{--                </div>--}}
                
                
                <?php
                $premium= \App\Models\ComboService::where('user_id',auth()->user()->id)
                ->where('payment_id','!=',null)->where('payment_status','=',1)
                ->first();
                ?>
                @if($premium)
                    <div class="col-lg-12 p-md-4 p-2 border border-info mb-2" style="background: lightgray">
                        <div class="row p-2">
                            <div class="col-3 col-md-4">
                                <h6 style="font-weight: bold">Premium Plan</h6>
                            </div>
                            <div class="col-3 col-md-4">
                                <label for="price">Premium Plan Price</label>
                                <h6 style="font-weight: bold">₹1999</h6>
                            </div>
                            <div class="col-3 col-md-4">
                                <a href="{{route('combo_service_invoice',['user_id'=>auth()->user()->id])}}"><button class="btn btn-primary">See Invoice</button></a>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach ($orders as $order)
                    <div class="col-lg-12 p-md-4 p-2  border border-info mb-2">
                        <div class="row p-2">
                            <div class="col-3 col-md-2">
                                <img src="{{asset('childcategory_images/'.$order->service_image)}}"
                                     class="w-100 img-thumbnail">
                            </div>
                            <div class="col-8 col-md-3">
                                <h6><a class="cbl font-weight-bold" style="color: blue">{{ $order->service }}</a></h6>
                                <h5>Service Price: <b> ₹{{ $order->discounted_price }} </b></h5>
                                <h6>Service Quantity:<b> ({{ $order->service_quantity }}) </b></h6>
                                <h6>Total Payable :<b> ₹{{ $order->service_quantity* $order->discounted_price }} </b>
                                </h6>

                            </div>
                            <div class="col-12 col-md-4">
                                <hr class="d-block d-md-none d-lg-none">
                                @if($order->service_order_status=='1')
                                    <h5>Service Status: <span class="text-success">Order Placed</span></h5>

                                @elseif ($order->service_order_status=='2')
                                    <h5>Service Status: <span class="text-success">Order Accepted by professional</span>
                                    </h5>

                                @elseif ($order->service_order_status=='3')
                                    <h5>Service Status: <span class="text-success">Order Rejected by professional</span>
                                    </h5>

                                @elseif ($order->service_order_status=='4')
                                    <h5>Service Status: <span class="text-success">Order Completed</span></h5>

                                @elseif ($order->service_order_status=='5')
                                    <h5>Service Status: <span class="text-success">Order Cancelled</span></h5>

                                @endif

                                @if($order->applied_promo_code != null)
                                    <h6>Applied Promo: <span
                                                class="text-info">{{$order->applied_promo_code}}</span></h6>
                                @endif
                                <h5>Payment Mode: <span class="text-info">{{($order->payment_mode)}}</span></h5>
                                <h6>Service Date opted:
                                    <span class="text-info">{{date('d-m-Y', strtotime($order->serviced_date))}}
                                    </span>
                                </h6>
                                @if($order->service_order_status=='1' || $order->service_order_status=='2')
                                    <label for="service_date" style="margin-top: 10px">Change Service Date</label>
                                    <form action="{{route('changeorderdate')}}" method="POST">
                                        @csrf
                                    <input type="date" min="{{date('Y-m-d')}}" onchange="this.form.submit()" id="date" value="{{$order->serviced_date}}" name="service_date"
                                           class="form-control shadow-none"
                                           placeholder="service date" required>
                                        <input type="text" hidden name="order_id" value="{{$order->order_id}}">
                                        <input type="text" hidden name="service_id" value="{{$order->service_id}}">
                                    </form>
                                @endif


                                {{--                                //feedback for completed order--}}
                                @if($order->service_order_status == '4')
                                    <label for="" style="font-size: 20px;margin-top: 15px">
                                        <img src="https://cdn-icons-png.flaticon.com/512/813/813419.png"
                                             style="height: 20px;width: 20px;margin-right: 3px">
                                        Service Feedback
                                    </label>
                                    <div class="row p-0">
                                        <?php
                                        $is_shared_feedback = App\Models\ServiceFeedback::where('order_id', $order->order_id)
                                            ->where('service_id', $order->service_id)->get()->toArray();
                                        ?>
                                        @if(count($is_shared_feedback) != 0)
                                            <div class="p-3 mb-2 bg-warning text-white" style="font-weight: bold">
                                                Feedback Shared
                                            </div>
                                        @else
                                            <form action="{{route('sharefeedback')}}" method="post">
                                                @csrf
                                                <textarea
                                                        placeholder="Please share your feedback on the service done"
                                                        cols="60"
                                                        rows="6" name="feedback"></textarea>
                                                <input type="text" name="order_id" value="{{$order->order_id}}"
                                                       hidden>
                                                <input type="text" name="service_id" value="{{$order->service_id}}"
                                                       hidden>
                                                <input type="text" name="professional_id"
                                                       value="{{$order->assigned_professional_id}}" hidden>
                                                <button class="btn btn-primary p-2 mt-1" type="submit">Share
                                                    Feedback
                                                </button>
                                            </form>
                                        @endif
                                        @endif
                                        <a href="{{route('user_order.invoice',[$order->order_id])}}">
                                                <button class="btn btn-info">INVOICE</button>
                                            </a>
                                    </div>
                                    <div>

                                    </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

@endsection

<script>
    $(document).ready(function (){
        $("#date").change(function (){
            alert(1);
        });
    });
</script>
