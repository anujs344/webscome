<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Cart;
use App\Models\ComboService;
use App\Models\ComboServicePayment;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;

class ComboServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    function placeorder(Request $request)
    {
        $combo_service = new ComboService();
        $combo_service->user_id = Auth::id();
        $combo_service->save();
        $combo_service_id = $combo_service->id;

        $api = new Api("rzp_live_G5XMGhycexOpb5", "JmyEE7Nalg79tl9UgsvS3oO0");
        $order = $api->order->create(array('receipt' => rand(10000, 99999), 'amount' => 1999 * 100, 'currency' => 'INR')); // Creates order
        $razorpay_order_id = $order['id'];
        $combo_service_payment = new ComboServicePayment();
        $combo_service_payment->razorpay_order_id = $razorpay_order_id;
        $combo_service_payment->combo_service_id = $combo_service_id;
        $combo_service_payment->save();
        $data = array(
            'razorpay_order_id' => $razorpay_order_id,
            'combo_service_id' => $combo_service_id,
            'clicked' => true,
        );
        return redirect()->to(route('combo_service.razorpay'))->with('data', $data);
    }

    public function pay(Request $request)
    {
        $razorpay_order_id = $request->get('razorpay_order_id');
        $data = $request->all();
        $paymt = ComboServicePayment::where('razorpay_order_id', $razorpay_order_id)->latest('created_at')->first();
        $paymt->payment_done = true;
        $paymt->razorpay_payment_id = $data['razorpay_payment_id'];
        if ($paymt->save()) {
            //order table update
            $combo_service= ComboService::where('id', $request->get('combo_service_id'))->latest('created_at')->first();
            $combo_service->payment_status = 1;
            $combo_service->payment_id = $paymt->razorpay_payment_id;
            $combo_service->save();
            return redirect('/');
        } else {
            return redirect('/error');
        }
    }
    
    public function all_combo_orders(){
        $combo_service_orders= DB::table('combo_services')
            ->join('combo_service_payments','combo_services.id','=','combo_service_payments.combo_service_id')
            ->where('combo_services.payment_status','=',1)
            ->get();
        return view('admin.combo_orders.all_combo_orders',compact('combo_service_orders'));
    }
}
