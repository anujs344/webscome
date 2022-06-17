@extends('layouts.master')


@section('content')

<div class="card-header border-0 pt-3 bg-transparent d-flex">
    <h3>{{ $blog->title }}</h3>
    <span class="ms-auto"><a href="/blogs" class="btn btn-secondary btn-sm"><i class="bx bx-left-arrow"></i>back</a></span>
</div>

    <div class="btn-group float-end">
        <form action="{{ route('blogs.destroy',[$blog->id]) }}" method="POST" class="">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            {{ Form::hidden('_method','DELETE') }}
            <input type="text" name="cat_id" value="10" hidden>
            <button type="submit" class="btn btn-sm btn-danger float-end ">Delete</button>
        </form>
        <a href="/blogs/{{ $blog->id }}/edit"  data-bs-toggle="modal" data-bs-target="#" class="btn btn-info btn-sm ">Edit</a>
    </div>

    <div class="mb-3">
        <img src="{{asset('blog_images/'.$blog->cover_image)}}" alt="no image" class="img-fluid rounded-10 shadow" style="height: 200px; width:200px; object-fit:cover" >

    </div>

   <small>Created at- {{ $blog->created_at }}</small>
   <small>Created By- </small>
   <div>
    <hr>
        <b>Category-</b>
        {!! $blog->cat_title !!}
    </div>
   <div>
   <hr>
       <b>Content-</b>
       {!! $blog->content !!}
   </div>


@endsection

