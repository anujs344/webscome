@extends('layouts.master')

@section('content')
<div class="card radius-10 mb-0">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h5 class="mb-1">Professional Monthly Commission</h5>
            </div>
            
        </div>

       <div class="table-responsive mt-3">
           <table class="table align-middle mb-0">
               <thead class="table-light">
                   <tr>
                       <th>ID</th>
                       <th>Name</th>
                       <th>Service</th>
                       <th>Amount</th>

                       <th>Action</th>
                       
                   </tr>
               </thead>
               <tbody>
                   @foreach ($payments as $payment)
                   
                       
                        <tr>
                            <td>{{ $payment->professional_id }}</td>
                            <td>
                            <div class="d-flex align-items-center">
                                
                                <div class="ms-2">
                                    <h6 class="mb-1 font-14">{{ $payment->professional_name }}</h6>
                                </div>
                            </div>
                            </td>
                            <td>{{ $payment->service }}</td>
                            <td class="">{{ $payment->payment_amount }}</td>
                            
                        </tr>
                        <td>
                            <a href="#" class="btn-sm btn-danger">Pay</a>
                        </td>

                   @endforeach
                   
                   
               </tbody>
           </table>
       </div>
        
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Function to increase image size
    function enlargeImg(img) {
        img.style.transform = "scale(1.5)";
        img.style.transition =
          "transform 0.25s ease";
    }
</script>
@endsection
