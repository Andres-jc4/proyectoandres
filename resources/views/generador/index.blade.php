@extends('layouts.app')
@section('content')
<div class="container">
<h1 class="bg-light text-center">GENERAR ÓRDENES</h1>

<form action="">
	<select name=""  class="form-control">
		@foreach ($periodos as $p)
		<option value="{{$p->id}}">{{$p->anl_descripcion}}</option>
		@endforeach
	</select>

	<select name=""  class="form-control">
		@foreach ($jornadas as $j)
		<option value="{{$j->id}}">{{$j->jor_descripcion}}</option>
		@endforeach
	</select>

	<select name=""  class="form-control">
		@foreach ($meses as $m)
		<option value="">{{$m}}</option>
		@endforeach
	</select>
</form>
</div>
@endsection