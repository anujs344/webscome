@extends('layouts.master')


@section('content')
    <h3>Sub Categories</h3>
    @if (count($sub_categories)>0)


                <div class="card border-0 rounded-10 card-shadow">
                    <div class="card-header border-0 pt-3 bg-transparent d-flex">
                        <h4 class="card-title">category</h4>
                        <span class="ms-auto"><a href="/subCat/create" class="btn btn-info btn-sm"><i class="bx bx-plus-circle"></i>Add new sub-category</a></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive pt-2 px-2">
                            <table id="example2" class="table table-striped table-borderless" style="width:100%">
                                <thead>

                                    <tr>
                                        <th>id</th>
                                        <th>subcategory Name</th>
                                        <th>subcategory Logo</th>
                                        <th>parent category</th>
                                        <th>Status</th>
                                        <th class="d-print-none"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sub_categories as $sub_category)
                                        <tr>
                                        <td>{{ $sub_category->id }}</td>
                                        <td>{{ $sub_category->title }}</td>

                                        <td><img src="{{asset('subcategory_images/'.$sub_category->image)}}" alt="no image" class="img-fluid rounded-10 shadow" style="height: 50px; width:50px; object-fit:cover" ></td>
                                        <td>{{ $sub_category->title2 }}</td>

                                        <td>

                                            <form action="{{ route('changeStatus_subCat',$sub_category->id) }}" method="POST">
                                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                                @if ($sub_category->status=='1')
                                                    <button type="submit" class="btn btn-success">Active</button>
                                                @else
                                                    <button type="submit" class="btn btn-danger">Inactive</button>
                                                @endif
                                            </form>


                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{ route('subCat.destroy',[$sub_category->id]) }}" method="POST">
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                                    {{ Form::hidden('_method','DELETE') }}                                            <input type="text" name="cat_id" value="10" hidden>
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                                                </form>
                                                <a href="/subCat/{{ $sub_category->id }}/edit"  data-bs-toggle="modal" data-bs-target="#" class="btn btn-info btn-sm"><i class="bx bx-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




    @else
        <p>No sub-category found</p>
        <div class="card-header border-0 pt-3 bg-transparent d-flex">

            <span class="ms-auto"><a href="/subCat/create" class="btn btn-info btn-sm"><i class="bx bx-plus-circle"></i>Add new sub-category</a></span>
        </div>
    @endif
@endsection

