<?php

namespace App\Http\Controllers\SystemAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function systemview(){
    	return view('AdminSystem.SystemDashboardView');
    }

    public function businessList(){
    	return view('AdminSystem.BusinessList');
    	
    }
}
