<th></th><th></th><th></th><th></th><th></th> <h1 style="text-decoration: overline;">UNIDAD EDUCATIVA TECNICA "VIDA NUEVA"</h1>
<br>

<table class="table" style="font-family: Cooper Black, monospace;">
	<thead>
		<tr>
		<th style="font-weight: bold;">#</th>
		<th style="font-weight: bold;">USUARIOS</th>
		<th></th>
		<th style="font-weight: bold;">ROLES</th>
		<th style="font-weight: bold;">NOMBRES</th>
		<th></th>
		<th style="font-weight: bold;">CORREO</th>
		<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $u)
		<tr>
		<td style="font-weight: bold;">{{$loop->iteration}}</td>
		<td style="font-weight: bold;">{{$u->name}}</td>
		<td></td>
		<td style="font-weight: bold;">{{$u->rol_descripcion}}</td>
		<td style="font-weight: bold;">{{$u->usu_nombre}}</td>
		<th></th>
		<td style="font-weight: bold;">{{$u->email}}</td>
		<th></th>
		</tr>
		@endforeach
	</tbody>
</table>
