<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class DefaultTaskHowto extends Model {
	
	protected $table = 'default_task_howtos';
	public $timestamps = true;

	/* Creating rules */
	public static $rules_create = array(
		'default_task_id'=>'required',
		'duty_id'=>'required',
		'name'=>'required',
		'content'=>'required',
	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'default_task_id'=>'required',
		'duty_id'=>'required',
		'name'=>'required',
		'content'=>'required',
	);
    
    public function project_type() {
        return $this->belongsTo('Solunes\Project\App\Function');
    }

    public function duty() {
        return $this->belongsTo('Solunes\Project\App\Duty');
    }

}