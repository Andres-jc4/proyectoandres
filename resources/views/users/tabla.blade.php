<th></th><th></th><th></th><th></th><th></th> <h1 style="text-decoration: overline;">UNIDAD EDUCATIVA TECNICA "VIDA NUEVA"</h1>
<br>

<table class="table" style="font-family: Cooper Black, monospace;">
	<thead>
		<tr>
		<th style="font-weight: bold;">#</th>
		<th style="font-weight: bold;">ESTUDIANTE</th>
		<th></th>
		<th style="font-weight: bold;">ESTADO</th>
		<th style="font-weight: bold;">AÑO</th>
		<th></th>
		<th style="font-weight: bold;">ESPECIALIDAD</th>
		<th></th>
		<th style="font-weight: bold;">CURSO</th>
		<th style="font-weight: bold;">PARALELO</th>
		</tr>
	</thead>
	<tbody>
		 
                @foreach($pagos as $p)
		<tr>
		<!-- <td style="font-weight: bold;">{{$loop->iteration}}</td> -->
		<td style="font-weight: bold;">{{ $p['estudiante'] }}</td>
		<td></td>
		<td style="font-weight: bold;">{{ $p['estado_pago'] }}</td>
		<td style="font-weight: bold;">{{ $p['anio'] }}</td>
		<th></th>
		<td style="font-weight: bold;">{{ $p['especialidades'] }}</td>
		<td style="font-weight: bold;">{{ $p['cursos'] }}</td>
		<td style="font-weight: bold;">{{ $p['paralelo'] }}</td>
		<th></th>
		</tr>
		@endforeach
	</tbody>
</table>
