@extends('master::layouts/admin')

@section('content')
	
  <h1>Wiki: {{ $item->name }}</h1>
 	<div class="col-sm-12">
 		<div class="col-sm-12"> 
	 	 {!! $item->content !!}
	  	</div>
	  <button type="button" class="btn btn-default">VER </button>
  	</div>
@endsection