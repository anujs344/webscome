@extends('layouts.master')


@section('content')

<div class="card-header border-0 pt-3 bg-transparent d-flex">
    <h3>{{ $career->title }}</h3>
    <span class="ms-auto"><a href="/careers" class="btn btn-secondary btn-sm"><i class="bx bx-left-arrow"></i>back</a></span>
</div>

    <div class="btn-group float-end">
        <form action="{{ route('careers.destroy',[$career->id]) }}" method="POST" class="">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            {{ Form::hidden('_method','DELETE') }}
            <input type="text" name="cat_id" value="10" hidden>
            <button type="submit" class="btn btn-sm btn-danger float-end ">Delete</button>
        </form>
        <a href="/careers/{{ $career->id }}/edit"  data-bs-toggle="modal" data-bs-target="#" class="btn btn-info btn-sm ">Edit</a>
    </div>

    <div class="mb-3">
        <img src="{{asset('career_images/'.$career->image)}}" alt="no image" class="img-fluid rounded-10 shadow" style="height: 200px; width:200px; object-fit:cover" >
    </div>

   <small>Created at- {{ $career->created_at }}</small>
   <div>
   <hr>
       <b>Description-</b>
       {!! $career->description !!}
   </div>

   <div>
    <hr>
        <b>Eligibility Criteria-</b>
        {!! $career->eligibility !!}
    </div>

    <div>
        <hr>
            <b>Responsibilities-</b>
            {!! $career->responsibilities !!}
    </div>

    <div>
        <hr>
            <b>Deadline-</b>
            {!! $career->deadline !!}
    </div>

    <div>
        <br/>
            <b>Location-</b>
            {!! $career->location !!}
    </div>

    <div>
        <br/>
            <b>Salary-</b>
            {{ $career->salary }}
    </div>

    <div>
        <br/>
            <b>Timing-</b>
            {{ $career->timing }}
    </div>
@endsection

