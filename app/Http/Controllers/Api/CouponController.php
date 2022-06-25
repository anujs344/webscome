<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->only(['create','store','update','edit','destroy']);
        $this->middleware('team_member')->only(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons= DB::table('coupons')
            ->select('coupons.*')
            ->paginate(10);
        return view('admin.coupons.index')->with('coupons',$coupons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();

        return view('admin.coupons.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'code'=>'required',
            'percentage' =>'required',
            'min_amount' =>'required',
            'expiry_date' =>'required|date',
        ]);

        //Handle cover_image

        //create category
        $coupon =new Coupon();
        $coupon->code= $request->input('code');
        $coupon->percentage= $request->input('percentage');

        //$coupon->maxusage=4;
        $coupon->min_amount= $request->input('min_amount');
        $coupon->expiry_date= $request->input('expiry_date');
        $coupon->status='1';

        $coupon->save();

        return redirect('/coupons')->with('success','Coupon created');
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
        //to get all coupons
        $coupon= Coupon::find($id);

        //passing coupon and all categories;
        return view('admin.coupons.edit')->with('coupon',$coupon);
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
        $this->validate($request,[
            'code'=>'required',
            'percentage' =>'required',
            'cat_id'=>'nullable',
            'min_amount' =>'required',
            'expiry_date' =>'required|date|after_or_equal:now',
            //'cover_image'=>'image|nullable|max:1999',//2mb
        ]);

        //Handle cover_image

        //create category
        $coupon =Coupon::find($id);
        $coupon->code= $request->input('code');
        $coupon->percentage= $request->input('percentage');

        //$coupon->maxusage=4;
        $coupon->min_amount= $request->input('min_amount');
        $coupon->expiry_date= $request->input('expiry_date');
        $coupon->status='1';

        $coupon->save();

        return redirect('/coupons')->with('success','Coupon updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon =Coupon::find($id);

        $coupon->delete();
        return redirect('/coupons')->with('success','Coupon Removed successfully.');
    }
}
