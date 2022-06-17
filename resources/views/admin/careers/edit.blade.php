@extends('layouts.master')

@section('content')

<div class="card border-0 rounded-10 card-shadow">
    <div class="card-header border-0 pt-3 bg-transparent d-flex">
        <h4 class="card-title">edit career</h4>
        <span class="ms-auto"><a href="/careers" class="btn btn-secondary btn-sm"><i class="bx bx-left-arrow"></i>back</a></span>
    </div>
    <div class="card-body">
        <div class="col-8 mx-auto">


            <form action="{{ route('careers.update',[$career->id]) }}" method="POST" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>


                <div class="mb-3">
                    <label for="title" class="fw-bold">Title(Position)</label>
                    <input type="text" value="{{ $career->title }}" name="title" id="title" class="form-control shadow-none">
                </div>

                <div class="mb-3">
                    <label for="description" class="fw-bold">Description : </label>
                    <textarea name="description" id="description" cols="30" rows="7" class="form-control shadow-nonw">{{ $career->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="eligibility" class="fw-bold">Eligibility Criteria : </label>
                    <textarea name="eligibility" id="eligibility" cols="30" rows="7" class="form-control shadow-nonw">{{ $career->eligibility }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="responsibilities" class="fw-bold">Responsibilities : </label>
                    <textarea name="responsibilities" id="responsibilites" cols="30" rows="7" class="form-control shadow-nonw">{{ $career->responsibilities }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="location" class="fw-bold">Location </label>
                    <input type="text" value="{{ $career->location }}" name="location" id="location" class="form-control shadow-none">
                </div>

                <div class="mb-3">
                    <label for="salary" class="fw-bold">Salary</label>
                    <input type="number" value="{{ $career->salary }}" name="salary" id="salary" class="form-control shadow-none">
                </div>

                <div class="mb-3">
                    <label for="timing" class="fw-bold">Timing</label>
                    <select name="timing" id="timing" class="form-control shadow-none">
                        <option value="{{ $career->timing }}" selected >{{ $career->timing }}</option>
                        <option value="part-time">Part-time</option>
                        <option value="full-time">Full-time</option>
                    </select>
                </div>

                <div class="mb-3 col">
                    <label for="deadline" class="fw-bold">Deadline </label>
                    <input type="date" value="{{ $career->deadline }}" name="deadline" class="form-control shadow-none">
                </div>

                <div class="mb-3">
                    <img src="{{asset('career_images/'.  $career->image )}}" alt="no image" class="img-fluid rounded-10 shadow" style="height: 200px; width:200px; object-fit:cover" >
                </div>

                <div class="mb-3">
                    <label for="image" class="fw-bold">Image</label>
                    <input type="file" name="cover_image" id="cover_image" class="form-control shadow-none">
                    <p class="small text-muted">(Please Choose Career Sample Image)</p>
                </div>

                <div class="mb-3">
                    <label for="status" class="fw-bold">Status</label>
                    <label class="switch">
                        <input type="checkbox" @if($career->status=='1') checked @endif name="status">
                        <span class="slider"></span>
                    </label>
                </div>
                {{ Form::hidden('_method','PUT') }}
                <div class="mb-3">
                    <button type="submit" class="btn btn-dark btn-sm float-end">Update Career</button>
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
