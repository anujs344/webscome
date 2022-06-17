@extends('layouts.master')

@section('content')

<div class="card border-0 rounded-10 card-shadow">
    <div class="card-header border-0 pt-3 bg-transparent d-flex">
        <h4 class="card-title">Blog</h4>
        <span class="ms-auto"><a href="/blogs" class="btn btn-secondary btn-sm"><i class="bx bx-left-arrow"></i>back</a></span>
    </div>
    <div class="card-body">
        <div class="col-8 mx-auto">
            

            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>


                <div class="mb-3">
                    <label for="title" class="fw-bold">Title</label>
                    <input type="text" name="title" id="title" class="form-control shadow-none">
                </div>

                <div class="mb-3">
                    <label for="category" class="fw-bold">Category-</label>
                <select name="category" id="category" class="form-control shadow-none">
                        
                    <option value="" selected hidden disabled>select</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    
                    @endforeach
                </select>
                </div>
            
                <div class="mb-3">
                    <label for="description" class="fw-bold">Content : </label>
                    <textarea name="content" id="content" cols="30" rows="7" class="form-control shadow-nonw"></textarea>
                </div>



                <div class="mb-3">
                    <label for="image" class="fw-bold">Image</label>
                    <input type="file" name="cover_image" id="cover_image" class="form-control shadow-none">
                    <p class="small text-muted">(Please Choose Cover Image for Blog)</p>
                </div>

                
                <div class="mb-3">
                    <button type="submit" class="btn btn-dark btn-sm float-end">Add Blog</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/w8dqey6uixp0kz6hhgyrarwqftbqhgb56qd925sf5bednkmt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>
@endsection