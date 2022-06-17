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


            <form action="{{ route('child_cat.update',[$category->id]) }}" method="POST" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="mb-3">
                    <label for="category" class="fw-bold">Parent Category</label>

                    <select name="category" id="category" class="form-control shadow-none">

                        <option value="{{ $category->id2 }}" selected >{{ $category->title2 }}</option>
                        @foreach ($parent_categories as $parent_category)
                        <option value="{{ $parent_category->id }}">{{ $parent_category->title }}</option>

                        @endforeach
                        </select>
                </div>
                <div class="mb-3">
                    <label for="category" class="fw-bold">Parent Sub-Category</label>


                    <select name="sub_category" id="sub_category" class="form-control shadow-none">
                        <option value="{{ $category->id3 }}" selected >{{ $category->title3 }}</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="category" class="fw-bold">ChildCategory</label>
                    <input type="text" value="{{ $category->title }}" name="child_category" id="child_category" class="form-control shadow-none">
                </div>

                <div class="mb-3">
                    <label for="description" class="fw-bold">Description : </label>
                    <textarea name="description" id="description" cols="30" rows="7" class="form-control shadow-nonw">{{ $category->description }}</textarea>
                </div>
                <div class="mb-3">
                    <img src="{{asset('childcategory_images/'.$category->image)}}" alt="no image" class="img-fluid rounded-10 shadow" style="height: 200px; width:200px; object-fit:cover" >
                </div>
                <div class="mb-3">
                    <label for="image" class="fw-bold">Image</label>
                    <input type="file" name="cover_image" id="cover_image" class="form-control shadow-none">
                    <p class="small text-muted">(Please Choose Brand Image)</p>
                </div>

                <div class="mb-3">
                    <label for="price" class="fw-bold">Regular Price</label>
                    <input type="number" value="{{ $category->regular_price }}" name="regular_price" id="regular_price" class="form-control shadow-none">

                </div>

                <div class="mb-3">
                    <label for="price" class="fw-bold">Discounted Price</label>
                    <input type="number" value="{{ $category->discounted_price }}" name="discounted_price" id="discounted_price" class="form-control shadow-none">

                </div>

                <div class="mb-3">
                    <label for="status" class="fw-bold">Status</label>
                    <label class="switch">
                        <input type="checkbox" @if($category->status=='1') checked @endif name="status">
                        <span class="slider"></span>
                    </label>
                </div>
                {{ Form::hidden('_method','PUT') }}
                <div class="mb-3">
                    <button type="submit" class="btn btn-dark btn-sm float-end">Update Child-Category</button>
                </div>
            </form>


    @endif
</div>
</div>
</div>


@endsection

@section('scripts')

    <script>
        $('#category').on('change',function(e){
            console.log(e);

            var cat_id =e.target.value;


            //ajax
            $.get('/ajax-subcat?cat_id=' +cat_id, function(data){

                $('#sub_category').empty();
                $.each(data,function(index, subcatObj){
                    $('#sub_category').append('<option value="'+subcatObj.id+'">'+subcatObj.title+'</option>');
                });

            });
        });
    </script>
@endsection
