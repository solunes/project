<?php

namespace Solunes\Project\App;

use Illuminate\Database\Eloquent\Model;

class WikiType extends Model {
	
	protected $table = 'wiki_types';
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
    
    public function wikis() {
        return $this->hasMany('Solunes\Project\App\Wiki');
    }

}