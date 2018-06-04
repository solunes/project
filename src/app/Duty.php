<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class Duty extends Model {
	
	protected $table = 'duties';
	public $timestamps = true;

	/* Creating rules */
	public static $rules_create = array(
		'name'=>'required',
		'project_type_id'=>'required',

	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'name'=>'required',
		'project_type_id'=>'required',
	);
    
    public function project_type() {
        return $this->belongsTo('Solunes\Project\App\ProjectType');
    }
    
    public function duty_users() {
        return $this->hasMany('Solunes\Project\App\DutyUser', 'parent_id');
    }

}