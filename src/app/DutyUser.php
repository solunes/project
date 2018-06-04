<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class DutyUser extends Model {
	
	protected $table = 'duty_user';
	public $timestamps = true;

	/* Creating rules */
	public static $rules_create = array(
		'duty_id'=>'required',
		'user_id'=>'required',
		'priority'=>'required',
	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'duty_id'=>'required',
		'user_id'=>'required',
		'priority'=>'required',
	);
       
    public function parent() {
        return $this->belongsTo('Solunes\Project\App\Duty');
    }

    public function duty() {
        return $this->belongsTo('Solunes\Project\App\Duty', 'parent_id');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }

}