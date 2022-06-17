@extends('layouts.master')


@section('content')
<div class="card radius-10 mb-0">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h5 class="mb-1">Career Applications</h5>
            </div>

        </div>

       <div class="table-responsive mt-3">
           <table class="table align-middle mb-0">
               <thead class="table-light">
                   <tr>
                       <th>ID</th>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Phone</th>
                       <th>Address</th>
                       <th>City</th>
                       <th>Pincode</th>
                       <th>Status</th>
                       <th>Download CV</th>
                       <th>Actions</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($applications as $application)
                        <tr>
                            <td>{{ $application->id }}</td>
                            <td>
                            <div class="d-flex align-items-center">

                                <div class="ms-2">
                                    <h6 class="mb-1 font-14">{{ $application->name }}</h6>
                                </div>
                            </div>
                            </td>
                            <td>{{ $application->email }}</td>
                            <td class="">{{ $application->phone }}</td>
                            <td>{{ $application->address }}</td>
                            <td>{{ $application->city }}</td>
                            <td>{{ $application->pin_code }}</td>
                            <td><span class="badge bg-light-success text-success w-100">Completed</span></td>
                            <td>
                                <form action="{{ route('career_applications.download',$application->id) }}" method="POST">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

                                    <button type="submit" class="btn btn-success">Download CV</button>
                                    </form>
                            </td>

                            <td>
                            <div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
                                <form action="{{ route('sendMail',$application->id) }}" method="POST">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

                                    <button type="submit" class="btn btn-primary">Send Mail</button>
                                    </form>
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

