@extends('master::layouts/admin')

@section('content')
  <h1>Proyecto: {{ $item->name }}</h1>
  <p>Menu de proyecto con 4 tabs</p>
  <div class="col-sm-12">
  	<ul class="nav nav-tabs">
	  <li class="active"><a data-toggle="tab" href="#description">Descripcion</a></li>
	  <li><a data-toggle="tab" href="#file">Archivos</a></li>
	  <li><a data-toggle="tab" href="#issue">Problemas</a></li>
	  <li><a data-toggle="tab" href="#task">Tareas</a></li>
	</ul>
	  	<div class="tab-content">
			 <div id="description" class="tab-pane fade in active">
			    <h3>Descripcion</h3>
			    @include('project::includes.project-description')
			 </div>
			 <div id="file" class="tab-pane fade">
			    <h3>Archivos</h3>
			    @include('project::includes.project-files')
			 </div>
			 <div id="issue" class="tab-pane fade">
			    <h3>Problemas</h3>
			    @include('project::includes.project-issues')
			 </div>
			 <div id="task" class="tab-pane fade">
			    <h3>Tareas</h3>
			    @include('project::includes.project-tasks')
			 </div>
		</div>
	</div>


@endsection