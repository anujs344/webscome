<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin')->only(['create','store','update','edit','destroy']);
        $this->middleware('team_member')->only(['index','show']);
    }

    public function index()
    {
        $careers= Career::all();
        $careers= Career::orderBy('id','desc')->paginate(10);
        return view('admin.careers.index')->with('careers',$careers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.careers.create');
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
            'title'=>'required',
            'description'=>'required',
            'eligibility'=>'required',
            'responsibilities'=>'required',
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
            $path=$request->file('cover_image')->move('career_images',$FileNameToStore);
        }else{
            $FileNameToStore="noimage.jpg";
        }


        //create category
        $career =new Career();
        $career->title= $request->input('title');
        $career->description= $request->input('description');
        $career->responsibilities= $request->input('responsibilities');
        $career->eligibility=$request->input('eligibility');
        $career->deadline=$request->input('deadline');
        $career->location=$request->input('location');
        $career->salary=$request->input('salary');
        $career->timing=$request->input('timing');
        $career->image= $FileNameToStore;


        if($status=="on")
        {
            $career->status='1';
        }
        else
        {
            $career->status='0';
        }
        $career->save();

        return redirect('/careers')->with('success','Career created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $career= Career::find($id);
        return view('admin.careers.show')->with('career',$career);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $career= Career::find($id);
        return view('admin.careers.edit')->with('career',$career);
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
            'title'=>'required',
            'description'=>'required',
            'eligibility'=>'required',
            'responsibilities'=>'required',
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
            $path=$request->file('cover_image')->move('career_images',$FileNameToStore);
        }


        //create category
        $career =Career::find($id);
        $career->title= $request->input('title');
        $career->description= $request->input('description');
        $career->responsibilities= $request->input('responsibilities');
        $career->eligibility=$request->input('eligibility');
        $career->deadline=$request->input('deadline');
        $career->location=$request->input('location');
        $career->salary=$request->input('salary');
        $career->timing=$request->input('timing');
        if($request->hasFile('cover_image'))
        {
        $career->image= $FileNameToStore;
        }

        if($status=="on")
        {
            $career->status='1';
        }
        else
        {
            $career->status='0';
        }
        $career->save();

        return redirect('/careers')->with('success','Career updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $career =Career::find($id);

        if($career->image !='noimage.jpg')
        {
            $path = public_path()."/career_images/".$career->cover_image;
            unlink($path);
        }
        $career->delete();
        return redirect('/career')->with('success','Career Removed');
    }
}
