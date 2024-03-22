@extends('layouts.app')
@section('content')
<div class="container">
<h1 class="bg-light text-center">GENERAR ÓRDENES</h1>

<div class="d-flex">
<form  action="{{ route('generar') }}" method="POST" class="d-flex mr-2">
	  @csrf
	<select name="anl_id" id="anl_id"  class="form-control">
		@foreach ($periodos as $p)
		<option value="{{$p->id}}">{{$p->anl_descripcion}}</option>
		@endforeach
	</select>

	<select name="jor_id" id="jor_id"  class="form-control">
		@foreach ($jornadas as $j)
		<option value="{{$j->id}}">{{$j->jor_descripcion}}</option>
		@endforeach
	</select>

	<select name="mes" id="mes"  class="form-control">
		@foreach ($meses as $key=>$m)
		<option value="{{$key}}">{{$m}}</option>
		@endforeach
	</select>

	 <button type="submit" class="btn btn-sm btn-primary mt-1">Buscar</button>
</form>
</div>
</div>
@endsection