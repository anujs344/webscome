@extends('layouts.master')

@section('content')
<div class="card radius-10 mb-0">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h5 class="mb-1">Verified Professionals</h5>
            </div>

        </div>

       <div class="table-responsive mt-3">
           <table class="table align-middle mb-0">
               <thead class="table-light">
                   <tr>
                       <th>Professional ID</th>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Phone</th>
                       <th>Service</th>
                       <th>Experience</th>

                       <th>Address</th>
                       <th>City</th>
                       <th>Pincode</th>
                       <th>Verification_Status</th>
                       <th>Aadhar_card</th>
                       <th>other_document</th>
                       <th>Action(delete professional)</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($professionals as $professional)
                   @if ($professional->verification_status == '1')

                        <tr>
                            <td>{{ $professional->id }}</td>
                            <td>
                            <div class="d-flex align-items-center">

                                <div class="ms-2">
                                    <h6 class="mb-1 font-14">{{ $professional->name }}</h6>
                                </div>
                            </div>
                            </td>
                            <td>{{ $professional->email }}</td>
                            <td class="">{{ $professional->phone }}</td>
                            <td class="">{{ $professional->title2 }}</td>
                            <td class="">{{ $professional->experience }} year</td>

                            <td>{{ $professional->address }}</td>
                            <td>{{ $professional->city }}</td>
                            <td>{{ $professional->pincode }}</td>
                            <td>
                                <button type="submit" class="btn btn-primary">Verified</button>
                            </td>
                            <td>
                                <a href="{{asset('professional_images/aadhar_images/'.$professional->aadhar_card)}}" target="_blank">
                                    <img src="{{asset('professional_images/aadhar_images/'.$professional->aadhar_card)}}"  alt="no image" class="img-fluid rounded-10 shadow" style="height: 50px; width:50px; object-fit:cover" >
                                </a>
                            </td>

                            <td>
                                <a href="{{asset('professional_images/other_document/'.$professional->other_document)}}" target="_blank">

                                    <img src="{{asset('professional_images/other_document/'.$professional->other_document)}}" alt="no image" class="img-fluid rounded-10 shadow" style="height: 50px; width:50px; object-fit:cover" >
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <form action="{{ route('professional.delete',[$professional->id]) }}" method="POST">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                        {{ Form::hidden('_method','DELETE') }}                                            <input type="text" name="cat_id" value="10" hidden>
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endif
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
