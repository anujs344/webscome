<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Carrier;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;


class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function change_status($id)
    {

        $category= Category::find($id);

        if($category->status =='1'){
            $status='0';
        }else{
            $status='1';
        }

        $category->status=$status;
        $category->save();

        if($status =='1'){
            return response()->json(['success' =>'Category Successfully Activated'], 200);
        }else{
            return response()->json(['success' =>'Category Successfully Dectivated'], 200);
        }



    }

    //change status for subcategories

    public function change_status_subCat($id)
    {

        $category= SubCategory::find($id);

        if($category->status =='1'){
            $status='0';
        }else{
            $status='1';
        }

        $category->status=$status;
        $category->save();

        if($status =='1'){
            return response()->json(['success' =>'Category Successfully Activated'], 200);

        }else{
            return response()->json(['success' =>'Category Successfully Dectivated'], 200);

        }



    }

    //change status for childcategories
    public function change_status_childCat($id)
    {

        $category= ChildCategory::find($id);

        if($category->status =='1'){
            $status='0';
        }else{
            $status='1';
        }

        $category->status=$status;
        $category->save();

        if($status =='1'){
            return response()->json(['success' =>'Category Successfully Activated'], 200);

            
        }else{
            return response()->json(['success' =>'Category Successfully Dectivated'], 200);

        }



    }

    //change status for careers
    public function change_status_careers($id)
    {

        $career= Carrier::find($id);

        if($career->status =='1'){
            $status='0';
        }else{
            $status='1';
        }

        $career->status=$status;
        $career->save();

        if($status =='1'){
            return response()->json(['success' =>'Category Successfully Activated'], 200);

        }else{
            return response()->json(['success' =>'Category Successfully Dectivated'], 200);

        }
    }
}
