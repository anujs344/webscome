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
                       <th>Selected_Professional</th>
                       <th>Service</th>
                       <th>Payment Status</th>

                       <th>Order_time</th>
                       <th>Action</th>
                       <th>Invoice</th>
                       
                   </tr>
               </thead>
               <tbody>
                   @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                            <div class="d-flex align-items-center">
                                
                                <div class="ms-2">
                                    <h6 class="mb-1 font-14">{{ $order->user_name }}</h6>
                                </div>
                            </div>
                            </td>
                            <td>{{ $order->professional_name }}</td>
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

                            <td>{{ $order->created_at }}</td>
                            
                            
                            <td>
                                <form action="{{ route('cancelled_orders.delete',[$order->id]) }}" method="POST">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                    {{ Form::hidden('_method','DELETE') }}                                            
                                    
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                                </form>
                            </td>
                            
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="{{ route('order.invoice',[$order->id]) }}" class=""><i
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

