@extends('layouts.master')

@section('content')

<div class="card border-0 rounded-10 card-shadow">
    <div class="card-header border-0 pt-3 bg-transparent d-flex">
        <h4 class="card-title">Seller Commision</h4>
        
    </div>
<div class="card-body">
    <div class="col-12 mx-auto">
        <form action="{{ route('update_professional_commission') }}" method="POST">
            @csrf
           <div class="row mb-3">
                <div class="col">
                    <label for="rate" class="fw-bold">Professional Commission Rate (%)</label>
                    <input type="number" class="form-control shadow-none" min="0" step="0.1" autofocus
                        name="commission" id="rate" value="{{ $commission->professional_commission }}">

                </div>

            </div>
            <div class="row mb-3">
                <div class="col">
                    <p class="text-sm text-muted">Note : this much commision can be added to professionals earning on each order price</p>
                </div>

            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-dark btn-sm float-end">Edit</button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection