@extends('layouts.app')


@section('content')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<h1>Estudiantes Cultural</h1>


<body>

<div class="d-flex">
    <form action="{{route('api.conc')}}" method="POST" class="d-flex mr-2"> 
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
            <label for="cur_id" class="mr-2">Curso:</label>
            <select name="cur_id" id="cur_id" class="form-control custom-select">
                @foreach($cursos as $c)
                    <option value="{{ $c['id'] }}">{{ $c['cur_descripcion'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mr-2">
            <label for="paralelo" class="mr-2">Paralelo:</label>
            <select name="paralelo" id="paralelo" class="form-control custom-select">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
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

</div>
@endsection

