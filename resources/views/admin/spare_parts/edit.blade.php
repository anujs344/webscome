@extends('layouts.master')

@section('content')

    <div class="card border-0 rounded-10 card-shadow">
        <div class="card-header border-0 pt-3 bg-transparent d-flex">
            <h4 class="card-title">Edit Spare Part</h4>
            <span class="ms-auto"><a href="
            " class="btn btn-secondary btn-sm"><i class="bx bx-left-arrow"></i>back</a></span>
        </div>
        <div class="card-body">
            <div class="col-8 mx-auto">


                <form action="{{ route('spare.update',$spare->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="category" class="fw-bold">Spare Category</label>

                        <select name="spare_category" required id="spare_category" class="form-control shadow-none">
                            <?php $cat= \App\Models\Category::find($spare->category_id); ?>
                            <option value="{{$spare->category_id}}">{{$cat->title}}</option>
                            @foreach ($categories as $category)
                                @if($category->id == $cat->id)
                                    @continue
                                @endif
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="spare name" class="fw-bold">Spare Name</label>
                        <input type="text" name="spare_name" value="{{$spare->spare_part_name}}" id="spare_name" class="form-control shadow-none">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="fw-bold">Price </label>
                        <input type="number" name="spare_price" id="spare_price" value="{{$spare->price}}" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark btn-sm float-end">Edit Spare</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection