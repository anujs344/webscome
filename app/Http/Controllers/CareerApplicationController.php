<?php

namespace App\Http\Controllers;

use App\Mail\CareerMail;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class CareerApplicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->only(['sendMail','download']);
        $this->middleware('team_member')->only(['index']);
    }

    public function index()
    {
        $applications= CareerApplication::all();
        //$= careers::orderBy('id','desc')->paginate(10);
        return view('admin.career_applications.index')->with('applications',$applications);
    }


    //Function to send the mail
    public function sendMail($id)
    {
        $candidate= CareerApplication::find($id);
        $details=[
            'title'=> 'Application Mail From Webscome',
            'body'=>  'Your Application has been received !! We will get back to you soon'
        ];

        Mail::to($candidate->email)->send(new CareerMail($details));
        return redirect('/career_applications')->with('success','Mail sent');

    }

    //function to store career applications

    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'cv'=>'mimes:pdf|nullable|max:1999',//2mb
        ]);

        //Handle cover_image
        if($request->hasFile('cv'))
        {
            //Get filename with ext
            $FileNameWidExt=$request->file('cv')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($FileNameWidExt, PATHINFO_FILENAME);
            //Get just extension
            $extension=$request->file('cv')->getClientOriginalExtension();
            //Filename to store

            $FileNameToStore= $filename.'_'.time().'.'. $extension;
            //Upload file

            $path=$request->file('cv')->move('career_application_cvs',$FileNameToStore);
        }else{
            $FileNameToStore="nofile";
        }


        //create category
        $career =new CareerApplication();
        $career->name= $request->input('name');
        $career->email= $request->input('email');
        $career->address= $request->input('address');
        $career->city=$request->input('city');
        $career->phone=$request->input('phone');
        $career->pin_code=$request->input('pincode');

        $career->cv= $FileNameToStore;

        $career->save();

        return redirect('/career')->with('success','Application Submitted');

    }

    //function to download cv
    public function download($id)
    {
        $candidate= CareerApplication::find($id);
        $pathToFile = public_path().'/career_application_cvs/'.$candidate->cv;
        return response()->download($pathToFile);
    }
}
