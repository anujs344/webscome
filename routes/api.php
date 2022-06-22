<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProfessionalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    //Category Controller
    Route::resource('cat', CategoryController::class);

    //Order Controller

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
    Route::get('/order_invoice/user/{id}',[OrderController::class, 'user_order_invoice'])->name('user_order.invoice');

    //professional controller
    Route::get('forget-password-professional', [ProfessionalController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ProfessionalController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ProfessionalController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ProfessionalController::class, 'submitResetPasswordForm'])->name('reset.password.post');
    Route::delete('/delete_professional/{id}', [ProfessionalController::class, 'delete_professional'])->name('professional.delete');
    Route::get('/professional', [ProfessionalController::class, 'index'])->name('proWebscome');
    Route::post('/professional/account_edit', [ProfessionalController::class, 'edit_account'])->name('professional_account_edit');
    Route::post('/professional/update', [ProfessionalController::class, 'update'])->name('professional.update');  
    Route::get('/professional/login', [ProfessionalController::class, 'login'])->name('professional.login');
    Route::get('/professional/signup', [ProfessionalController::class, 'signup'])->name('professional.register');
    Route::post('/professional/signup-success', [ProfessionalController::class, 'signup_success'])->name('professional.signup_success');
    Route::get('/service_order/{id}', [ProfessionalController::class, 'service_order'])->name('professional.service_order');
    Route::post('/accept_order', [ProfessionalController::class, 'accept_order'])->name('professional.accept_order');
    Route::post('/reject_order', [ProfessionalController::class, 'reject_order'])->name('professional.reject_order');
    Route::post('/complete_order', [ProfessionalController::class, 'complete_order'])->name('professional.complete_order');
    Route::get('/dashboard/{id}', [ProfessionalController::class, 'dashboard'])->name('professional.dashboard');
    Route::get('/professional/wallet/{id}', [ProfessionalController::class, 'wallet'])->name('professional.wallet');
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
        // return view('professional_webscome.dashboard',compact('professional','service'))->with('success','You are Successfully logged in as a professional');
        return response()->json([$professional,$service,'success'=>'You are Successfully logged in as a professional'], 200);
    })->name('loginVerification.success');

});

Route::prefix('auth')->group(function(){
    Route::post('login',[AuthController::class,'login']);
    Route::post('register',[AuthController::class,'register']);
});