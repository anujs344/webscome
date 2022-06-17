@extends('layouts.master')
@section('content')
    <h4>ADD SPARE</h4>


    <div class="card-body">
        <div class="col-8 mx-auto">


            <form action="{{route('all_orders.add_spares')}}" method="POST" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="mb-3">
                    <label for="category" class="fw-bold">Spare Category</label>
                    <input class="form-control" style="margin-top: 5px" type="text" value="{{$spare_service_category}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="category" class="fw-bold">Service</label>
                    <input class="form-control" style="margin-top: 5px" type="text" value="{{$child_service->title}}" disabled>
                </div>
                <input type="hidden" value="{{$_GET['order_id']}}" name="order_id">
                <input type="hidden" value="{{$_GET['service_id']}}" name="service_id">
                <input type="hidden" value="{{$child_service->category->id}}" name="category_id">
                @foreach($all_spares as $spare)
                    <?php $added_spare= \App\Models\AddedSpare::where('order_id',$_GET['order_id'])
                        ->where('service_id',$_GET['service_id'])->where('spare_id',$spare->id)->first(); ?>
                    <input type="checkbox" {{$added_spare ? 'checked' : ''}} name="spare_parts[]" value="{{$spare->spare_part_name}}" style="margin-right: 6px">{{$spare->spare_part_name}}
                    <br>
                @endforeach
                <button type="submit" class="btn btn-primary" style="margin-top: 1rem">Add Selected</button>
            </form>
        </div>
    </div>
@endsection