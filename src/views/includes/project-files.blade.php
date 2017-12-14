<div class="col-sm-12">
	<table class="table">
		<tr class="title">
			<td>Nombre</td>
			<td>Contenido</td>
			<td>Editar</td>
		</tr>
			<tr>
				<td>{{$item->name}}</td>
				<td>{{ $item->content }}</td>
				<td class="edit"><a href=" {{ url('admin/project-files/'.$item->id) }} ">Editar</td>

			</tr>

	</table>
	



</div>