<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Models\SubCategory;
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
        return response()->json($sub_categories, 200);
    }

    public function single_service_detail($id, $id2)
    {
        $child_categories = ChildCategory::where('category_id', $id)
            ->where('sub_category_id', $id2)->get();
        
        return response()->json($child_categories, 200, $headers);

    }

    public function select_service_provider($id, $id2, $id3)
    {
        $professionals = Professional::where('service_id', '=', $id)
            ->where('sub_service_id', '=', $id2)
            ->where('verification_status', '=', '1')->get();
        $service = ChildCategory::where('id', '=', $id3)->first();

        return response()->json(['professionals' => $professionals,'service' => $service], 200, $headers);

    }
}
