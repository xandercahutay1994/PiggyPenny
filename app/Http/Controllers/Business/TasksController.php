<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;

class TasksController extends Controller
{

	public function create(){
		return view('User.PhotoAd');
	}
    public function show($id){
  //   	$task = Task::find($id);
		// return view('User.PhotoAd');
    }
}
