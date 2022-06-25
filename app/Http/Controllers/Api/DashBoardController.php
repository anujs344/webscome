<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashBoardController extends Controller
{
    public function index()
    {
        $role=Auth::user()->role;
        
        if($role=='1' || $role=='2')
        {
            return view('admin.dashboard');
        }
        if($role=='0')
        {
            $token=csrf_token();
            
            return view('servicewebscome.profile')->with('token',$token);
        }
    }

    
}
