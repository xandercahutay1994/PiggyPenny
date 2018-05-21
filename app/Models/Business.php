<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'users';
    public $pK = 'id';
    public $timestamps = false;
    
    public function task(){
    	return $this->hasMany('App\Models\Task');
    }

    public function businessTask(){
    	return $this->hasMany('App\Models\BusinessTask');
    }

}
