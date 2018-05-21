<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Business;
use App\Models\Payment;
use App\Models\BusinessTask;
use Illuminate\Support\Facades\Session;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        // ===============
        // Business Account Details
        // ===============
        $businessList = DB::table('users')->select('id','name','status','created_at')->paginate(3);
        
        // ===============
        //  Task Pending
        // ===============
        $task_pending = Payment::select()
                        ->join('business_tasks', 'payments.btask_id', 'business_tasks.btask_id')
                        ->join('tasks', 'business_tasks.task_id', 'tasks.task_id')
                        ->join('users', 'business_tasks.id', 'users.id')
                        ->where('payments.payment_status', '0')
                        ->select('users.name','business_tasks.taskName','business_tasks.totalViews','business_tasks.btask_id','tasks.task_type')
                        ->orderBy('business_tasks.btask_id','asc')
                        ->get();    

        // ===============
        // Task Completed
        // ===============
        $task_completed = BusinessTask::select()
                      ->join('tasks', 'business_tasks.task_id', '=', 'tasks.task_id')
                      ->join('payments', 'payments.btask_id', '=', 'business_tasks.btask_id')
                      ->whereColumn('totalViews','currentViews')
                      // ->where('payments.payment_status', '=', 1)            
                      ->select('currentViews','taskName','totalViews','task_type')
                      ->get();
                                  
        // =======================================
        // Count pending task to specific business
        // =======================================
        $btask_pending = DB::table('business_tasks')
                        ->join('payments','payments.btask_id','=','business_tasks.btask_id')
                        ->selectRaw('id, COUNT(*) as count')
                        ->where('payment_status','0')
                        ->groupBy('id')
                        ->orderBy('count', 'desc')
                        ->get();             

        $btask_posted = DB::table('business_tasks')
                        ->join('payments','payments.btask_id','=','business_tasks.btask_id')
                        ->selectRaw('id, COUNT(*) as count')
                        ->where('payment_status','1')
                        ->groupBy('id')
                        ->orderBy('count', 'desc')
                        ->get();                             

        return view('Admin.AdminDashboard')->with(array('businessList' => $businessList, 'task_pending' => $task_pending, 'task_completed' => $task_completed,'btask_pending' => $btask_pending, 'btask_posted' => $btask_posted));
    }

    public function deAc_BusinessStatus($id){
        $user_stat = Business::findOrFail($id);
        $user_stat->status = '1';
        $user_stat->save();
        return back()->with('success', 'Account successfully de-activated');
    }

    public function ac_BusinessStatus($id){
        $user_stat = Business::findOrFail($id);
        $user_stat->status = '0';
        $user_stat->save();
        return back()->with('success', 'Account successfully activated');
    }

    public function pendingTaskCompleteLists(){
        $title = 'Task Management';
        $task_pending = Payment::select()
                        ->join('business_tasks', 'payments.btask_id', 'business_tasks.btask_id')
                        ->join('tasks', 'business_tasks.task_id', 'tasks.task_id')
                        ->join('users', 'business_tasks.id', 'users.id')
                        ->where('payments.payment_status', '0')
                        ->select('users.name','business_tasks.taskName','business_tasks.totalViews','business_tasks.btask_id','tasks.task_type','users.id','business_tasks.totalPrice','payments.payment_status','business_tasks.taskMedia','business_tasks.task_id')
                        ->orderBy('business_tasks.btask_id','asc')
                        ->paginate(6);

        $task_completed = BusinessTask::select()
                          ->join('tasks', 'business_tasks.task_id', '=', 'tasks.task_id')
                          ->join('payments', 'payments.btask_id', '=', 'business_tasks.btask_id')
                          ->join('users', 'business_tasks.id', 'users.id')
                          ->whereColumn('totalViews','currentViews')
                          ->select('currentViews','taskName','totalViews','task_type','business_tasks.btask_id','users.name')
                          ->orderBy('business_tasks.btask_id','asc')
                          ->paginate(6);

        return view('Admin.AdminTaskManagement')->with(array('task_pending' => $task_pending, 'task_completed' => $task_completed, 'title' => $title));
    }

    public function tasksList(){
      $title = 'Task Management';
      $task_list = BusinessTask::select()
                          ->join('tasks', 'business_tasks.task_id', '=', 'tasks.task_id')
                          ->join('payments', 'payments.btask_id', '=', 'business_tasks.btask_id')
                          ->join('users', 'business_tasks.id', 'users.id')
                          ->whereColumn('currentViews', '<' ,'totalViews')
                          ->where('payments.payment_status', '=', '1')            
                          ->select('currentViews','taskName','totalViews','task_type','business_tasks.btask_id','users.name','business_tasks.id','payments.payment_status')
                          ->orderBy('business_tasks.btask_id','asc')
                          ->paginate(10);

      // return Response()->json($task_list);
      return view('Admin.AdminTaskListManagement')->with(array('task_list' => $task_list, 'title' => $title));
    }

    public function approved_task($bTask_id){
        $user_paymentStat = DB::table('payments')
            ->where('btask_id',  $bTask_id)
            ->update([
                'payment_status' => '1'
            ]);    

        $user_notifyStat = DB::table('business_tasks')
            ->where('btask_id',  $bTask_id)
            ->update([
                'notification_status' => '1',
                'notified_at' => \Carbon\Carbon::now()
            ]);

        return back()->with('success', 'Successfully approved task');
    }

    public function delete_task($bTask_id){
        $task_delete = DB::table('business_tasks')
                    ->where('business_tasks.btask_id',$bTask_id)
                    ->delete();

        $task_delete2 = DB::table('payments')
                    ->where('payments.btask_id',$bTask_id)
                    ->delete();            

        return back()->with('success', 'Successfully deleted task');
    }

    public function notifyAdmin_requestPost(){
        $notify_admin = BusinessTask::select()
                        ->join('tasks', 'business_tasks.task_id', '=', 'tasks.task_id')
                        ->join('users', 'business_tasks.id', '=', 'users.id')
                        ->join('payments', 'business_tasks.btask_id', '=', 'payments.btask_id')
                        ->select('currentViews','taskName','totalViews','task_type','payments.payment_status','name','business_tasks.id')
                        ->where('notification_status',null)
                        ->orderBy('business_tasks.requested_at','asc')
                        ->get();

        return response()->json($notify_admin);
        // return view('Inc.pagesNavigation')->with('approved',$approved_task);
    }

    public function seeAllNotification(){
      $allNotification = BusinessTask::select()
                        ->join('tasks', 'business_tasks.task_id', '=', 'tasks.task_id')
                        ->join('users', 'business_tasks.id', '=', 'users.id')
                        ->join('payments', 'business_tasks.btask_id', '=', 'payments.btask_id')
                        ->select('currentViews','taskName','totalViews','task_type','payments.payment_status','name','business_tasks.id','business_tasks.requested_at')
                        ->where('notification_status',null)
                        ->orderBy('business_tasks.requested_at')
                        ->paginate(15);

      return view('admin.AllNotification')->with('allNotification',$allNotification);
    }

    public function searchName($nameSearch){
      // $nameID = DB::table('users')->where('id', '%' . $nameIDSearch . '%' )->get();
      $nameID = DB::table('users')->where('name', 'like', '%'. trim($nameSearch) .'%')->get();
      return response()->json($nameID);          
      

      // $search = \Request::get('search');


      // if ($request->has('city')) {
      //     return $user->where('name', $request->input('name'))
      //         ->where('city', $request->input('city'))
      //         ->get();
      // }

    }

}
