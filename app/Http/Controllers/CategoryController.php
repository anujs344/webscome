<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin')->only(['create','store','update','edit','destroy']);
        $this->middleware('team_member')->only(['index']);
//        $this->middleware('auth');
    }

    public function index()
    {
        $categories= Category::all();
        $categories= Category::orderBy('id','desc')->paginate(10);
        return view('admin.categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return view('admin.categories.create');
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
            $path=$request->file('cover_image')->move('category_images',$FileNameToStore);

        }else{
            $FileNameToStore="noimage.jpg";
        }

        //create category
        $category =new Category();
        $category->title= $request->input('category');
        $category->description= $request->input('description');
        $category->image= $FileNameToStore;
        $category->position=1;
        if($status=="on")
        {
            $category->status='1';
        }
        else
        {
            $category->status='0';
        }
        $category->save();

        return redirect('/cat')->with('success','Category created');

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
        //
        $categories= Category::find($id);
        return view('admin.categories.edit')->with('categories',$categories);

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

            'cover_image'=>'image|nullable|max:1999',
        ]);

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
            $path=$request->file('cover_image')->move('category_images',$FileNameToStore);
        }

        //create category
        $category =Category::find($id);
        $category->title= $request->input('category');
        $category->description= $request->input('description');
        if($request->hasFile('cover_image'))
        {
            $category->image= $FileNameToStore;
        }

        $category->position=1;

        if($status=="on")
        {
            $category->status='1';
        }
        else
        {
            $category->status='0';
        }

        $category->save();

        return redirect('/cat')->with('success','Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category =Category::find($id);

        if($category->image !='noimage.jpg')
        {
            $path = public_path()."/category_images/".$category->image;
            unlink($path);

        }
        $category->delete();
        return redirect('/cat')->with('success','Category Removed');

    }


}
