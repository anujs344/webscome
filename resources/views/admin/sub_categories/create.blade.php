@extends('layouts.master')

@section('content')

<div class="card border-0 rounded-10 card-shadow">
    <div class="card-header border-0 pt-3 bg-transparent d-flex">
        <h4 class="card-title">Sub Category</h4>
        <span class="ms-auto"><a href="

            " class="btn btn-secondary btn-sm"><i class="bx bx-left-arrow"></i>back</a></span>
    </div>
    @if (count($parent_categories)>=1)
    <div class="card-body">
        <div class="col-8 mx-auto">


            <form action="{{ route('subCat.store') }}" method="POST" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="mb-3">
                    <label for="category" class="fw-bold">Parent Category</label>

                    <select name="parent_category" id="category" class="form-control shadow-none">

                        <option value="" selected hidden disabled>select</option>
                        @foreach ($parent_categories as $parent_category)
                        <option value="{{ $parent_category->id }}">{{ $parent_category->title }}</option>

                        @endforeach
                        </select>
                </div>

                <div class="mb-3">
                    <label for="category" class="fw-bold">SubCategory</label>
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
                    <button type="submit" class="btn btn-dark btn-sm float-end">Add Sub-Category</button>
                </div>
            </form>

    @else
        <p>No parent-category found create it first</p>
        <div class="card-header border-0 pt-3 bg-transparent d-flex">

            <span class="ms-auto"><a href="/cat/create" class="btn btn-info btn-sm"><i class="bx bx-plus-circle"></i>Add parent category</a></span>
        </div>
    @endif
</div>
</div>
</div>


@endsection
