<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessTask;
use App\Models\Payment;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PaymentsController extends Controller
{
	
    public function store(Request $request){
        // instantiate Business Task so that I can call it to this controller
        $bTask = new BusinessTask;
        $business_id = auth()->user()->id;

        // instantiate payment
    	$payment = new Payment; 
    	$task_id = $request->input('task_id');
    	$earnings = $request->input('hiddenpayment');
    	$picture = $request->input('picture');
    	$extension = $request->input('extension');
        $pType = $request->input('currency');
    	$tViews = $request->input('hidden_target');
        $taskname = $request->input('photoName');

        $filename = pathinfo($picture, PATHINFO_FILENAME);

        $filenameToStore = $business_id.'-'.$task_id.'-'.$filename.'.'.$extension;
        $path = Storage::move('public/tempPic/' . $filenameToStore, 'public/pictures/' . $filenameToStore);        

    	$bTask = new BusinessTask; 
        $bTask->task_id =  $task_id;
        $bTask->id =  $business_id;
	    $bTask->taskName = $taskname;
        $bTask->taskMedia =   $filenameToStore;
        $bTask->totalViews = $tViews;
        $bTask->currentViews = 0;
        $bTask->totalPrice = $earnings;

        //getting the maximum BTASK_ID FROM BUSINESS TASK
        $max_bTaskId = DB::table('business_tasks')->max('btask_id')+1;

        $deducted_price = $earnings / 2;

        $payment->btask_id =  $max_bTaskId;
        $payment->payment_status = '0';
        $payment->payment_type =   $pType;
        $payment->pennyer_payments = $deducted_price;
        $payment->piggypenny_earnings = $deducted_price;
            
        if($payment->save() && $bTask->save()){
            return redirect('/photoAd/' . $task_id)->with('flash','Success');
            // return redirect()->route('finalTransact', ['task_id' => $task_id]);
        }else{
           Session::flash('error', 'Error saving');
        }
    }

    public function storeVideo(Request $request){

        // $this->validate($request, [
        //     'target_views' => 'required',
        //     'bitcoin_address' => 'required'
        // ]);

        // instantiate Business Task so that I can call it to this controller
        $bTask = new BusinessTask;
        $business_id = auth()->user()->id;

        // instantiate payment
        $payment = new Payment; 
        $task_id = $request->input('task_id');
        $earnings = $request->input('hiddenpayment');
        $video = $request->input('video');
        $pType = $request->input('currency');
        $extension = $request->input('extension');
        $tViews = $request->input('hidden_target');
        $taskname = $request->input('videoName');
  
        $filename = pathinfo($video, PATHINFO_FILENAME);

        // $filenameToStore = $filename . '_' . time();
        // $filenameToStore = $business_id . '/' . $task_id . '/' .  $taskname . '/' .  $filename . '_' . time();
        // $path = $request->input('videoName')->storeAs('public/video',$filenameToStore);

        $filenameToStore = $business_id.'-'.$task_id.'-'.$filename.'.'.$extension;
        $path = Storage::move('public/tempPic/' . $filenameToStore, 'public/videos/' . $filenameToStore);      

        $bTask = new BusinessTask; 
        $bTask->task_id =  $task_id;
        $bTask->id =  $business_id;
        $bTask->taskName = $taskname;
        $bTask->taskMedia =   $filenameToStore;
        $bTask->totalViews = $tViews;
        $bTask->currentViews = 0;
        $bTask->totalPrice = $earnings;

        //getting the deduct
        $max_bTaskId = DB::table('business_tasks')->max('btask_id')+1;

        $deducted_price = $earnings / 2;

        $payment->btask_id =  $max_bTaskId;
        $payment->payment_status = '0';
        $payment->payment_type =   $pType;
        $payment->pennyer_payments = $deducted_price;
        $payment->piggypenny_earnings = $deducted_price;
            
        if($payment->save() && $bTask->save()){

            return redirect('/videoAd/' . $task_id)->with('flash','Success');
            // return redirect()->route('finalTransact', ['task_id' => $task_id]);
        }else{
           Session::flash('error', 'Error saving');
        }
    }

    public function storeApp(Request $request){

        // $this->validate($request, [
        //     'target_views' => 'required',
        //     'bitcoin_address' => 'required'
        // ]);

        // instantiate Business Task so that I can call it to this controller
        $bTask = new BusinessTask;
        $business_id = auth()->user()->id;

        // instantiate payment
        $payment = new Payment; 
        $task_id = $request->input('task_id');
        $earnings = $request->input('hiddenpayment');
        $link = $request->input('applink');
        $pType = $request->input('currency');
        $tViews = $request->input('hidden_target');
  
        // $filename = pathinfo($video, PATHINFO_FILENAME);
        $taskname = $request->input('appName');
        
        $bTask = new BusinessTask; 
        $bTask->task_id =  $task_id;
        $bTask->id =  $business_id;
        $bTask->taskName = $taskname;
        $bTask->taskMedia =   $link;
        $bTask->totalViews = $tViews;
        $bTask->currentViews = 0;
        
        $bTask->totalPrice = $earnings;

        //getting the maximum BTASK_ID FROM BUSINESS TASK
        $max_bTaskId = DB::table('business_tasks')->max('btask_id')+1;
        
        $deducted_price = $earnings / 2;

        $payment->bTask_id =  $max_bTaskId;
        $payment->payment_status = '0';
        $payment->payment_type =   $pType;
        $payment->pennyer_payments = $deducted_price;
        $payment->piggypenny_earnings = $deducted_price;
            
        if($payment->save() && $bTask->save()){

            return redirect('/appAd/' . $task_id)->with('flash','Success');
            // return redirect()->route('finalTransact', ['task_id' => $task_id]);
        }else{
           Session::flash('error', 'Error saving');
        }
    }

    public function storeSurvey(Request $request){

        // $this->validate($request, [
        //     'target_views' => 'required',
        //     'bitcoin_address' => 'required'
        // ]);

        // instantiate Business Task so that I can call it to this controller
        $bTask = new BusinessTask;
        $business_id = auth()->user()->id;

        // instantiate payment
        $payment = new Payment; 
        $task_id = $request->input('task_id');
        $earnings = $request->input('hiddenpayment');
        $link = $request->input('link');
        $pType = $request->input('currency');
        $tViews = $request->input('hidden_target');
              
        // $filename = pathinfo($video, PATHINFO_FILENAME);
        $taskname = $request->input('surveyName');
        
        $bTask = new BusinessTask; 
        $bTask->task_id =  $task_id;
        $bTask->id =  $business_id;
        $bTask->taskName = $taskname;
        $bTask->taskMedia =   $link;
        $bTask->totalViews = $tViews;
        $bTask->currentViews = 0;
        $bTask->totalPrice = $earnings;

        //getting the maximum BTASK_ID FROM BUSINESS TASK
        $max_bTaskId = DB::table('business_tasks')->max('btask_id')+1;
        
        $deducted_price = $earnings / 2;

        $payment->bTask_id =  $max_bTaskId;
        $payment->payment_status = '0';
        $payment->payment_type =   $pType;
        $payment->pennyer_payments = $deducted_price;
        $payment->piggypenny_earnings = $deducted_price;
            
        if($payment->save() && $bTask->save()){

            return redirect('/surveyAd/' . $task_id)->with('flash','Success');
            // return redirect()->route('finalTransact', ['task_id' => $task_id]);
        }else{
           Session::flash('error', 'Error saving');
        }
    }
}
