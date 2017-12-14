<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
	
	protected $table = 'tasks';
	public $timestamps = true;

	/* Creating rules */
	public static $rules_create = array(
		'concept_id'=>'required',
		'user_id'=>'required',
		'name'=>'required',
		'finished'=>'required',
	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'concept_id'=>'required',
		'user_id'=>'required',
		'name'=>'required',
		'finished'=>'required',
	);
    
    public function task_alerts() {
        return $this->hasMany('Solunes\Project\App\TaskAlert');
    }

}