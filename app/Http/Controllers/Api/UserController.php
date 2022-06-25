<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function update_address(Request $request)
    {
        $user=User::find(Auth::user()->id);

        $user->phone=$request->phone;
        $user->pincode=$request->pincode;
        $user->address=$request->address;
        $user->city=$request->city;
        $user->state=$request->state;
        $user->landmark=$request->landmark;
        $user->alternate_phone=$request->alternate_phone;
        $user->alternate_phone=$request->alternate_phone;

        $user->save();
        return response()->json(['success' => 'address added'], 200);


    }

    public function update_profile()
    {
        $user=User::find(Auth::user()->id);
        return response()->json($user, 200);
        return view('servicewebscome.update_profile')->with('user',$user);


    }

    public function store(Request $request)
    {
        $user=User::find(Auth::user()->id);

        $user->phone=$request->phone;
        $user->name=$request->name;
        $user->email=$request->email;

        $user->save();
        return response()->json(['success' => 'profile changed'], 200);


    }

    public function booked_services()
    {
        $cart_contents= Order::join('child_categories','orders.product_id','=','child_categories.id')->join('professionals','orders.professional_id','=','professionals.id')->get(['orders.*','child_categories.title AS service','child_categories.image AS service_image','child_categories.regular_price AS price','professionals.name AS professional_name']);
        $cart_contents=$cart_contents->where('user_id',Auth::user()->id);
        return response()->json($cart_contents, 200);


    }
}
