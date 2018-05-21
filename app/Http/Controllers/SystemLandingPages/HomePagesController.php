<?php

namespace App\Http\Controllers\SystemLandingPages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessTask;

class HomePagesController extends Controller
{
    public function landing(){
    	$title = 'HOME';
    	return view('SystemLandingView.HomePage')->with('title',$title);
    }

    public function about(){
    	$title = 'ABOUT';
    	return view('SystemLandingView.AboutPage')->with('title',$title);
    }
   
    // public function showVideo($id){
    //     $bTask_details = BusinessTask::where('id', $id)->get();
    //     return view('SystemLandingView.HomePage')->with('bTask_details',$bTask_details);
    // }
}//end of class
