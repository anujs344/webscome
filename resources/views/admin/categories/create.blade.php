@extends('layouts.master')

@section('content')

<div class="card border-0 rounded-10 card-shadow">
    <div class="card-header border-0 pt-3 bg-transparent d-flex">
        <h4 class="card-title">Category</h4>
        <span class="ms-auto"><a href="
            
            " class="btn btn-secondary btn-sm"><i class="bx bx-left-arrow"></i>back</a></span>
    </div>
    <div class="card-body">
        <div class="col-8 mx-auto">
            

            <form action="{{ route('cat.store') }}" method="POST" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>


                <div class="mb-3">
                    <label for="category" class="fw-bold">Category</label>
                    <input type="text" name="category" id="category" class="form-control shadow-none">
                </div>
            
                <div class="mb-3">
                    <label for="description" class="fw-bold">Description : </label>
                    <textarea name="description" id="description" cols="30" rows="7" class="form-control shadow-nonw"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="fw-bold">Image</label>
                    <input type="file" name="cover_image" id="cover_image" class="form-control shadow-none">
                    <p class="small text-muted">(Please Choose Brand Image)</p>
                </div>
                <div class="mb-3">
                    <label for="status" class="fw-bold">Status</label>
                    <label class="switch">
                        <input type="checkbox" name="status">
                        <span class="slider"></span>
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-dark btn-sm float-end">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection