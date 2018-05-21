<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\BusinessTask;
use App\Models\Payment;
use Mail;
use App\Mail\userMail;
use App\Http\Requests;
use Auth;
use App\User;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $id = Auth::user()->id;
        return redirect()->route('dashboardId', ['id' => $id]);
    }

    public function indexID($id)
    {
        $task =  Task::all();

        $task_posted = Payment::select()
                        ->join('business_tasks', 'payments.btask_id', '=', 'business_tasks.btask_id')
                        ->join('tasks', 'business_tasks.task_id', '=', 'tasks.task_id')
                        ->where('payments.payment_status', '=', '1')
                        ->whereColumn('currentViews', '<', 'totalViews')
                        ->select('business_tasks.taskName','business_tasks.currentViews','business_tasks.totalViews','tasks.task_type')
                        ->where('business_tasks.id', '=', $id)
                        ->orderBy('business_tasks.notified_at','desc')
                        ->paginate(10); 

        $task_completed = BusinessTask::select()
                      ->join('tasks', 'business_tasks.task_id', '=', 'tasks.task_id')
                      ->join('payments', 'payments.btask_id', '=', 'business_tasks.btask_id')
                      ->whereColumn('totalViews','currentViews')
                      ->where('business_tasks.id', $id)
                      ->select('currentViews','taskName','totalViews','task_type')
                      ->paginate(10);

        return view('User.dashboard')->with(array('tasks' => $task, 'task_posted' => $task_posted, 'task_completed' => $task_completed));
    }

    public function verify($token){
        $id = Auth::user()->id;
        User::where('token',$token)->firstOrFail()->update(['token' => null]);
        // Session::flash('success','Your account is now verified');
        // return redirect()->intended(route('dashboardId/' . $id));
        return redirect()->route('dashboardId', ['id' => $id])->with('verified','Account Verified');
        
    }

    public function show($id){
        $business = User::find($id);
        return view('User.Account')->with('business',$business);
    }

    public function updateAccount(Request $request,$id){
        $this->validate($request, [
            'name' => 'required'
        //     'email' => 'required',
        //     'address' => 'required'
        ]);
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id',  $id)
            ->update([
                'name' => $request->input('name')
                
            ]);
        return back()->with('success', 'Successfully updated');
    }
}
