@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center mb-4">Órdenes Generadas</h1>
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover futuristic-table">
                <thead>
                    <tr>
                        <th>#</th> <!-- Nueva columna para el número de fila -->
                        <th>Matrícula</th>
                        <th>Estudiantes</th>
                        <th>Jornada</th>
                        <th>Curso</th>
                        <th>Especialidad</th>
                        <th>Cédula</th>
                        <th>Código</th>
                        <th>Fecha de Registro</th>
                        <th>Valor a Pagar</th>
                        <th>Fecha de Pago</th>
                        <th>Estado</th>
                        <th>Responsable</th>
                        <th>Valor Pagado</th>
                        <th>Documento</th>
                        <th>Mes</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordenes as $orden)
                    <tr class="table-row">
                        <td>{{ $loop->index + 1 }}</td> <!-- Mostrar el número de iteración -->
                        <td>{{ $orden->mat_id }}</td>
                        <td>{{ $orden->est_apellidos}} {{ $orden->est_nombres}}</td>
                        <td>{{ $orden->jor_descripcion }}</td>
                        <td>{{ $orden->cur_descripcion }}</td>
                        <td>{{ $orden->esp_descripcion }}</td>
                        <td>{{ $orden->est_cedula }}</td>
                        <td>{{ $orden->codigo }}</td>
                        <td>{{ $orden->fecha_registro }}</td>
                        <td>{{ $orden->valor_pagar }}</td>
                        <td>{{ $orden->fecha_pago }}</td>
                        <td>{{ $orden->estado == 0 ? 'Pendiente' : 'Pagado' }}</td>
                        <td>{{ $orden->responsable }}</td>
                        <td>{{ $orden->valor_pagado }}</td>
                        <td>{{ $orden->documento }}</td>
                        <td>{{ $meses[$orden->mes] }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary btn-3d">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                            <button class="btn btn-sm btn-danger btn-3d">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<style>
    th, td {
        color: #fff; /* Color de texto blanco */
        font-family: 'Roboto', sans-serif; /* Cambiar la fuente a Roboto */
        font-size: 14px; /* Reducir el tamaño de la fuente */
    }

    .table-container {
        overflow-x: auto;
        max-width: 100%; /* Ajustar al ancho máximo del contenedor */
        margin-bottom: 20px; /* Agregar espacio inferior */
    }

    /* Estilo para filas impares */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.1); /* Fondo con transparencia */
    }

    th {
        font-weight: bold;
    }

    /* Animación al cargar filas */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .table-row {
        animation: fadeIn 0.3s ease-in-out; /* Animación más rápida */
    }

    /* Animación al pasar el mouse sobre las filas */
    .table-row:hover {
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform: scale(1.05);
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        z-index: 1;
    }

    /* Estilo de los botones de acciones */
    .btn {
        transition: all 0.3s ease-in-out;
    }

    /* Estilo de los botones de acciones al pasar el mouse */
    .btn:hover {
        transform: translateY(-1px);
    }

    /* Estilo de los botones de acciones con efecto 3D */
    .btn-3d {
        position: relative;
        overflow: hidden;
    }

    .btn-3d::before {
        content: '';
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.1);
        transition: transform 0.3s;
        transform: translateY(-100%);
        z-index: -1;
    }

    .btn-3d:hover::before {
        transform: translateY(-50%);
    }

    /* Estilo de la tabla futurista */
    .futuristic-table {
        background-color: #1e1e1e; /* Fondo oscuro */
        border-radius: 10px; /* Bordes redondeados */
    }

    .futuristic-table th, .futuristic-table td {
        border: none; /* Eliminar bordes */
        padding: 8px; /* Ajustar el espaciado interno */
    }
</style>
