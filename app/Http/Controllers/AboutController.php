<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;


class AboutController extends Controller
{
    public function index()
    {
        $about_us= About::findOrFail(1);
        return view('admin.about_us.index')->with('about_us',$about_us);
    }

    public function update(Request $request)
    {
        $this->validate($request,[

            'whoWeAre'=>'required',
        ]);

        //create category
        $about_us =About::find(1);
        $about_us->whoWeAre= $request->input('whoWeAre');
        $about_us->save();

        return redirect('/about_us')->with('success','About Us updated successfully');
    }
}
