<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $table = 'payments';
	public $primaryKey = 'payment_id';
	public $timestamps = false;
    
	public function businessTask(){
		return $this->belongsTo('App\Model\BusinessTask');
	}
	

}
