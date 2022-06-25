<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;


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
         return response()->json($requests, 200);
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
         return response()->json(['success' => 'Message sent will contact you soon...'], 200);
 
     }
 
     public function destroy($id)
     {
         $request =Contact::find($id);
 
 
         $request->delete();
         return response()->json(['error' => 'Deleted successfully'], 200);

 
 
     }
}
