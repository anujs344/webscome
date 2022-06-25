<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceFeedback;
use Illuminate\Http\Request;

class ServiceFeedbackController extends Controller
{
    public function sharefeedback(Request $request){
        $feedback= new ServiceFeedback();
        $feedback->order_id= $request->get('order_id');
        $feedback->service_id= $request->get('service_id');
        $feedback->professional_id= $request->get('professional_id');
        $feedback->feedback= $request->get('feedback');
        $feedback->save();

        return response()->json(['success' =>'Data Saved'], 200);
    }
}
