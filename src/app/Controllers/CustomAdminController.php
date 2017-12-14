<?php

namespace Solunes\Project\App\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Asset;

class CustomAdminController extends Controller {

	protected $request;
	protected $url;

	public function __construct(UrlGenerator $url) {
	  $this->middleware('auth');
	  $this->middleware('permission:dashboard');
	  $this->prev = $url->previous();
	  $this->module = 'admin';
	}

	public function getIndex() {
		$user = auth()->user();
		//$array['tasks'] = $user->active_project_tasks;
		$array['tasks'] = \Solunes\Project\App\ProjectTask::limit(2)->get();
		$array['active_issues_projects'] = \Solunes\Project\App\Project::has('active_project_issues')->with('active_project_issues')->get();
      	return view('project::list.dashboard', $array);
	}

	/* Módulo de Proyectos */

	public function allProjects() {
		$array['items'] = \Solunes\Project\App\Project::get();
      	return view('project::list.projects', $array);
	}

	public function findProject($id, $tab = 'description') {
		if($item = \Solunes\Project\App\Project::find($id)){
			$array = ['item'=>$item, 'tab'=>$tab];
      		return view('project::item.project', $array);
		} else {
			return redirect($this->prev)->with('message_error', 'Item no encontrado');
		}
	}

	public function findProjectTask($id) {
		if($item = \Solunes\Project\App\ProjectTask::find($id)){
			$array = ['item'=>$item];
      		return view('project::item.project-task', $array);
		} else {
			return redirect($this->prev)->with('message_error', 'Item no encontrado');
		}
	}

	public function findProjecIssue($id) {
		if($item = \Solunes\Project\App\ProjectIssue::find($id)){
			$array = ['item'=>$item];
      		return view('project::item.project-issue', $array);
		} else {
			return redirect($this->prev)->with('message_error', 'Item no encontrado');
		}
	}

	public function allWikis($project_type_id = NULL, $wiki_type_id = NULL) {
		$array['project_type_id'] = $project_type_id;
		$array['wiki_type_id'] = $wiki_type_id;
		if($project_type_id&&$wiki_type_id){
			$array['items'] = \Solunes\Project\App\Wiki::where('project_type_id',$project_type_id)->where('wiki_type_id',$wiki_type_id)->get();
		} else if($project_type_id){
			$array['items'] = \Solunes\Project\App\WikiType::get();
		} else {
			$array['items'] = \Solunes\Project\App\ProjectType::get();
		}
      	return view('project::list.wikis', $array);
	}

	public function findWiki($id) {
		if($item = \Solunes\Project\App\Wiki::find($id)){
			$array = ['item'=>$item];
      		return view('project::item.wiki', $array);
		} else {
			return redirect($this->prev)->with('message_error', 'Item no encontrado');
		}
	}

}