<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $table = 'tasks';
	public $primaryKey = 'task_id';

	public function business(){
		return $this->belongsTo('App\Models\Business');
	}

	public function businessTask(){
		return $this->hasMany('App\Models\BusinessTask');
	}

}//end of class
