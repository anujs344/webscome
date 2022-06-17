<?php

namespace App\Http\Controllers;

use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

use App\Models\Professional;


class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['single_service', 'single_service_detail']]);
    }

    public function single_service($id)
    {
        $sub_categories = SubCategory::where('category_id', '=', $id)->get();
        return view('servicewebscome.single_service')->with('sub_categories', $sub_categories);
    }

    public function single_service_detail($id, $id2)
    {
        $child_categories = ChildCategory::where('category_id', $id)
            ->where('sub_category_id', $id2)->get();
        return view('servicewebscome.single_service_detail')->with('child_categories', $child_categories);

    }

    public function select_service_provider($id, $id2, $id3)
    {
        $professionals = Professional::where('service_id', '=', $id)
            ->where('sub_service_id', '=', $id2)
            ->where('verification_status', '=', '1')->get();
        $service = ChildCategory::where('id', '=', $id3)->first();

        return view('servicewebscome.select_service_provider')->with('professionals', $professionals)->with('service', $service);

    }
}
