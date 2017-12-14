@extends('master::layouts/admin')

@section('content')
  <h1>Wikis</h1>
  @if($filtered)
    <table class="table">
      <thead>
        <tr class="title">
          <td>Tipo de proyecto </td>
          <td>Contenido</td>
          <td>Editar</td>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
          <tr>
            <td>{{ $item->wiki_type->name }}</td>
            <td>{{ $item->name }}</td>
            <td class="edit"><a href="{{ url('admin/wiki/'.$item->id) }}">Editar</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
  <table class="table">
      <thead>
        <tr class="title">
          <td>Nombre</td>
          <td>Editar</td>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
          <tr>
            <td>{{ $item->name }}</td>
            <td class="edit"><a href="{{ url('admin/wiki/'.$item->id) }}">Editar</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
@endsection