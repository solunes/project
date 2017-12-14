
<div class="col-sm-12">
	<table class="table">
		<tr class="title">
			<td>Nombre</td>
			<td>Contenido</td>
			<td>Editar</td>
		</tr>
		@foreach( $item->project_tasks as $subitem)	
		<tr>
			<td>{{$subitem->name}}</td>
			<td>{{ $subitem->observations }}</td>
			<td class="edit"><a href=" {{ url('admin/project-task/'.$subitem->id) }} ">Editar</td>
		</tr>
		@endforeach
	</table>



</div>