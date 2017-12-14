<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class Wiki extends Model {
	
	protected $table = 'wikis';
	public $timestamps = true;

	/* Creating rules */
	public static $rules_create = array(
		'name'=>'required',
		'project_type_id'=>'required',
		'wiki_type_id'=>'required',
		'content'=>'required',	
	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'name'=>'required',
		'project_type_id'=>'required',
		'wiki_type_id'=>'required',	
		'content'=>'required',
	);
    
    public function project_type() {
        return $this->belongsTo('Solunes\Project\App\ProjectType');
    }
    
    public function wiki_type() {
        return $this->belongsTo('Solunes\Project\App\WikiType');
    }

}