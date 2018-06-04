<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class DefaultTask extends Model {
	
	protected $table = 'default_tasks';
	public $timestamps = true;

	/* Creating rules */
	public static $rules_create = array(
		'proyect_type_id'=>'required',
		'duty_id'=>'required',
		'name'=>'required',
		'order'=>'required',
		'content'=>'required',
	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'proyect_type_id'=>'required',
		'duty_id'=>'required',
		'name'=>'required',
		'order'=>'required',
		'content'=>'required',
	);
    
    public function project_type() {
        return $this->belongsTo('Solunes\Project\App\ProjectType');
    }

    public function duty() {
        return $this->belongsTo('Solunes\Project\App\Duty');
    }

    public function default_task_howtos() {
        return $this->hasMany('Solunes\Project\App\DefaultTaskHowto', 'parent_id');
    }

}