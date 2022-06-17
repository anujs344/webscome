@extends('layouts.master')


@section('content')
    <h3>All Spares</h3>
    <div class="card border-0 rounded-10 card-shadow">
        <div class="card-header border-0 pt-3 bg-transparent d-flex">
            {{--            <h4 class="card-title">category</h4>--}}
            <span class="ms-auto"><a href="/spare-parts/create" class="btn btn-info btn-sm"><i
                            class="bx bx-plus-circle"></i>Add Spare Part</a></span>
        </div>
        <div class="card-body">
            <div class="table-responsive pt-2 px-2">
                <table id="example2" class="table table-striped table-borderless" style="width:100%">
                    <thead>

                    <tr>
                        <th>Spare Name</th>
                        <th>Spare Category</th>
                        <th>Spare Price</th>
                        @if(auth()->user()->role==1)
                        <th class="d-print-none"></th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($spares as $spare)
                        <tr>
                            <?php $sp = \App\Models\SparePart::find($spare->id); $cat = \App\Models\Category::find($spare->category_id) ?>
                            <td>{{ $sp->spare_part_name }}</td>
                            <td>{{ $cat->title }}</td>
                            <td>{{ $sp->price }}</td>
                            @if(auth()->user()->role==1)
                            <td>
                                <div class="btn-group">
                                    <form action="{{route('spare_delete')}}" method="POST">
                                        @csrf
                                        {{ Form::hidden('_method','DELETE') }}
                                        <input type="text" name="spare_id" value="{{$spare->id}}" hidden>
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{route('spare.edit',$spare->id)}}" data-bs-toggle="modal" data-bs-target="#"
                                       class="btn btn-info btn-sm"><i class="bx bx-edit"></i></a>
                                </div>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
