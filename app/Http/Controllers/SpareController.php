<?php

namespace App\Http\Controllers;

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
        return view('admin.spare_parts.index',compact('spares'));
    }

    function create(){
        $categories= Category::all();
        return view('admin.spare_parts.create',compact('categories'));
    }

    function edit($id){
        $categories= Category::all();
        $spare= SparePart::find($id);
        return view('admin.spare_parts.edit',compact('categories','spare'));
    }

    function update(Request $request,$id){
        $spare= SparePart::find($id);
        $spare->category_id= $request->get('spare_category');
        $spare->spare_part_name= $request->get('spare_name');
        $spare->price= $request->get('spare_price');
        $spare->save();
        return redirect('/spare-parts')->with('success','Spare Updated Successfully');
    }

    function delete(Request $request){
        $spare= SparePart::findOrFail($request->get('spare_id'));
        $spare->delete();
        return redirect('/spare-parts')->with('success','Spare Part removed');
    }

    function store(Request $request){
        $spare= new SparePart();
        $spare->category_id= $request->get('spare_category');
        $spare->spare_part_name= $request->get('spare_name');
        $spare->price= $request->get('spare_price');
        $spare->save();
        return redirect('/spare-parts')->with('success','New Spare Added');
    }
    
      function add_spares(){
        if(!isset($_GET['order_id']) || !isset($_GET['service_id']) ) abort(403);
        $child_service= ChildCategory::find($_GET['service_id']);
        $order_id= $_GET['order_id'];
        $service_id=$_GET['service_id'];

        $spare_service_category= $child_service->category->title;
        $all_spares= SparePart::all()->where('category_id',$child_service->category->id);
        $spares= SparePart::all()->where('category_id',$child_service->category_id);
        return view('admin.spares.add_spare',
            compact('order_id','child_service','service_id','spares','spare_service_category','all_spares'));
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
        return redirect()->back()->with('success','Spares Edited Successfully');
    }
}
