<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Business;
use App\Models\Payment;
use App\Models\BusinessTask;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\VideoRequest;
use Validator;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class BusinessTasksController extends Controller
{
    public function index($id,$photoName,$picture,$extension){
        $business_id = Auth::user()->id;
        return View('User.PhotoAdTransact')->with(array('task_id' =>$id, 'business_id' => $business_id, 'photoName' => $photoName, 'picture' => $picture, 'extension' => $extension));
    }

    public function indexVideo($id,$videoName,$video,$extension){
        $business_id = Auth::user()->id;
        return View('User.VideoAdTransact')->with(array('task_id' =>$id, 'business_id' => $business_id, 'videoName' => $videoName, 'video' => $video, 'extension' => $extension));
    }

    public function indexApp($id,$appName,Request $request){
        $business_id = Auth::user()->id;
        $url = $request->input('applink');
        $applink = Session::get('applink', $url);
        return View('User.AppAdTransact')->with(array('task_id' =>$id, 'business_id' => $business_id, 'appName' => $appName, 'applink' => $applink));
    }

    public function indexSurvey($id,$surveyName,Request $request){
        $business_id = Auth::user()->id;
        $url = $request->input('link');
        $link = Session::get('link', $url);
        return View('User.SurveyAdTransact')->with(array('task_id' =>$id, 'business_id' => $business_id, 'surveyName' => $surveyName, 'link' => $link));
    }   

    public function store(Request $request){
        $id = Auth::user()->id;
        $task_id = $request->input('task_id');
        $taskname = $request->input('photoname');

        if($request->hasFile('picture')){
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $filenameToStore = $id.'-'.$task_id.'-'.$filename.'.'.$extension;
            $path = $request->file('picture')->storeAs('public/tempPic', $filenameToStore);
        }       
        return redirect()->route('photoAdTransact', ['task_id' => $task_id, 'taskname' => $taskname, 'picture' => $filename, 'extension' => $extension]);
    }

    public function videoUpload(Request $request){
        $id = Auth::user()->id;
        $task_id = $request->input('task_id');
        $taskname = $request->input('videoname');

        if($request->hasFile('video')){
            $filenameWithExt = $request->file('video')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('video')->getClientOriginalExtension();
            $filenameToStore = $id.'-'.$task_id.'-'.$filename.'.'.$extension;
            $path = $request->file('video')->storeAs('public/tempPic', $filenameToStore);
         // $url = Storage::url('video');
        }       
        return redirect()->route('videoAdTransact', ['task_id' => $task_id, 'taskname' => $taskname, 'picture' => $filename, 'extension' => $extension]);
    }

    public function appUpload(Request $request){
        $task_id = $request->input('task_id');
        $taskname = $request->input('appname');
        $applink = $request->input('applink');
        // $link = Session::get('applink', $url);
        return redirect()->route('appAdTransact', ['task_id' => $task_id, 'taskname' => $taskname])->with('applink',$applink);
    }

    public function surveyUpload(Request $request){
        $task_id = $request->input('task_id');
        $taskname = $request->input('surveyname');
        $url = $request->input('survey');
        $link = Session::get('link', $url);
        return redirect()->route('surveyAdTransact', ['task_id' => $task_id, 'taskname' => $taskname])->with('link',$link);
    }

    

    // public function showTaskCompleted($id){
    //     $task_completed = BusinessTask::select()
    //                       ->join('tasks', 'business_tasks.task_id', '=', 'tasks.task_id')
    //                       ->join('payments', 'payments.btask_id', '=', 'business_tasks.btask_id')
    //                       ->whereColumn('totalViews','currentViews')
    //                       // ->where('payments.payment_status', '=', 1)            
    //                       ->where('business_tasks.id', $id)
    //                       ->select('currentViews','taskName','totalViews','task_type')
    //                       ->get();

    //     // // return $business_details = BusinessTask::get()->where('id', '=', $url_Id);
    //     return response()->json($task_completed);
    // }

        
}




