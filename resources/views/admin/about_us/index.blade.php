@extends('layouts.master')

@section('content')

<div class="card border-0 rounded-10 card-shadow">
    <div class="card-header border-0 pt-3 bg-transparent d-flex">
    
    </div>
    <div class="card-body">
        <div class="col-8 mx-auto">
            

            <form action="{{ route('about_us.update') }}" method="POST" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>


                <div class="mb-3">
                    <label for="title" class="fw-bold">Who we are-</label>
                    <p class="small text-muted">(Enter the text to describe who you are)</p>
                </div>
            
                <div class="mb-3">
                    
                    <textarea name="whoWeAre" id="whoWeAre" cols="30" rows="7" class="form-control shadow-nonw">{{ $about_us->whoWeAre }}</textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-dark btn-sm float-end">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection

@section('scripts')
{{--<script src="https://cdn.tiny.cloud/1/jfsdtn5ru0yt6okpgwx5j3vk8pq8fa645j0mz4imtf3oflfa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
@endsection