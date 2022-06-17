<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChildCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class ChildCategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin')->only(['create','store','update','edit','destroy']);
        $this->middleware('team_member')->only(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $child_categories= ChildCategory::join('categories','child_categories.category_id','=','categories.id')->join('sub_categories','child_categories.sub_category_id','=','sub_categories.id')->get(['child_categories.*','categories.title AS title2','sub_categories.title AS title3']);
        return view('admin.child_categories.index')->with('child_categories',$child_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_categories=Category::all();
        return view('admin.child_categories.create')->with('parent_categories',$parent_categories);
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
            'sub_category' =>'required',
            'child_category' =>'required',

            'regular_price'=>'required',
            'discounted_price'=>'required',
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
            $path=$request->file('cover_image')->move('childcategory_images',$FileNameToStore);
        }else{
            $FileNameToStore="noimage.jpg";
        }

        //create category
        $child_category =new ChildCategory();
        $child_category->title= $request->input('child_category');
        $child_category->description= $request->input('description');
        $child_category->sub_category_id= $request->input('sub_category');
        $child_category->category_id= $request->input('category');
        $child_category->regular_price= $request->input('regular_price');
        $child_category->discounted_price= $request->input('discounted_price');

        $child_category->image= $FileNameToStore;
        $child_category->position=1;
        if($status=="on")
        {
            $child_category->status='1';
        }
        else
        {
            $child_category->status='0';
        }
        $child_category->save();

        return redirect('/child_cat')->with('success','Child category created');
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

    public function parent_subcategories(Request $request){
        $sub_cat= DB::table('sub_categories')->where('category_id',$request->get('cat_id'))->get();
        $output='';
        foreach ($sub_cat as $sub_category){
            $output.='<option value="'.$sub_category->id.'">'.$sub_category->title.'</option>';
        }
        echo ($output);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $child_category= ChildCategory::join('categories','child_categories.category_id','=','categories.id')->join('sub_categories','child_categories.sub_category_id','=','sub_categories.id')->get(['child_categories.*','categories.title AS title2','categories.id AS id2','sub_categories.title AS title3','sub_categories.id AS id3']);
         $parent_categories=Category::all();
        foreach ($child_category as $child_cat) {
            if ($child_cat->id==$id) {
                $category=$child_cat;
            }
        }
        return view('admin.child_categories.edit')->with('category',$category)->with('parent_categories',$parent_categories);

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
            'sub_category' =>'required',
            'child_category' =>'required',

            'regular_price'=>'required',
            'discounted_price'=>'required',

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
            $path=$request->file('cover_image')->move('childcategory_images',$FileNameToStore);
        }

        //create category
        $child_category =ChildCategory::find($id);
        $child_category->title= $request->input('child_category');
        $child_category->description= $request->input('description');
        $child_category->sub_category_id= $request->input('sub_category');
        $child_category->category_id= $request->input('category');
        $child_category->regular_price= $request->input('regular_price');
        $child_category->discounted_price= $request->input('discounted_price');

        if($request->hasFile('cover_image'))
        {
            $child_category->image= $FileNameToStore;
        }
        $child_category->position=1;
        if($status=="on")
        {
            $child_category->status='1';
        }
        else
        {
            $child_category->status='0';
        }
        $child_category->save();

        return redirect('/child_cat')->with('success','Child category updated successfully..');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $child_category =ChildCategory::find($id);

        if($child_category->image !='noimage.jpg')
        {
            $path = public_path()."/childcategory_images/".$child_category->image;
            unlink($path);
        }
        $child_category->delete();
        return redirect('/child_cat')->with('success','Child Category Removed successfully.');
    }

}
