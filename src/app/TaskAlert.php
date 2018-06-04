<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class TaskAlert extends Model {
	
	protected $table = 'task_alerts';
	public $timestamps = true;

	/* Creating rules */
	public static $rules_create = array(
		'name'=>'required',
		'content'=>'required',
		'date'=>'required',
		'time'=>'required',
		'done'=>'required',

	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'name'=>'required',
		'content'=>'required',
		'date'=>'required',
		'time'=>'required',
		'done'=>'required',

	);
    
    public function parent() {
        return $this->belongsTo('Solunes\Project\App\Task');
    }

    public function task() {
        return $this->belongsTo('Solunes\Project\App\Task', 'parent_id');
    }

}