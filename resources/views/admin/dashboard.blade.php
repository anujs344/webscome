@extends('layouts.master')

@section('title')
    Webscome
@endsection


@section('content')

    <?php
    $orders = App\Models\Order::join('service_orders', 'orders.id', '=', 'service_orders.order_id')
        ->join('child_categories', 'service_orders.service_id', '=', 'child_categories.id')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->get(['orders.*', 'service_orders.*',
            'child_categories.title AS service',
            'child_categories.image AS service_image', 'child_categories.regular_price AS regular_price',
            'child_categories.discounted_price AS discounted_price', 'users.*', 'users.name as user_name']);

    $orders = $orders->reverse();
    ?>

    <div class="py-12">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 overflow-hidden bg-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Total Registered Users</p>
                                <h5 class="mb-0 text-white"> {{ App\Models\User::all()->count() }}</h5>
                            </div>
                            <div class="ms-auto text-white"><i class='bx bx-cart font-30'></i>
                            </div>
                        </div>
                    </div>
                    <div class="" id="chart1"></div>
                </div>


            </div>

            <div class="col">
                <div class="card radius-10 overflow-hidden bg-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Total Professionals</p>
                                <h5 class="mb-0 text-white">{{ App\Models\Professional::all()->count() }}</h5>
                            </div>
                            <div class="ms-auto text-white"><i class='bx bx-wallet font-30'></i>
                            </div>
                        </div>
                    </div>
                    <div class="" id="chart2"></div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 overflow-hidden bg-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-dark">Total Orders</p>
                                <h5 class="mb-0 text-dark">{{ App\Models\Order::all()->count() }}</h5>
                            </div>
                            <div class="ms-auto text-dark"><i class='bx bx-group font-30'></i>
                            </div>
                        </div>
                    </div>
                    <div class="" id="chart3"></div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 overflow-hidden bg-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Total Services</p>
                                <h5 class="mb-0 text-white">{{ App\Models\Category::all()->count() }}</h5>
                            </div>
                            <div class="ms-auto text-white"><i class='bx bx-chat font-30'></i>
                            </div>
                        </div>
                    </div>
                    <div class="" id="chart4"></div>
                </div>
            </div>


        </div><!--end row-->

        <div class="row">
            <div class="col">
                <div class="card radius-10 mb-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-1">Recent Orders</h5>
                            </div>
                            <div class="ms-auto">
                                <a href="{{ route('admin.all_orders') }}" class="btn btn-primary btn-sm radius-30">View
                                    All Orders</a>
                            </div>
                        </div>


                        <div class="table-responsive mt-3">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Professional Name</th>
                                    <th>Total Payable</th>
                                    <th>Applied Promo</th>
                                    <th>Payment Mode</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="ms-2">
                                                    <h6 class="mb-0 font-14">{{ $order->order_id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $order->service }}</td>
                                        <td>{{$order->service_quantity}}</td>
                                        <td>


                                            @if($order->service_order_status=='1'&& $order->assigned_professional_id !=null)
                                                <div>
                                    <span class="badge rounded-pill text-primary bg-light-primary p-2 ms-2 text-uppercase px-3"><i
                                                class='bx bxs-circle me-1'></i> Forwarded to professional
                                    </span>
                                                </div>
                                            @elseif($order->service_order_status=='1'&& $order->assigned_professional_id ==null)
                                                <div>
                                    <span class="badge rounded-pill text-primary bg-light-primary p-2 ms-2 text-uppercase px-3"><i
                                                class='bx bxs-circle me-1'></i> New order
                                    </span>
                                                </div>
                                            @elseif ($order->service_order_status=='2')
                                                <div>
                                    <span class="badge rounded-pill text-success bg-light-success p-2 ms-2 text-uppercase px-3"><i
                                                class='bx bxs-circle me-1'></i> Accepted by professional</span>
                                                </div>
                                            @elseif ($order->service_order_status=='3')
                                                <div>
                                    <span class="badge rounded-pill text-black bg-warning  p-2 ms-2 text-uppercase px-3"><i
                                                class='bx bxs-circle me-1'></i> Rejected by Professional</span>
                                                </div>
                                            @elseif ($order->service_order_status=='4')
                                                <div>
                                    <span class="badge rounded-pill text-white bg-primary p-2 ms-2 text-uppercase px-3"><i
                                                class='bx bxs-circle me-1'></i> Completed</span>
                                                </div>
                                            @elseif ($order->service_order_status=='5')
                                                <div>
                                    <span class="badge rounded-pill text-danger bg-light-danger p-2 ms-2 text-uppercase px-3"><i
                                                class='bx bxs-circle me-1'></i> Cancelled</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->assigned_professional_id != null)
                                                <?php $pro = App\Models\Professional::find($order->assigned_professional_id) ?>
                                                <div style="background: black;width:auto;color:white;text-align: center;padding: 5px;border-radius: 999px">
                                                    {{$pro->name}}
                                                </div>
                                            @else
                                                <div style="background: slategray;width:auto;color:white;text-align: center;padding: 5px;border-radius: 999px">
                                                    Not Yet Assigned
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <small>{{$order->discounted_price}} * {{$order->service_quantity}} = </small>
                                            <strong>{{ $order->discounted_price * $order->service_quantity }}</strong>
                                        </td>
                                        <td style="color: #0bb2d3"><strong>{{$order->applied_promo_code==null ? null : $order->applied_promo_code}}</strong></td>
                                        <td>
                                            <span class="bg-light-success text-success mx-auto badge">{{$order->payment_mode}}</span>
                                        </td>
                                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="{{ route('order.invoice',[$order->order_id]) }}" class=""><i
                                                            class='lni lni-eye'></i></a>
{{--                                                <form action="{{ route('cancelled_orders.delete',[$order->id]) }}"--}}
{{--                                                      method="POST">--}}
{{--                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>--}}
{{--                                                    {{ Form::hidden('_method','DELETE') }}--}}

{{--                                                    <button type="submit" class="btn btn-sm btn-danger"><i--}}
{{--                                                                class="bx bx-trash"></i>--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
    </div>







@endsection

@section('scripts')

@endsection
