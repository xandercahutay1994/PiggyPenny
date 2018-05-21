<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Tasks;
use App\Models\Payment;
use App\Models\BusinessTask;
use DB;
use Carbon\Carbon;


class BusinessController extends Controller
{
    public function notify_approvedTask($id){
        $approved_task = BusinessTask::select()
                        ->join('tasks', 'business_tasks.task_id', '=', 'tasks.task_id')
                        ->join('payments', 'business_tasks.btask_id', '=', 'payments.btask_id')
                        ->select('currentViews','taskName','totalViews','task_type','payments.payment_status')
                        ->where('notification_status','1')
                        ->where('id',$id)   
                        ->get();

        return response()->json($approved_task);
        // return view('Inc.pagesNavigation')->with('approved',$approved_task);
    }


    public function read_notification($id){
        $read = DB::table('business_tasks')
            ->where('id',  $id)
            ->where('notification_status','1')
            ->update([
                'notification_status' => '2',
                'notified_at' => Carbon::now()
            ]);

        $read_notify = BusinessTask::select()
                        ->join('tasks', 'business_tasks.task_id', '=', 'tasks.task_id')
                        ->join('payments', 'business_tasks.btask_id', '=', 'payments.btask_id')
                        ->select('currentViews','taskName','totalViews','task_type','payments.payment_status','notification_status')
                        ->where('notification_status','2')
                        ->where('id',$id)
                        ->orderBy('notified_at','desc')
                        ->get();

        return response()->json($read_notify);
    }

    public function readAllNotification($id){
        $read_All = BusinessTask::select()
                        ->join('tasks', 'business_tasks.task_id', '=', 'tasks.task_id')
                        ->join('payments', 'business_tasks.btask_id', '=', 'payments.btask_id')
                        ->select('currentViews','taskName','totalViews','task_type','payments.payment_status','notified_at')
                        ->where('notification_status','2')
                        ->where('id',$id)   
                        ->orderBy('notified_at','desc')
                        ->paginate(15);

        return view('User.Notification')->with('read_All', $read_All);                
    }
}
