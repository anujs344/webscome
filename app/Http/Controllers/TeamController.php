<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['create','store']);
        $this->middleware('team_member')->only(['index']);
    }

    function index(){
        $teams = Team::where('name','!=','')->paginate(3);
        return view('admin.teams.index',compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
            'description'=>'required',
            'cover_image'=>'image|nullable|max:5000',//2mb
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
            $path= $request->file('cover_image')->move('team_members',$FileNameToStore);
        }else{
            $FileNameToStore="noimage.jpg";
        }


        //create category
        $member =new Team();
        $member->name= $request->input('name');
        $member->designation=$request->input('designation');
        $member->description= $request->input('description');
        $member->img_url =  $FileNameToStore;
        $member->save();

        return redirect('/teams')->with('success','New member Added');

    }
}
