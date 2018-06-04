<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
	
	protected $table = 'projects';
	public $timestamps = true;

	/* Creating rules */
	public static $rules_create = array(
		'name'=>'required',
		'project_type_id'=>'required',
		'porcentage'=>'required',
		'priority'=>'required',
		'presentation_date'=>'required',
		'status'=>'required',
		'content'=>'required',
	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'name'=>'required',
		'project_type_id'=>'required',
		'porcentage'=>'required',
		'priority'=>'required',
		'presentation_date'=>'required',
		'status'=>'required',
		'content'=>'required',
	);
    
    public function project_type() {
        return $this->belongsTo('Solunes\Project\App\ProjectType');
    }
        
    public function project_tasks() {
        return $this->hasMany('Solunes\Project\App\ProjectTask');
    }
    
    public function project_issues() {
        return $this->hasMany('Solunes\Project\App\ProjectIssue');
    }
        
    public function sale() {
        return $this->belongsTo('Solunes\Sales\App\Sale');
    }

    public function active_project_tasks() {
        return $this->hasMany('Solunes\Project\App\ProjectTask')->where('active',1);
    }

    public function active_project_issues() {
        return $this->hasMany('Solunes\Project\App\ProjectIssue')->where('active',1);
    }

}