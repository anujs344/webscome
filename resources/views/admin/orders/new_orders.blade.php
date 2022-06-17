@extends('layouts.master')


@section('content')
    <div class="card radius-10 mb-0">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-1">New Orders</h5>
                </div>

            </div>

            <div class="table-responsive mt-3">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>Order_ID</th>
                        <th>User Name</th>
                        <th>Assigned professional</th>
                        <th>Order Status</th>
                        <th>Service</th>
                        <th>Payment Status</th>
                        <th>Order City</th>
                        <th>Order_time</th>
                        <th>Forward to Professional</th>
                        <th>Invoice</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="ms-2">
                                        <h6 class="mb-1 font-14">{{ $order->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($order->assigned_professional_id != null)
                                    <?php $pro = App\Models\Professional::find($order->assigned_professional_id) ?>
                                        <div style="background: black;width:auto;color:white;text-align: center;padding: 5px;border-radius: 999px">
                                            {{$pro->name}}
                                        </div>
                                @else
                                    <div style="background: slategray;width:auto;color:white;text-align: center;padding: 5px;border-radius: 999px">
                                        Not Assigned
                                    </div>
                                @endif
                            </td>
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

                            <td class="">{{ $order->service }}</td>

                            @if ($order->payment_status == '1')
                                <td>
                                    <span class="bg-light-success text-success mx-auto badge">Paid</span>
                                </td>
                            @else
                                <td>
                                    <span class="bg-light-success text-success mx-auto badge">COD</span>
                                </td>

                            @endif
                            <td>{{$order->order_city}}</td>

                            <td>{{ $order->created_at }}</td>
                            <td>
                                <?php
                                $parent_cat = App\Models\ChildCategory::where('id', $order->service_id)->value('category_id');
                                $professionals = App\Models\Professional::where('service_id', $parent_cat)
                                    ->where('city', $order->order_city)->get();
                                ?>

                                <form action="{{ route('change_order_professional',[$order->order_id,$order->service_id]) }}"
                                      method="POST">
                                    @csrf
                                    <select onchange="this.form.submit()"
                                            name="professional-{{$order->order_id}}-{{$order->service_id}}"
                                            class="form-select">
                                        @if($order->assigned_professional_id != null)
                                            <option value="{{$order->assigned_professional_id}}"
                                                    style="background: black;color: white" selected disabled>
                                                <?php $pro = App\Models\Professional::find($order->assigned_professional_id); ?>
                                                {{$pro->name}}
                                            </option>
                                        @else
                                            <option value="Assign To professional"
                                                    style="background: black;color: white" selected
                                                    disabled>Choose Professional to assign
                                            </option>
                                        @endif
                                    

                                        @foreach ($professionals as $professional)
                                            @if($order->assigned_professional_id!= null and $order->assigned_professional_id == $professional->id)
                                                @continue
                                            @endif
                                            <option value="{{ $professional->id }}">{{ $professional->name }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <!--<td><?php dump($professionals); ?></td>-->

                            <td>
                                <div class="d-flex order-actions">
                                    <a href="{{ route('order.invoice',[$order->order_id]) }}" class=""><i
                                                class='lni lni-eye'></i></a>

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

