@extends('layouts.master')

@section('content')

<div class="card border-0 rounded-10 card-shadow">
    <div class="card-header border-0 pt-3 bg-transparent d-flex">
        <h4 class="card-title">Create coupon</h4>
        <span class="ms-auto"><a href="

            " class="btn btn-secondary btn-sm"><i class="bx bx-left-arrow"></i>back</a></span>
    </div>
    @if (count($categories)>=1)
    <div class="card-body">
        <div class="col-8 mx-auto">

            <form action="{{ route('coupons.store') }}" method="POST" enctype="multipart/form-data">

                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="mb-3">
                    <label for="code" class="fw-bold">Code <span class="text-danger">*</span></label>
                    <input type="text" oninput="this.value = this.value.toUpperCase()" name="code" id="code" class="form-control shadow-none">
                </div>
                <div class="mb-3">
                    <label for="amount" class="fw-bold">percentage <span class="text-danger">*</span></label>
                    <input type="text" name="percentage" class="form-control shadow-none">
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="min_amount" class="fw-bold">Minumum Cart Amount </label>
                        <input type="text" name="min_amount" class="form-control shadow-none">
                </div>
                <div class="mb-3 col">
                        <label for="expiry_date" class="fw-bold">Expiry Date </label>
                        <input type="date" id="date" name="expiry_date" class="form-control shadow-none">
                </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-dark float-end"><i class="bx bx-plus"></i>Add</button>
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
