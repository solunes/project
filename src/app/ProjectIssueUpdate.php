<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class ProjectIssueUpdate extends Model {
	
	protected $table = 'project_issue_updates';
	public $timestamps = true;

	/* Creating rules */
	public static $rules_create = array(
		'proyect_issue_id'=>'required',
		'user_id'=>'required',
		'status'=>'required',	
		'content'=>'required',	
	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'proyect_issue_id'=>'required',
		'user_id'=>'required',
		'status'=>'required',	
		'content'=>'required',
	);
    
    public function project_issue() {
        return $this->belongsTo('Solunes\Project\App\ProjectIssue');
    }

}