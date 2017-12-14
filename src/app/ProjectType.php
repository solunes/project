<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model {
	
	protected $table = 'project_types';
	public $timestamps = true;

	/* Creating rules */
	public static $rules_create = array(
		'name'=>'required',
	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'name'=>'required',
	);
    
    public function projects() {
        return $this->hasMany('Solunes\Project\App\Project');
    }
    
    public function default_tasks() {
        return $this->hasMany('Solunes\Project\App\DefaultTask');
    }
    
    public function wikis() {
        return $this->hasMany('Solunes\Project\App\Wiki');
    }

}