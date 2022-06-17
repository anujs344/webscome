<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Professional;


use App\Models\ProfessionalPayment;
use App\Models\ServiceOrder;
use DB;
use Dompdf\Dompdf;


use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        // $this->middleware('admin')->only(['index','make_approval',
        //     'edit','destroy','change_order_professional','professional_payment']);
        // $this->middleware('team_member')->only(['all_orders','order_invoice','download_pdf']);
        $this->middleware('team_member',['except' => ['user_order_invoice']]);
    }

    public function index()
    {
        $orders = Order::join('service_orders', 'orders.id', '=', 'service_orders.order_id')
            ->join('child_categories', 'service_orders.service_id', '=', 'child_categories.id')
            ->join('users','orders.user_id','=','users.id')
            ->where('service_order_status','!=','0')
            ->get(['orders.*', 'service_orders.*', 'child_categories.title AS service', 'child_categories.image AS service_image',
                'child_categories.regular_price AS regular_price', 'child_categories.discounted_price AS discounted_price',
                'users.*']);
        // $orders=$orders->where('service_order_status','!=','0');
        $orders= $orders->reverse();
        return view('admin.orders.new_orders')->with('orders',$orders);
    }

    public function all_orders()
    {
        $orders = Order::join('service_orders', 'orders.id', '=', 'service_orders.order_id')
            ->join('child_categories', 'service_orders.service_id', '=', 'child_categories.id')
            ->join('users','orders.user_id','=','users.id')
            ->where('service_orders.service_order_status','!=','0')
            ->orderBy('service_orders.created_at','DESC')
            ->get(['orders.*', 'service_orders.*', 'child_categories.title AS service',
                'child_categories.image AS service_image', 'child_categories.regular_price AS regular_price',
                'child_categories.discounted_price AS discounted_price',
                'users.*','users.name as user_name']);
        return view('admin.orders.all_orders')->with('orders',$orders);
    }

//    public function cancelled()
//    {
//
//        $orders= Order::join('child_categories','orders.product_id','=','child_categories.id')->join('professionals','orders.professional_id','=','professionals.id')->join('users','orders.user_id','=','users.id')->get(['orders.*','child_categories.title AS service','child_categories.image AS service_image','child_categories.regular_price AS price','professionals.name AS professional_name','users.name AS user_name','users.address AS user_address','users.city AS user_city']);
//
//        $orders=$orders->where('order_status','5');
//
//
//
//        return view('admin.orders.cancelled_orders')->with('orders',$orders);
//    }

    public function make_approval($id)
    {
        $order= Order::find($id);
        $order->admin_approval='1';
        $order->save();

        return redirect()->route('new_orders')->with('success','forwarded to professional');
    }

    public function order_invoice($id)
    {
        $order= Order::join('service_orders', function($join) use ($id) {
                $join->on('orders.id', '=', 'service_orders.order_id')
                    ->where('orders.id', '=', $id);
            })->join('child_categories','service_orders.service_id','=','child_categories.id')
            ->join('users','orders.user_id','=','users.id')
            ->where('service_orders.order_id','=',$id)
            ->get(['orders.*','service_orders.*','child_categories.*','child_categories.title as service'
            , 'users.name as user_name','users.landmark as user_landmark','users.address as user_address'
            ,'users.city as user_city','users.pincode as user_pincode','users.email as user_email']);
//        dd($order);
        return view('servicewebscome.invoice')->with('order',$order);
    }
    
    public function user_order_invoice($id){
        $order= Order::join('service_orders', function($join) use ($id) {
            $join->on('orders.id', '=', 'service_orders.order_id')
                ->where('orders.id', '=', $id);
        })->join('child_categories','service_orders.service_id','=','child_categories.id')
            ->join('users','orders.user_id','=','users.id')
            ->where('service_orders.order_id','=',$id)
            ->get(['orders.*','service_orders.*','child_categories.*','child_categories.title as service'
                , 'users.name as user_name','users.landmark as user_landmark','users.address as user_address'
                ,'users.city as user_city','users.pincode as user_pincode','users.email as user_email']);

        return view('servicewebscome.invoice')->with('order',$order);
    }

    public function download_pdf($id)
    {
        $web= Order::join('child_categories','orders.product_id','=','child_categories.id')->join('professionals','orders.professional_id','=','professionals.id')->join('users','orders.user_id','=','users.id')->get(['orders.*','child_categories.title AS service','child_categories.image AS service_image','child_categories.regular_price AS regular_price','child_categories.discounted_price AS discounted_price','professionals.name AS professional_name','users.name AS user_name','users.address AS user_address','users.city AS user_city','users.landmark AS user_landmark','users.state AS user_state','users.pincode AS user_pincode','users.phone AS user_phone','users.alternate_phone AS user_alternate_phone']);

        foreach ($web as $temp) {
            if ($temp->id==$id) {
                $order=$temp;
            }
        }

        $html=view('servicewebscome.pdf')->with('order',$order);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }

//    public function cancelled_order_delete($id)
//    {
//        $order=Order::find($id);
//
//        $order->delete();
//        return redirect('/cancelled_orders')->with('error','Record Removed');
//
//
//    }

    public function change_order_professional($order_id, $service_id,Request $request)
    {
        $service_order= ServiceOrder::where('order_id',$order_id)->where('service_id',$service_id)->first();
        $order= Order::where('id',$order_id)->first();
        $order->admin_approval=1;
        $order->save();

        $key= 'professional-'.$order_id.'-'.$service_id;
        $professional_id = ($request->get($key));
        if($service_order->service_order_status=='3' || $service_order->service_order_status=='2'){ //some new professional is assigned the service
            $service_order->service_order_status='1';
            $service_order->assigned_professional_id = $professional_id;
            $service_order->save();
            return redirect()->back();
        }
        $service_order->assigned_professional_id = $professional_id;
        $service_order->save();
        return redirect('/new_orders')->with('success','Professional Assignment Successfull');
    }

    public function professional_payment()
    {
        $payments=ProfessionalPayment::join('child_categories','professional_payments.service_id','=','child_categories.id')->get(['professional_payments.*','child_categories.title AS service']);
        return view('admin.professional_requests.professional_payments')->with('payments',$payments);
    }

    public function changeorderdate(Request $request){
        $service_order= ServiceOrder::where('order_id',$request->get('order_id'))
            ->where('service_id',$request->get('service_id'))->first();
        $service_order->serviced_date= $request->get('service_date');
        $service_order->save();
        return redirect()->back()->with('success', 'Service Date updated for the placed order');
    }


}
