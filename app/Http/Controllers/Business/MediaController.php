<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business;    
use App\Models\BusinessTask;   
use App\Models\Task;
use Auth;

class MediaController extends Controller
{
    public function videoAd($id){
       $business_id = Auth::user()->id;
       return View('User.VideoAd')->with(array('task_id' =>$id, 'business_id' => $business_id));
    }
    
    public function photoAd($id){
        $business_id = Auth::user()->id;
        // $data = array(
        //     'task_id' => $id,
        //     'business_id' => $business_id
        // );
        return View('User.PhotoAd')->with(array('task_id' =>$id, 'business_id' => $business_id));
    }
    
    public function photoAdTransact($id){
        $business_id = Auth::user()->id;
        return View('User.PhotoAdTransact')->with(array('task_id' =>$id, 'business_id' => $business_id));   
    }

    public function appAd($id){
        $business_id = Auth::user()->id;
        return View('User.AppAd')->with(array('task_id' =>$id, 'business_id' => $business_id));
    }
    
    public function surveyAd($id){
        $business_id = auth()->user()->id;
        return View('User.SurveyAd')->with(array('task_id' =>$id, 'business_id' => $business_id));
    }

    public function create(){
        // return view('User.SurveyAd')->with('business',$business);   
    }

    public function changePassword(){
	    // $business =  Business::all();
    	// return view('User.changePassword')->with('Business',$business);
    }
}
