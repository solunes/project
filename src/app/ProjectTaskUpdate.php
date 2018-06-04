<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class ProjectTaskUpdate extends Model {
	
	protected $table = 'project_task_updates';
	public $timestamps = true;

	/* Creating rules */
	public static $rules_create = array(
		'parent_id'=>'required',
		'user_id'=>'required',
		'status'=>'required',
		'observations'=>'required',
		

	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'parent_id'=>'required',
		'user_id'=>'required',
		'status'=>'required',
		'observations'=>'required'
	);
        
    public function parent() {
        return $this->belongsTo('Solunes\Project\App\ProjectTask');
    }

    public function project_task() {
        return $this->belongsTo('Solunes\Project\App\ProjectTask', 'parent_id');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }

}