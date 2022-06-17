<?php

namespace App\Http\Controllers;

use App\Models\Carrier;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;


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
            return redirect('/cat')->with('success','Category Successfully Activated');
        }else{
            return redirect('/cat')->with('success','Category Successfully Dectivated');
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
            return redirect('/subCat')->with('success','Category Successfully Activated');
        }else{
            return redirect('/subCat')->with('success','Category Successfully Dectivated');
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
            return redirect('/child_cat')->with('success','Category Successfully Activated');
        }else{
            return redirect('/child_cat')->with('success','Category Successfully Dectivated');
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
            return redirect('/careers')->with('success','Career Successfully Activated');
        }else{
            return redirect('/careers')->with('success','Career Successfully Dectivated');
        }
    }
}
