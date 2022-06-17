@extends('layouts.master')


@section('content')
<div class="card radius-10 mb-0">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h5 class="mb-1">New Messages</h5>
            </div>
            
        </div>

       <div class="table-responsive mt-3">
           <table class="table align-middle mb-0">
               <thead class="table-light">
                   <tr>
                    <th>id</th>
                    <th> Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Message</th>
                    <th>Actions</th>
                       
                   </tr>
               </thead>
               <tbody>
                   @foreach ($requests as $request)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <h6 class="mb-0 font-14">{{ $request->id }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $request->name }}</td>
                            <td>
                                {{ $request->email }}
                                
                            </td>
                            <td>
                                {{$request->mobile}}
                            </td>
                            <td>{{ $request->message }}</td>
                            
                            
                            <td>
                                <form action="{{ route('contact_us.delete',[$request->id]) }}" method="POST">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                    {{ Form::hidden('_method','DELETE') }}                                            
                                    
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                                </form>
                                    
                            </td>
                        </tr>
                   @endforeach
                   
                   
               </tbody>
           </table>
       </div>
       
    </div>
</div>

@endsection



