
<div class="col-sm-12">
	<table class="table">
		<tr class="title">
			<td>Nombre</td>
			<td>Contenido</td>
			<td>VER</td>
		</tr>
		@foreach( $item->project_tasks as $subitem)	
		<tr>
			<td>{{$subitem->name}}</td>
			<td>{{ $subitem->observations }}</td>
			<td class="edit"><a href=" {{ url('admin/project-task/'.$subitem->id) }} ">VER</td>
		</tr>
		@endforeach
	</table>

	<button type="button" class="btn btn-default"><a href= "{{ url('admin/model/task/create?parameters={"f_created_at_from":null,"f_created_at_to":null}') }}"> Crear Tarea</a> </button>
	<button type="button" class="btn btn-default"><a href= "{{ url('admin/model/default-task/edit/1/es?parameters={"f_created_at_from":null,"f_created_at_to":null}') }}"> Editar Tarea</a> </button>


</div>