@extends('layouts.master')


@section('content')
@if (count($blogs)>=1)
<div class="card-header border-0 bg-transparent d-flex">

    <h4>all blogs</h4>
        <span class="ms-auto"><a href="/blogs/create" class="btn btn-info btn-sm"><i class="bx bx-plus-circle"></i>Add new blog</a></span>
    </div>


        <div class="container">
            <main class="grid">
                @foreach ($blogs as $blog)
                <article>
                    <img src="{{asset('blog_images/'.$blog->cover_image)}}" alt="no-image">
                    <div class="text">
                        <h3>{!! $blog->title !!}</h3>
                        <p>{!! Str::limit($blog->content,130,$end='.......') !!}</p>
                        <form action="{{ route('blogs.show',[$blog->id]) }}" method="POST">


                            <button type="submit">Read More</button>
                            {{ Form::hidden('_method','GET') }}
                        </form>


                    </div>
                </article>
                @endforeach
            </main>
        </div>




        {{ $blogs->links() }}
    @else
        <p>No blogs found</p>
        <div class="card-header border-0 pt-3 bg-transparent d-flex">

            <span class="ms-auto"><a href="/blogs/create" class="btn btn-info btn-sm"><i class="bx bx-plus-circle"></i>Add new blog</a></span>
        </div>
    @endif
@endsection

