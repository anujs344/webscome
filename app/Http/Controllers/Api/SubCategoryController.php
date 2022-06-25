<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SubCategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin')->only(['create','store','update','edit','destroy']);
        $this->middleware('team_member')->only(['index']);
    }

    public function index()
    {
        $sub_categories= SubCategory::join('categories','sub_categories.category_id','=','categories.id')->get(['sub_categories.*','categories.title AS title2']);
        //$sub_categories= $sub_categories::orderBy('id','desc')->paginate(10);
        //return $sub_categories;
        return response()->json($sub_categories, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_categories=Category::all();

        return response()->json($parent_categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status= $request->input('status');
        $this->validate($request,[
            'category'=>'required',
            'parent_category' =>'required',
            'cover_image'=>'image|nullable|max:1999',//2mb
        ]);

        //Handle cover_image
        if($request->hasFile('cover_image'))
        {
            //Get filename with ext
            $FileNameWidExt=$request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($FileNameWidExt, PATHINFO_FILENAME);
            //Get just extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $FileNameToStore= $filename.'_'.time().'.'. $extension;
            //Upload image
            $path=$request->file('cover_image')->move('subcategory_images',$FileNameToStore);
        }else{
            $FileNameToStore="noimage.jpg";
        }

        //create category
        $sub_category =new SubCategory();
        $sub_category->title= $request->input('category');
        $sub_category->description= $request->input('description');
        $sub_category->category_id= $request->input('parent_category');

        $sub_category->image= $FileNameToStore;
        $sub_category->position=1;
        if($status=="on")
        {
            $sub_category->status='1';
        }
        else
        {
            $sub_category->status='0';
        }
        $sub_category->save();

        return response()->json(['success' => 'Sub-Category created'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_category= SubCategory::join('categories','sub_categories.category_id','=','categories.id')->get(['sub_categories.*','categories.title AS title2','categories.id AS id2']);
        $parent_categories=Category::all();
        foreach ($sub_category as $sub_cat) {
            if ($sub_cat->id==$id) {
                $category=$sub_cat;
            }
        }
        //return $category;

        return response()->json([
            'parent_categories' => $parent_categories,
            'category '=> $category
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status= $request->input('status');
        $this->validate($request,[
            'category'=>'required',
            'parent_category' =>'required',
            'cover_image'=>'image|nullable|max:1999',//2mb
        ]);

        //Handle cover_image
        if($request->hasFile('cover_image'))
        {
            //Get filename with ext
            $FileNameWidExt=$request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($FileNameWidExt, PATHINFO_FILENAME);
            //Get just extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $FileNameToStore= $filename.'_'.time().'.'. $extension;
            //Upload image
            $path=$request->file('cover_image')->move('subcategory_images',$FileNameToStore);
        }

        //create category
        $sub_category =SubCategory::find($id);
        $sub_category->title= $request->input('category');
        $sub_category->description= $request->input('description');
        $sub_category->category_id= $request->input('parent_category');

        if($request->hasFile('cover_image'))
        {
            $sub_category->image= $FileNameToStore;
        }
        $sub_category->position=1;
        if($status=="on")
        {
            $sub_category->status='1';
        }
        else
        {
            $sub_category->status='0';
        }
        $sub_category->save();

        return response()->json(['success' => 'SUb-Category updated successfully'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_category =SubCategory::find($id);

        if($sub_category->image !='noimage.jpg')
        {
            $path = public_path()."/subcategory_images/".$sub_category->image;
            unlink($path);
        }
        $sub_category->delete();
        return response()->json(['success' => 'SUb-Category removed successfully'], 200);
    }
}
