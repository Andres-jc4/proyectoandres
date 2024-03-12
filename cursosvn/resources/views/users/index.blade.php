@extends('layouts.app')


@section('content')


	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<h1>Estudiantes Tecnicos</h1>

 

<body>

<div class="d-flex">
    <form action="{{ route('api.con') }}" method="POST" class="d-flex mr-2">
        @csrf

        <div class="form-group mr-2">
            <label for="jor_id" class="mr-2">Jornada:</label>
            <select name="jor_id" id="jor_id" class="form-control custom-select">
                @foreach($jornadas as $j)
                    <option value="{{ $j['id'] }}">{{ $j['jor_descripcion'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mr-2">
            <label for="esp_id" class="mr-2">Especialidades:</label>
            <select name="esp_id" id="esp_id" class="form-control custom-select">
                @foreach($especialidades as $e)
                    <option value="{{ $e['id'] }}">{{ $e['esp_descripcion'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mr-2">
            <label for="cur_id" class="mr-2">Curso:</label>
            <select name="cur_id" id="cur_id" class="form-control custom-select">
                @foreach($cursos as $c)
                    <option value="{{ $c['id'] }}">{{ $c['cur_descripcion'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mr-2">
            <label for="paralelot" class="mr-2">Paralelo:</label>
            <select name="paralelot" id="paralelot" class="form-control custom-select">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
        </div>

           <div class="form-group mr-2">
            <label for="mes" class="mr-2">Mes:</label>
            <select name="mes" id="mes" class="form-control custom-select">
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
                
            </select>
        </div>



        <div class="form-group mr-2">
            <label for="anl_id" class="mr-2">Año:</label>
            <select name="anl_id" id="anl_id" class="form-control custom-select">
                @foreach($anio as $a)
                    <option value="{{ $a['id'] }}">{{ $a['anl_descripcion'] }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-sm btn-primary mt-4">Buscar</button>
    </form>

    <div class="ml-auto d-flex">
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success mt-4">AÑADIR</a>
        <a href="{{ route('user.export') }}" class="btn btn-sm btn-success mt-4">EXCEL</a>
        <!-- <a href="{{ route('api.con') }}" class="btn btn-sm btn-success mt-4">API</a> -->
    </div>
</div>


<table class="table">
    <thead>
    <tr>
        <th>JORNADAS</th>
        <th>ESPECIALIDAD</th>
        <th>CURSO</th>
        <th>PARALELO</th>
        <th>MES</th>
        <th>AÑO</th>
        <th>ESTADO</th>
    </thead>
    </tr>
<tbody>
        @foreach($pagos as $p)
            <tr>
                <td>{{ $p['estudiante'] }}</td>
                <!-- <td>{{ $p['estado_pago'] }}</td> -->
            </tr>
        @endforeach
    </tbody>


</table>

 
</body> 


@endsection