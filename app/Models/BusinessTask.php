<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessTask extends Model
{
    protected $table = 'business_tasks';
    public $pK = 'id';
    public $timestamps = false;
    
    public function business(){
    	return $this->belongsTo('App\Models\Business');
    }

    public function task(){
    	return $this->belongsTo('App\Models\Task');
    }

	public function payment(){
		return $this->hasMany('App\Models\Payment');
	}

}
