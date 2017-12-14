<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class ProjectIssue extends Model {
	
	protected $table = 'project_issues';
	public $timestamps = true;

	/* Creating rules */
	public static $rules_create = array(
		'project_id'=>'required',
		'active'=>'required',
		'content'=>'required',	
	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'project_id'=>'required',
		'active'=>'required',
		'content'=>'required',
	);
        
    public function project() {
        return $this->belongsTo('Solunes\Project\App\Project');
    }
    
    public function project_issue_updates() {
        return $this->hasMany('Solunes\Project\App\ProjectIssueUpdate');
    }

}