@extends('layouts.master')


@section('content')
<div class="card-header border-0 bg-transparent d-flex">
    <h4>All careers</h4>
        <span class="ms-auto"><a href="/careers/create" class="btn btn-info btn-sm"><i class="bx bx-plus-circle"></i>Add new career</a></span>
    </div>
        @if (count($careers)>=1)

        <div class="container">
            <main class="grid">
                @foreach ($careers as $career)
                <article>
                    <img src="{{asset('career_images/'.$career->image)}}" alt="no-image">
                    <div class="text">
                        <h3>{{ $career->title }}</h3>
                        <p>{{ Str::limit($career->description,130,$end='.......') }}</p>
                        <form action="{{ route('careers.show',[$career->id]) }}" method="POST">


                            <button type="submit">Read More</button>
                            {{ Form::hidden('_method','GET') }}
                        </form>
                        <hr>
                        <form action="{{ route('changeStatus_careers',$career->id) }}" method="POST">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            @if ($career->status=='1')
                                <button type="submit" class="btn btn-success">Active</button>
                            @else
                                <button type="submit" class="btn btn-danger">Inactive</button>
                            @endif
                        </form>

                    </div>
                </article>
                @endforeach
            </main>
        </div>




        {{ $careers->links() }}
    @endif
@endsection

