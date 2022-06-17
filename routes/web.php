<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChildCategoryController;
use App\Http\Controllers\ComboServiceController;
use App\Http\Controllers\ServiceFeedbackController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TeamController;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Category;
use App\Models\Order;
use App\Models\Professional;
use App\Models\SubCategory;
use App\Models\Team;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\SpareController;

use App\Http\Controllers\CouponController;

use App\Http\Controllers\SettingController;

use App\Http\Controllers\CareerApplicationController;

use App\Http\Controllers\ProfessionalController;

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Session;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $services=Category::where('status','=','1')->get();

    return view('webscome.index')->with('services',$services);
})->name('webscome');

Route::post('/changeStatus/{id}', [SettingController::class, 'change_status'])->name('changeStatus');
Route::post('/changeStatus_subCat/{id}', [SettingController::class, 'change_status_subCat'])->name('changeStatus_subCat');
Route::post('/changeStatus_childCat/{id}', [SettingController::class, 'change_status_childCat'])->name('changeStatus_childCat');
Route::post('/changeStatus_careers/{id}', [SettingController::class, 'change_status_careers'])->name('changeStatus_careers');
Route::get('/career_applications', [CareerApplicationController::class, 'index'])->name('career_applications');
Route::post('/career_applications/store', [CareerApplicationController::class, 'store'])->name('career_applications.store');
Route::post('/career_applications/download/{id}', [CareerApplicationController::class, 'download'])->name('career_applications.download');

Route::post('/sendMail/{id}', [CareerApplicationController::class, 'sendMail'])->name('sendMail');
Route::get('/about_us', [AboutController::class, 'index'])->name('about_us');
Route::post('/about_us/update', [AboutController::class, 'update'])->name('about_us.update');
Route::redirect('/admin', 'login');
Route::get('/booked_services', [UserController::class, 'booked_services'])->name('user.booked_services');

//contact_us at admin side
Route::get('/contact_us', [ContactController::class, 'index'])->name('admin.contact_us');
Route::post('/contact_us/store', [ContactController::class, 'store'])->name('contact_us.store');
Route::delete('/contact_us/delete/{id}', [ContactController::class, 'destroy'])->name('contact_us.delete');

//Orders routes admin side
Route::get('/all_orders', [OrderController::class, 'all_orders'])->name('admin.all_orders');

Route::get('/new_orders', [OrderController::class, 'index'])->name('new_orders');
Route::get('/cancelled_orders', [OrderController::class, 'cancelled'])->name('cancelled_orders');
Route::get('/make_approval/{id}',[OrderController::class, 'make_approval'])->name('order.make_approval');
Route::get('/order_invoice/{id}',[OrderController::class, 'order_invoice'])->name('order.invoice');
Route::get('/order_pdf/{id}',[OrderController::class, 'download_pdf'])->name('download_pdf');
Route::delete('/order_cancelled_delete/{id}',[OrderController::class, 'cancelled_order_delete'])->name('cancelled_orders.delete');
Route::post('/change_order_professional/{order_id}/{service_id}',[OrderController::class, 'change_order_professional'])->name('change_order_professional');
Route::post('/changeorderdate',[OrderController::class, 'changeorderdate'])->name('changeorderdate');

Route::get('/professional_payment', [OrderController::class, 'professional_payment'])->name('admin.professional_payment');


//professionals route
Route::get('/professional', [ProfessionalController::class, 'index'])->name('proWebscome');
Route::post('/professional/account_edit', [ProfessionalController::class, 'edit_account'])->name('professional_account_edit');
Route::post('/professional/update', [ProfessionalController::class, 'update'])->name('professional.update');

Route::get('/professional/login', [ProfessionalController::class, 'login'])->name('professional.login');

//Route::get('/checkpass',function (){
//
//    $b= '$2y$10$AsmsVeGC4xEk6ipgPOAWAOyf8Ed4p.r0RziQx9ZfKa.hl7J7.fMny';
//    if(Hash::check("harsh@123",$b)){
//        dd(1);
//    }
//    dd(0);
//});
Route::get('/professional/signup', [ProfessionalController::class, 'signup'])->name('professional.register');
Route::post('/professional/signup-success', [ProfessionalController::class, 'signup_success'])->name('professional.signup_success');
Route::get('/service_order/{id}', [ProfessionalController::class, 'service_order'])->name('professional.service_order');
Route::post('/accept_order', [ProfessionalController::class, 'accept_order'])->name('professional.accept_order');
Route::post('/reject_order', [ProfessionalController::class, 'reject_order'])->name('professional.reject_order');
Route::post('/complete_order', [ProfessionalController::class, 'complete_order'])->name('professional.complete_order');
Route::get('/dashboard/{id}', [ProfessionalController::class, 'dashboard'])->name('professional.dashboard');
Route::get('/professional/wallet/{id}', [ProfessionalController::class, 'wallet'])->name('professional.wallet');


//Professional requests at admin side
Route::get('/professional-commission', [ProfessionalController::class, 'professional_commission'])->name('professional_commission');
Route::post('/update-professional-commission', [ProfessionalController::class, 'update_professional_commission'])->name('update_professional_commission');

Route::get('/professional-requests', [ProfessionalController::class, 'professional_requests'])->name('professional_requests');
Route::get('/verified_professionals', [ProfessionalController::class, 'verified_professionals'])->name('verified_professionals');
Route::post('/makeVerified/{id}', [ProfessionalController::class, 'makeVerified'])->name('makeVerified');
Route::delete('/delete_professional/{id}', [ProfessionalController::class, 'delete_professional'])->name('professional.delete');
Route::post('/loginVerification', [ProfessionalController::class, 'loginVerification'])->name('loginVerification');

Route::get('/loginVerification/success', function (Request $request){
    $professional= Session::get('professional');
    $service=Category::find($professional->service_id);
    return view('professional_webscome.dashboard',compact('professional','service'))->with('success','You are Successfully logged in as a professional');
})->name('loginVerification.success');

Route::delete('/delete_professional/{id}', [ProfessionalController::class, 'delete_professional'])->name('professional.delete');

Route::post('/professional/logout', function (){
    if(Session::has('professional')){
        Session::forget('professional');
        return redirect()->to('/professional/login');
    }
})->name('professional.logout');


//service showing requests
Route::get('/single_service/{id}', [ServiceController::class, 'single_service'])->name('single_service');
Route::get('/single_service_detail/{id}/{id2}', [ServiceController::class, 'single_service_detail'])->name('single_service_detail');
Route::get('/select_service_provider/{id}/{id2}/{id3}', [ServiceController::class, 'select_service_provider'])->name('select_service_provider');
Route::get('/cart', [CartController::class, 'index'])->name('carts.index');
Route::get('/order-details', [CartController::class, 'orderdetails'])->name('carts.orderdetails');
Route::get('/cart/razorpay', function (){
    if(!Session::has('data')){
        abort(403);
    }else{
        $data= Session::get('data');
        return view('servicewebscome.carts.paywithrazorpay',compact('data'));
    }
})->name('carts.razorpay');
Route::post('/cart/placeorder', [CartController::class, 'placeorder'])->name('carts.placeorder');
Route::post('/cart/new_item/{id}', [CartController::class, 'store'])->name('carts.store');
Route::post('/cart/callback', [CartController::class, 'pay'])->name('carts.callback');
Route::get('/deleteorder/{id}', [CartController::class, 'deleteorder'])->name('carts.deleteorder');
Route::post('/applycoupon',[CartController::class, 'applycoupon'])->name('applycoupon');
Route::get('razorpay-checkout',[CartController::class, 'checkout'])->name('checkout');
Route::post('/removefromcart',[CartController::class, 'removefromcart'])->name('cart.remove');
Route::post('incrementcartquantity',[CartController::class, 'cart_quantity_increment'])->name('cart.cart_quantity_increment');
Route::post('decrementcartquantity',[CartController::class, 'cart_quantity_decrement'])->name('cart.cart_quantity_decrement');
//user side
Route::post('/update_user_address',[UserController::class, 'update_address'])->name('user.update_address');
Route::get('/update_user_profile',[UserController::class, 'update_profile'])->name('user.update_profile');
Route::post('/update_profile',[UserController::class, 'store'])->name('user.profile.update');


Route::resource('subCat', SubCategoryController::class);
Route::resource('child_cat', ChildCategoryController::class);
Route::resource('coupons', CouponController::class);
Route::resource('careers', CareerController::class);
Route::resource('teams',TeamController::class);

Route::post('parent_sub_categories',[ChildCategoryController::class,'parent_subcategories'])->name('parent.sub_categories');

//*****************************edit blog*****************
Route::resource('blogs', BlogController::class);


Route::get('/services', function () {
    $services=Category::where('status','=','1')->get();

    return view('servicewebscome.index')->with('services',$services);
})->name('services');

Route::resource('cat', CategoryController::class);

Route::get('/ajax-subcat',function(){

    $cat_id= Request::get('cat_id');

    $subcategories=SubCategory::where('category_id','=',$cat_id)->get();

    return Response::json($subcategories);

});

Route::get('/ajax-order_status',function(){

    $order_id= Request::get('order_id');

    $orders=Order::find($order_id);
    $orders->order_status='4';
    $orders->save();


    //return Response::json($subcategories);

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

route::get('/redirects',[DashBoardController::class,'index']);

//consider as a PagesController
//main webscome site pages loading

Route::get('/about', function () {
    $services=Category::where('status','=','1')->get();

    return view('webscome.about')->with('services',$services);
})->name('about');

Route::get('/team', function () {
    $teams= Team::where('name','!=','')->paginate(3);
    return view('webscome.team',compact('teams'));
})->name('team');

Route::get('/blog', function () {
    $blogs= DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*','categories.title as category_title')
            ->paginate(3);
    return view('webscome.blog')->with('blogs',$blogs);
})->name('blog');

Route::get('/blogdetails/{id}', function ($id) {
    $blogs= Blog::join('categories','blogs.category_id','=','categories.id')->get(['blogs.*','categories.title AS service']);

    foreach ($blogs as $blog_s) {
        if ($blog_s->id==$id) {
            $blog=$blog_s;
        }
    }
    return view('webscome.blog-details')->with('blog',$blog);
})->name('blogdetails');

Route::get('/contact', function () {
    return view('webscome.contact');
})->name('contact');

Route::get('/privacy', function () {
    return view('webscome.privacy-policy');
})->name('privacy');

//careers

Route::get('/career', function () {
    $careers= Career::all();

    return view('webscome.careers')->with('careers',$careers);
})->name('career');

Route::get('/careerdetails/{id}', function ($id) {
    $career= Career::find($id);


    return view('webscome.careers-detail')->with('career',$career);
})->name('careerdetails');

Route::post('/sharefeedback',[ServiceFeedbackController::class,'sharefeedback'])->name('sharefeedback');

//**************************** 1999 section payment*******************
Route::get('/premium',function (){
    return view('servicewebscome.combo_service.combo_service');
})->name('premium_service');

Route::post('/combo_service/place_order',[ComboServiceController::class,'placeorder'])->name('combo_service.make_payment');
Route::post('/combo_service/callback', [ComboServiceController::class, 'pay'])->name('combo_service.callback');
Route::get('/combo_service/razorpay', function (){
    if(!Session::has('data')){
        abort(403);
    }else{
        $data= Session::get('data');
        return view('servicewebscome.combo_service.paywithrazorpay',compact('data'));
    }
})->name('combo_service.razorpay');

Route::get('/combo-orders',[ComboServiceController::class,'all_combo_orders'])->name('combo_orders');
//*****************************************************************************


Route::get('/spare-parts',[SpareController::class,'index'])->name('manage_spares');
Route::get('/spare-parts/create',[SpareController::class,'create'])->name('create_spares');
Route::delete('/spare-parts/delete',[SpareController::class,'delete'])->name('spare_delete');
Route::post('/spare-parts/store',[SpareController::class,'store'])->name('spare.store');
Route::get('/spare-parts/edit/{id}',[SpareController::class,'edit'])->name('spare.edit');
Route::post('/spare-parts/update/{id}',[SpareController::class,'update'])->name('spare.update');



Route::get('/all_orders/add_spares',[SpareController::class,'add_spares'])->name('service.addspare');
Route::post('/all_orders/add_spares',[SpareController::class,'store_spares'])->name('all_orders.add_spares');

Route::get('premium-service-invoice',[CartController::class,'premium_invoice'])->name('combo_service_invoice');
Route::get('/order_invoice/user/{id}',[OrderController::class, 'user_order_invoice'])->name('user_order.invoice');



Route::get('/error',function (){
    return view('error');
});

//professional password reset only
Route::get('forget-password-professional', [ProfessionalController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ProfessionalController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ProfessionalController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ProfessionalController::class, 'submitResetPasswordForm'])->name('reset.password.post');

