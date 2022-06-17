<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use App\Models\Professional;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;

class CartController extends Controller
{
    //to store the product to the cart
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($id)
    {
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_no = $id;
        $cart->quantity = 1;
        $cart->save();

        return redirect('/cart')->with('success', 'Added to cart');

    }

    //to shoew the cart
    public function index()
    {
        $cart_contents = Cart::join('child_categories', 'carts.product_no', '=', 'child_categories.id')->get(['carts.*', 'child_categories.title AS service', 'child_categories.image AS service_image', 'child_categories.regular_price AS regular_price', 'child_categories.discounted_price AS discounted_price']);
        $cart_contents = $cart_contents->where('user_id', Auth::user()->id);
        return view('servicewebscome.carts.index')->with('cart_contents', $cart_contents);
    }

    //to show the cart payment

    public function applycoupon(Request $request)
    {
        $coupon_code = $request->get('coupon');
        $order_val = $request->get('order_val');
        if (Coupon::where('code', $coupon_code)->exists()) {
            $db_coupon = Coupon::where('code', $coupon_code)->first();
            if ((integer)$db_coupon->min_amount > (integer)$order_val) {
                return response()->json([
                    'error' => 'Minimum order value should be ' . $db_coupon->min_amount,
                ]);
            } else {
                $percentage_off = $db_coupon->percentage;
                $dis_val = (($request->get('order_val') * floatval($percentage_off)) / 100);
                return response()->json([
                    'discount' => $dis_val,
                ]);
            }
        } else {
            return response()->json([
                'error' => 'Invalid Coupon Code',
            ]);
        }

    }


    //to show the orderdetails
    public function placeorder(Request $request)
    {
        // $cart_contents = Cart::where('user_id', auth()->user()->id);
        
        $cart_contents = Cart::join('child_categories', 'carts.product_no', '=', 'child_categories.id')->where('user_id', auth()->user()->id)
        ->get(['carts.*', 'child_categories.title AS service', 'child_categories.image AS service_image', 'child_categories.regular_price AS price']);
     

        $service_dates = $request->get('service_date');
        $order_total = (int)$request->get('final_payment_value');
        $payment_method = $request->get('pay');


        if ($request->get('is_coupon_applied') == "true") {
            $coupon = $request->get('coupon');
        }
        $i = 0;
        if ($payment_method == 'cod') {
            $order = new Order();
            $order->user_id = $cart_contents[0]->user_id;
            $order->payment_mode = "cod";
            $order->order_amount = $order_total;
            if ($request->get('is_coupon_applied') == "true") {
                $order->applied_promo_code = $coupon;
                $order->promo_discount = $request->get('coupon_discount_applied');
            }
            $order->order_amount = $order_total;
            $order->order_city = $request->get('order_city_name');
            $order->order_address= $request->get('order_address');
            $order->order_pincode= $request->get('order_pincode');
            if ($order->save()) {
                $order_id = $order->id;
                foreach ($cart_contents as $cart_content) {
                    $service_order = new ServiceOrder();
                    $service_order->order_id = $order_id;
                    $service_order->service_id = $cart_content->product_no;
                    $service_order->service_quantity = $cart_content->quantity;

                    $service_order->serviced_date = $service_dates[$i++];
                    $service_order->service_order_status = '1';
                    $service_order->save();
                }

                Cart::where('user_id',Auth::id())->delete();

//                $orders = Order::join('service_orders', 'orders.id', '=', 'service_orders.order_id')
//                    ->join('child_categories', 'service_orders.service_id', '=', 'child_categories.id')
//                    ->get(['orders.*', 'service_orders.*', 'child_categories.title AS service', 'child_categories.image AS service_image', 'child_categories.regular_price AS regular_price', 'child_categories.discounted_price AS discounted_price']);
//                $orders = $orders->where('user_id', Auth::user()->id);
//                $orders = $orders->where('service_order_status', '1');
                return redirect()->to(route('carts.orderdetails'));
            }
        } else { // if razorpay is opted
//            dd($cart_contents[0]->user_id);
            $order = new Order();
            $order->user_id = $cart_contents[0]->user_id;
            $order->payment_mode = "razorpay";
            $order->order_amount = $order_total;
            if ($request->get('is_coupon_applied') == "true") {
                $order->applied_promo_code = $coupon;
                $order->promo_discount = $request->get('coupon_discount_applied');
            }
            $order->order_city = $request->get('order_city_name');
            $order->order_address= $request->get('order_address');
            $order->order_pincode= $request->get('order_pincode');
            if ($order->save()) {
                $order_id = $order->id;
                $i = 0;
                foreach ($cart_contents as $cart_content) {
                    $service_order = new ServiceOrder();
                    $service_order->order_id = $order_id;
                    $service_order->service_id = $cart_content->product_no;
                    $service_order->service_quantity = $cart_content->quantity;
                    $service_order->serviced_date = $service_dates[$i++];
                    $service_order->service_order_status = '0';
                    $service_order->save();
                }
                $api = new Api("rzp_live_G5XMGhycexOpb5", "JmyEE7Nalg79tl9UgsvS3oO0");
                $order = $api->order->create(array('receipt' => rand(10000, 99999), 'amount' => $order_total * 100, 'currency' => 'INR')); // Creates order
                $razorpay_order_id = $order['id'];
                $paymt = new Payment();

                $paymt->order_id = $order_id;
                $paymt->razorpay_order_id = $razorpay_order_id;
                $paymt->amount = $order_total;
                $paymt->save();
                $data = array(
                    'razorpay_order_id' => $razorpay_order_id,
                    'amount' => $order_total,
                    'order_id' => $order_id,
                    'clicked' => true,
                );
            }
            return redirect()->to(route('carts.razorpay'))->with('data', $data);
        }
    }


    public function pay(Request $request)
    {
        $razorpay_order_id = $request->get('razorpay_order_id');
        $data = $request->all();
        $paymt = Payment::where('razorpay_order_id', $razorpay_order_id)->latest('created_at')->first();
        $paymt->payment_done = true;
        $paymt->razorpay_payment_id = $data['razorpay_payment_id'];
        if ($paymt->save()) {
            //order table update
            $order = Order::where('id', $request->get('order_id'))->latest('created_at')->first();
            $order->payment_status = '1';
            $order->payment_id = $paymt->razorpay_payment_id;
            $order->save();

            $service_orders = ServiceOrder::where('order_id', $order->id)->get();
            foreach ($service_orders as $ser) {
                $ser->service_order_status = '1';
                $ser->save();
            }

            $cart_contents = Cart::where('user_id', '=', Auth::id())->delete();
            return redirect('/order-details');
        } else {
            return redirect('/error');
        }
    }


    public function orderdetails(Request $request)
    {
        $orders = Order::join('service_orders', 'orders.id', '=', 'service_orders.order_id')
            ->join('child_categories', 'service_orders.service_id', '=', 'child_categories.id')
            ->where('user_id', Auth::user()->id)
            ->where('service_order_status', '!=','0')
            ->orderBy('orders.created_at','DESC')
            ->get(['orders.*', 'service_orders.*', 'child_categories.title AS service', 'child_categories.image AS service_image', 'child_categories.regular_price AS regular_price', 'child_categories.discounted_price AS discounted_price']);
        return view('servicewebscome.carts.orderdetails', compact('orders'));
    }

    public function cart_quantity_increment(Request $request){
        $cart_content= Cart::where('id',$request->get('id'))->where('user_id',Auth::id())->first();
        $cart_content->quantity= $request->get('quantity')+1;
        $cart_content->save();
    }
    public function cart_quantity_decrement(Request $request){
        $cart_content= Cart::where('id',$request->get('id'))->where('user_id',Auth::id())->first();
        $cart_content->quantity= $request->get('quantity')- 1;
        $cart_content->save();
    }

    public function removefromcart(Request $request)
    {
        $cart_content_id = $request->get('id');
        $cart_content = Cart::where('id', '=', $cart_content_id)->where('user_id', '=', Auth::id());
        $cart_content->delete();
    }

    public function deleteorder($id)
    {
        $order = Order::find($id);
        $order->order_status = '5';
        $order->save();

        return redirect('/cart/orderdetails')->with('success', 'Order Cancelled');
    }
    
    public function premium_invoice(){
        if(!isset($_GET['user_id']) || Auth::id() !=$_GET['user_id'] ) abort(403);
        $user_id= $_GET['user_id'];
        $service_date= DB::table('combo_services')->where('user_id',$user_id)
            ->where('payment_status','=',1)->where('payment_status','!=',null)->get(['created_at'])->first();
        $plan_date= date('d-m-Y', strtotime($service_date->created_at));
        $user_name= Auth::user()->name;
        $user_email= Auth::user()->email;
        return view('servicewebscome.premium_invoice',compact('plan_date','user_name','user_email'));
    }
}
