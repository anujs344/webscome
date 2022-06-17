<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('team_member',['except' => ['store']]);
    }

    public function index()
    {
        $requests= Contact::all();
        //$= careers::orderBy('id','desc')->paginate(10);
        return view('admin.contact_us.index')->with('requests',$requests);
    }

    public function store(Request $request)
    {
        $requests =new Contact();
        $requests->name= $request->input('name');
        $requests->email= $request->input('email');
        $requests->message= $request->input('message');
        $requests->mobile= $request->input('mobile');
        $requests->save();
        return redirect('/contact')->with('success','Message sent will contact you soon..');

    }

    public function destroy($id)
    {
        $request =Contact::find($id);


        $request->delete();
        return redirect()->back()->with('error','Deleted successfully');


    }

}
