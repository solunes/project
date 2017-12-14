@extends('master::layouts/admin')

@section('content')
  <h1>Proyectos</h1>

  <table class="table">
    <thead>
      <tr class="title">
        <td>Nombre</td>
        <td>Tipo de proyecto</td>
        <td>Prioridad</td>
        <td>Presentacion</td>
        <td>Estado</td>
        <td>Editar</td>

      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>{{ $item->project_type->name }}</td>
          <td>{{ $item->priority }}</td>
          <td>{{ $item->presentation_date }} </td>
          <td> {{ $item->status }} </td>
          <td class="edit"><a href="{{ url('admin/project/'.$item->id) }}">Editar</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection