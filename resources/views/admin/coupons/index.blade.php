@extends('layouts.master')


@section('content')

    @if (count($coupons)>0)

    <div class="card border-0 rounded-10 card-shadow">
        <div class="card-header border-0 pt-3 bg-transparent d-flex">
            <h4 class="card-title">All Coupons</h4>
            <span class="ms-auto"><a href="
                /coupons/create
                " class="btn btn-info btn-sm"><i class="bx bx-plus-circle"></i>Add new</a></span>
        </div>
        <div class="card-body">
            <div class="table-responsive pt-2 px-2">
                <table id="example2" class="table table-borderless" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th>id</th>
                            <th>Coupon Code</th>
                            <th>Status</th>
                            <th>Discount Percentage</th>
                            <th>valid till</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="ms-2">
                                        <h6 class="mb-0 font-14">{{ $coupon->id }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td><div class="d-flex align-items-center">

                                <div class="ms-2">
                                    <h6 class="mb-0 font-14">#COU-000{{ $coupon->code }}</h6>
                                </div>
                            </div></td>
                            @if($coupon->expiry_date>=date('Y-m-d'))
                                <td>
                                    <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>active</div>
                                </td>
                            @else
                                <td>
                                    <div class="badge rounded-pill text-danger bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>inactive</div>
                                </td>
                            @endif
                            <td>{{ $coupon->percentage }}<b></b></td>
                            <td>{{ $coupon->expiry_date }}</td>

                            <td>
                                <div class="btn-group">
                                    <form action="{{ route('coupons.destroy',[$coupon->id]) }}" method="POST">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                        {{ Form::hidden('_method','DELETE') }}
                                        <input type="text" name="cat_id" value="10" hidden>
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                                    </form>
                                    <a href="/coupons/{{ $coupon->id }}/edit"  data-bs-toggle="modal" data-bs-target="#" class="btn btn-info btn-sm"><i class="bx bx-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $coupons->links() }}
    @else
        <p>No coupons found- add one</p>
        <div class="card-header border-0 pt-3 bg-transparent d-flex">

            <span class="ms-auto"><a href="/coupons/create" class="btn btn-info btn-sm"><i class="bx bx-plus-circle"></i>Add new coupon</a></span>
        </div>
    @endif
@endsection

