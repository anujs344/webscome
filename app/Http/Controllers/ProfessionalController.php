<?php

namespace App\Http\Controllers;

use DB;
use App\Mail\ServiceDone;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Order;
use App\Models\ProfessionalCommission;
use App\Models\ProfessionalPayment;
use App\Models\ServiceOrder;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Mail\CareerMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Professional;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProfessionalController extends Controller
{
    private $commission;
    public function __construct()
    {
        $this->middleware('team_member')->only(['professional_requests','makeVerified']);
        $this->middleware('admin')->only(['delete_professional']);
    }
    public function index(Request $request)
    {
        if($request->session()->has('professional')) {
            $professional = $request->session()->get('professional');
            return redirect()->to('/loginVerification/success');
        }

        $categories= Category::all();
        return view('professional_webscome.index',compact('categories'));
    }

    public function login(Request $request)
    {
        if($request->session()->has('professional')){
            $professional= $request->session()->get('professional');
            return redirect()->to('/loginVerification/success');
        }
        return view('professional_webscome.login');
    }

    public function signup()
    {
        $categories=Category::all();
        return view('professional_webscome.register')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signup_success(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required | unique:professionals',
            'phone'=>'required',
            'experience'=>'required',
            'line1'=>'required',
            'line2'=>'required',
            'city'=>'required',
            'pincode'=>'required',
            'password'=>'required |min:5',
            'aadhar_image'=>'image|nullable|max:5000',//5mb
            'other_document'=>'image|nullable|max:5000',//5mb
        ]);

        //Handle cover_image
        if($request->hasFile('aadhar_image'))
        {

            //Get filename with ext
            $FileNameWidExt=$request->file('aadhar_image')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($FileNameWidExt, PATHINFO_FILENAME);
            //Get just extension
            $extension=$request->file('aadhar_image')->getClientOriginalExtension();
            //Filename to store
            $FileNameToStore= $filename.'_'.time().'.'. $extension;
            //Upload image
            $path=$request->file('aadhar_image')->move('professional_images/aadhar_images',$FileNameToStore);
        }else{
            //$FileNameToStore="noimage.jpg";
            return back()->with('error',' Aadhar image required');
        }

        //other document upload
        if($request->hasFile('other_document'))
        {
            //Get filename with ext
            $FileNameWidExt=$request->file('other_document')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($FileNameWidExt, PATHINFO_FILENAME);
            //Get just extension
            $extension=$request->file('other_document')->getClientOriginalExtension();
            //Filename to store
            $FileNameToStore2= $filename.'_'.time().'.'. $extension;
            //Upload image
            $path=$request->file('other_document')->move('professional_images/other_document',$FileNameToStore2);
        }else{
            $FileNameToStore2="noimage.jpg";
        }

        //create professional
        $sub_service_id = SubCategory::where('title',$request->get('sub_service'))->value('id');
        $professional =new Professional();
        $professional->name= $request->input('name');
        $professional->email= $request->input('email');
        $professional->phone= $request->input('phone');
        $professional->service_id = $request->input('service');
        $professional->sub_service_id = $sub_service_id;
        $professional->experience= $request->input('experience');
        $professional->address= $request->input('line1')." ".$request->input('line2');
        $professional->city= $request->input('city');
        $professional->pincode= $request->input('pincode');
        $professional->password= Hash::make($request->get('password'));


        $professional->aadhar_card= $FileNameToStore;
        $professional->other_document= $FileNameToStore2;
        $professional->save();
        return view('professional_webscome.signup_success')->with('success','You have signed up as a professional!! Please wait to get verified');
    }


    public function professional_requests()
    {
        $professionals= Professional::join('categories','professionals.service_id','=','categories.id')->get(['professionals.*','categories.title AS title2']);
        return view('admin.professional_requests.index')->with('professionals',$professionals);
    }

    public function makeVerified($id)
    {
        $professional= Professional::find($id);
        //return $professionals;
        //$= careers::orderBy('id','desc')->paginate(10);
        $professional->verification_status='1';
        $professional->save();

        $details=[
            'title'=> 'MAIL FROM WEBSCOME',
            'body'=> 'Your Account is verified as a professional you can login to the account using credentials used during signup'
        ];

        Mail::to($professional->email)->send(new CareerMail($details));

        return redirect('/professional-requests')->with('success','Account is verified and Mail Sent.');
    }

    public function verified_professionals()
    {
        $professionals= Professional::join('categories','professionals.service_id','=','categories.id')->get(['professionals.*','categories.title AS title2']);


        return view('admin.professional_requests.verified_professionals')->with('professionals',$professionals);

    }

    public function delete_professional($id)
    {
        $professional= Professional::where('verification_status', '=', '1')->get();
        if($professional->aadhar_card !='noimage.jpg')
        {
            $path = public_path()."/professional_images/aadhar_images/".$professional->aadhar_card;
            unlink($path);
            Storage::delete('professional_images/aadhar_images/'.$professional->aadhar_card);
        }
        if($professional->other_document !='noimage.jpg')
        {
            $path = public_path()."/professional_images/professional/other_document/".$professional->other_document;
            unlink($path);
        }
        $professional->delete();
        return redirect('/verified_professionals')->with('success','Removed successfully..');


    }

    public function loginVerification(Request $request)
    {
        $professional= Professional::where('email', '=', $request->email)->first();
        if(!empty($professional)){
            $pass= $request->get('password');
        }else{
            return redirect('/professional/login')->with('error','Email Not Registered...');
        }
        $professional_password= $professional->password;
        if(!Hash::check($pass,$professional_password)){
            return redirect('/professional/login')->with('error','Incorrect password...');
        }
        if($professional->verification_status =='1')
        {
            $request->session()->put('professional',$professional);
            $service=Category::find($professional->service_id);
            return redirect()->to('/loginVerification/success');
        }
        else{
            return redirect('/professional/login')->with('error','You are yet not verified...');

        }


    }

    //return dashboard
    public function dashboard($id)
    {
        $professional= Professional::find($id);
        //return $professional;

            return view('professional_webscome.dashboard')->with('professional',$professional);




    }
    //to find the service orders of the professional

    public function service_order($id)
    {
        $orders= Order::join('service_orders','orders.id','=','service_orders.order_id')
            ->join('child_categories','service_orders.service_id','=','child_categories.id')
            ->join('users','orders.user_id','=','users.id')
            ->where('service_orders.assigned_professional_id','=',$id)
            ->get(['orders.*','child_categories.title AS service','child_categories.image AS service_image',
                'service_orders.*',
                'child_categories.regular_price AS regular_price','child_categories.discounted_price AS discounted_price',
                'users.name AS user_name','users.phone AS user_phone','users.address AS user_address',
                'users.pincode AS user_pincode']);

        $orders=$orders->where('admin_approval','1');

        $professional=Professional::find($id);

        return view('professional_webscome.service_order')->with('orders',$orders)->with('professional',$professional);
    }

    public function accept_order(Request $request)
    {
        $service_order= ServiceOrder::where('order_id', $request->get('order_id'))
                    ->where('service_id',$request->get('service_id'))->first();
        $service_order->service_order_status='2';
        $service_order->save();
        return redirect()->back()->with('success','Service request accepted by you');
    }

    public function reject_order(Request $request)
    {
        $service_order= ServiceOrder::where('order_id', $request->get('order_id'))
            ->where('service_id',$request->get('service_id'))->first();
        $service_order->service_order_status='3';
        $service_order->save();
        return redirect()->back()->with('error','You just declined a service order');

    }

    public function complete_order(Request $request)
    {
//        $commission= ProfessionalCommission::find(1);
//        $commission_percent=$commission->professional_commission;
        $service= ServiceOrder::where('order_id', $request->get('order_id'))
            ->where('service_id',$request->get('service_id'))->first();
        $service->service_order_status='4';
        $user= DB::table('orders')->join('users','orders.user_id','=','users.id')
                ->where('orders.id','=',$request->get('order_id'))
            ->select('users.email')
            ->get();
        $user_email= ($user[0]->email);
        $details= [
            'title'=> 'Service Done For your Service Order',
            'body'=> 'Service has been completed for your service order. Please share your feedback for the service. You can view order invoice 
            in your webscome account'
        ];
        Mail::to($user_email)->send(new ServiceDone($details));
        $service->save();

//        $payment= ProfessionalPayment::where('professional_id','=',$orders->professional_id)->first();
//        $amount=ChildCategory::find($orders->product_id);
//        $service_amount=$amount->discounted_price*$commission_percent/100;
//        $payment->payment_amount+=$amount->$service_amount;
//
//        $payment->save();
//        $orders->save();
//        $id=$request->professional_id;

        return redirect()->back()->with('success','Service Marked as completed');

    }

    public function professional_commission(){
        $commission=ProfessionalCommission::findOrFail(1);
        return view('admin.orders.professional_commission')->with('commission',$commission);
    }

    public function update_professional_commission(Request $request){
        $commision=ProfessionalCommission::find(1);
        $commision->professional_commission=$request->commission;
        $commision->save(['timestamps' => false]);
        return redirect()->route('professional_commission')->with('success','commission updated');

    }

    public function wallet($id)
    {
        $orders= Order::join('users','orders.user_id','=','users.id')->join('child_categories','orders.product_id','=','child_categories.id')->get(['orders.*','child_categories.title AS service','child_categories.image AS service_image','child_categories.regular_price AS regular_price','child_categories.discounted_price AS discounted_price','users.name AS user_name','users.phone AS user_phone','users.address AS user_address','users.pincode AS user_pincode','users.city AS user_city','users.state AS user_state']);
        $orders=$orders->where('professional_id',$id);
        $orders=$orders->where('order_status','4');

        $professional=Professional::find($id);
        $commission=ProfessionalCommission::find(1);

        return view('professional_webscome.wallet')->with('orders',$orders)->with('professional',$professional)->with('commission',$commission);
    }

    public function edit_account(Request $request)
    {
        $professional= Professional::find($request->professional_id);
        $services=Category::all();
        $service=Category::find($professional->service_id);
        return view('professional_webscome.edit_account')->with('professional',$professional)->with('services',$services)->with('service',$service->title);
    }

    public function update(Request $request)
    {
        $professional= Professional::find($request->get('professional_id'));
        $professional->name=$request->input('name');
        $professional->email=$request->input('email');
        $professional->phone=$request->input('phone');
        $professional->experience=$request->input('experience');
        $professional->save();
        return redirect()->route('proWebscome');



    }
    
    
    function showForgetPasswordForm(){
        return view('professional_webscome.forgetPassword');
    }

    function submitForgetPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:professionals',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    function showResetPasswordForm($token){
        return view('professional_webscome.forgetPasswordLink', ['token' => $token]);
    }

    function submitResetPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:professionals',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = Professional::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/professional/login')->with('message', 'Your password has been changed!');
    }



}

