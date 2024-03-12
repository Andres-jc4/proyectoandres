@extends('layouts.app')
@section('content')
	<div class="col-md-6">
    <h1>CREAR USUARIO</h1>
		<form action="{{route('users.store')}}" method='POST'>
		@csrf
    @include('users.fields')
</div>




@endsection