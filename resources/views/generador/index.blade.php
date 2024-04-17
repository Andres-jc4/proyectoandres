@extends('layouts.app')
@section('content')
@php
if (!function_exists('mesesTexto')) {
    function mesesTexto($nmes){
    $meses = [
        '1' => 'Enero',
        '2' => 'Febrero',
        '3' => 'Marzo',
        '4' => 'Abril',
        '5' => 'Mayo',
        '6' => 'Junio',
        '7' => 'Julio',
        '8' => 'Agosto',
        '9' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre',
    ];
    return $meses[$nmes];
}
}
@endphp
<script>
    $(document).on("click",".btn_delete",function(){
         if(confirm("Esta seguro de Eliminar?")){
            const secuencial=$(this).attr("secuencial");
            $("#secuencial").val(secuencial);
            $("#frmEliminar").submit();
         }

    })
</script>
<form action="{{ route('eliminarOrden')}}" method="POST" id="frmEliminar">
    {{ csrf_field() }}
    <input type="hidden" name="secuencial" id="secuencial" value="0">
</form>
<div class="container">
    <h4 class="">Generar Ordenes</h4>
    <form action="{{ route('generar') }}" method="POST">
        @csrf
        <div style="display: flex;">
            <select name="anl_id" id="anl_id" class="form-control">
                @foreach ($periodos as $p)
                <option value="{{ $p->id }}">{{ $p->anl_descripcion }}</option>
                @endforeach
            </select>
            <select name="jor_id" id="jor_id" class="form-control">
                @foreach ($jornadas as $j)
                <option value="{{ $j->id }}">{{ $j->jor_descripcion }}</option>
                @endforeach
            </select>
            <select name="mes" id="mes" class="form-control">
                @foreach ($meses as $key => $m)
                <option value="{{ $key }}">{{ $m }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-danger">Generar</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>

                <th>Secuencial</th>
                <th>Fecha</th>
                <th>Año Lectivo</th>
                <th>Jornada</th>
                <th>Mes</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordenes as $o)
            <tr>
                <td>{{ $o->secuencial }}</td>
                <td>{{ $o->fecha_registro }}</td>
                <td>{{ $o->anl_descripcion }}</td>
                <td>{{ $o->jor_descripcion }}</td>
                <td>{{ mesesTexto($o->mes) }}</td>
                <td>
                    <a href="{{ route('vista_ordenes', ['secuencial' => $o->secuencial]) }}" class="btn btn-dark">Ver</a>
                    <a href="" class="btn btn-danger btn_delete" secuencial="{{ $o->secuencial }}">Eliminar</a>
                    <a href="{{ route('excelorder') }}" class="btn btn-success">EXCEL</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection