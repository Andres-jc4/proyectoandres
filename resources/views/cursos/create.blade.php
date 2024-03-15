@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Cursos</h1>
    <form action="{{ route('cursos.store')}}" method="POST">
        @csrf
        @include('cursos.fields')
    </form>
</div>
@endsection