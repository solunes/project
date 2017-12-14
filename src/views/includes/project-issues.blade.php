
<div class="col-sm-12">
	<table class="table">
		<tr class="title">
			<td>Nombre</td>
			<td>Detalle</td>
			<td>Editar</td>
		</tr>	
		@foreach($item->project_issues as $subitem)	

		<tr>
			<td>{{$subitem->name}}</td>
			<td>{{ $subitem->content }}</td>
			<td class="edit"><a href=" {{ url('admin/project-issue/'.$subitem->id) }} ">Editar</td>

		</tr>
		@endforeach
	</table>



</div>