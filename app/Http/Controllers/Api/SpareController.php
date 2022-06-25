<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SparePart;
use App\Models\ChildCategory;
use App\Models\AddedSpare;
use Illuminate\Http\Request;

class SpareController extends Controller
{
    public function __construct()
    {
        $this->middleware('team_member');
    }
    function index(){
        $spares= SparePart::all();
        return response()->json($spares, 200);
    }

    function create(){
        $categories= Category::all();
        return response()->json($categories, 200);

    }

    function edit($id){
        $categories= Category::all();
        $spare= SparePart::find($id);
 
        return response()->json(['spares' => $spare,'categories'=>$categories], 200);
        return view('admin.spare_parts.edit',compact('categories','spare'));
    }

    function update(Request $request,$id){
        $spare= SparePart::find($id);
        $spare->category_id= $request->get('spare_category');
        $spare->spare_part_name= $request->get('spare_name');
        $spare->price= $request->get('spare_price');
        $spare->save();
        return response()->json(['success' => 'Spare Updated Successfully'], 200);

    }

    function delete(Request $request){
        $spare= SparePart::findOrFail($request->get('spare_id'));
        $spare->delete();
        return response()->json(['success' => 'Spare Part removed'], 200);
    }

    function store(Request $request){
        $spare= new SparePart();
        $spare->category_id= $request->get('spare_category');
        $spare->spare_part_name= $request->get('spare_name');
        $spare->price= $request->get('spare_price');
        $spare->save();
        return response()->json(['success' => 'New Spare Added'], 200, $headers);
        // return redirect('/spare-parts')->with('success','New Spare Added');
    }
    
      function add_spares(){
        if(!isset($_GET['order_id']) || !isset($_GET['service_id']) ) abort(403);
        $child_service= ChildCategory::find($_GET['service_id']);
        $order_id= $_GET['order_id'];
        $service_id=$_GET['service_id'];

        $spare_service_category= $child_service->category->title;
        $all_spares= SparePart::all()->where('category_id',$child_service->category->id);
        $spares= SparePart::all()->where('category_id',$child_service->category_id);

        return response()->json([
            'order_id' => $order_id,
            'child_service' => $child_service,
            'spares' => $spares,
            'spare_service_category' => $spare_service_category,
            'all_spares' => $all_spares
        ], 200);
    }

    function store_spares(Request $request){
        $order_id= $request->get('order_id');
        $service_id= $request->get('service_id');
        $spares= $request->get('spare_parts');

        // if($spares== null){
        //     return redirect()->back()->with('error','Select atleast one spare part');
        // }
        $spare_array=array();
        if($spares!= null)
        foreach ($spares as $spare){
            $sp= SparePart::where('spare_part_name',$spare)->first();
            array_push($spare_array,$sp->id);
            AddedSpare::firstOrCreate([
                'order_id'=> $order_id,
                'service_id'=> $service_id,
                'spare_id'=>$sp->id,
                'spare_price'=>$sp->price,
            ]);
        }
        AddedSpare::where('order_id',$order_id)->where('service_id',$service_id)->whereNotIn('spare_id',$spare_array)->delete();
        return response()->json(['success' => 'Spares Edited Successfully'], 200);
    }
}
