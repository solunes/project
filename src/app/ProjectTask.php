<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model {
	
	protected $table = 'project_tasks';
	public $timestamps = true;

	/* Creating rules */
	public static $rules_create = array(
		'project_id'=>'required',
		'user_id'=>'required',
		'name'=>'required',
		'order'=>'required',
		'active'=>'required',
		'time_hours'=>'required',
		'observations'=>'required',

	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'project_id'=>'required',
		'user_id'=>'required',
		'name'=>'required',
		'order'=>'required',
		'active'=>'required',
		'time_hours'=>'required',
		'observations'=>'required',

	);
        
    public function default_task() {
        return $this->belongsTo('Solunes\Project\App\DefaultTask');
    }

    public function project() {
        return $this->belongsTo('Solunes\Project\App\Project');
    }

    public function project_task_updates() {
        return $this->hasMany('Solunes\Project\App\ProjectTaskUpdate');
    }

}