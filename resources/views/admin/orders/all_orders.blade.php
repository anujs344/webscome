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
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Status</th>
                        <th>Professional Name</th>
                        <th>ADD SPARES</th>
                        <th>Total Payable(current time)</th>
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
                                <?php
                                $child_service_id= \App\Models\ChildCategory::where('title',$order->service)->value('id');
                                ?>
                                <a href="{{route('service.addspare',['order_id'=>$order->order_id,'service_id'=>$child_service_id])}}">
                                <button type="button" class="btn btn-warning">
                                    Add Spares

                                </button>
                                </a>

                            </td>
                            <td>
                                {{ $order->discounted_price }}
                            </td>

                            <td>
                                <span class="bg-light-success text-success mx-auto badge">{{$order->payment_mode}}</span>
                            </td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="{{ route('order.invoice',[$order->order_id]) }}" class=""><i
                                                class='lni lni-eye'></i></a>
{{--                                    <form action="{{ route('cancelled_orders.delete',[$order->id]) }}" method="POST">--}}
{{--                                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>--}}
{{--                                        {{ Form::hidden('_method','DELETE') }}--}}

{{--                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i>--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
                                </div>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $('#professional').on('change', function (e) {
            this.form.submit();
        });
    </script>
@endsection

