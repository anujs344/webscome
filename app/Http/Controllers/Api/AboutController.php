<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;


class AboutController extends Controller
{
    public function index()
    {
        $about_us= About::findOrFail(1);
        return response()->json($about_us, 200);
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
        return response()->json(['success' => 'About Us updated successfully '], 200);
    }
}
