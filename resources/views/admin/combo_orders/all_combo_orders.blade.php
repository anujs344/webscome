@extends('layouts.master')
@section('content')
    <div class="card radius-10 mb-0">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-1">All Orders</h5>
                </div>
            </div>

            <div class="table-responsive mt-3">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>Combo_Service_ID</th>
                        <th>User Id</th>
                        <th>Status</th>
                        <th>Razorpay PaymentId</th>
                        <th>Razorpay OrderId</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($combo_service_orders as $order)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <h6 class="mb-0 font-14">{{ $order->combo_service_id }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $order->user_id }}</td>
                            <td>

                                @if($order->payment_done==1)
                                    <div>
                                    <span class="badge rounded-pill text-primary bg-light-primary p-2 ms-2 text-uppercase px-3"><i
                                                class='bx bxs-circle me-1'></i> Payment Completed
                                    </span>
                                    </div>
                                @else
                                    <div>
                                    <span class="badge rounded-pill text-primary bg-light-primary p-2 ms-2 text-uppercase px-3"><i
                                                class='bx bxs-circle me-1'></i> Payment Not Done
                                    </span>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $order->razorpay_payment_id }}</td>
                            <td>{{ $order->razorpay_order_id }}</td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection