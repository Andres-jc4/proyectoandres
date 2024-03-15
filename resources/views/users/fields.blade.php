<div class="col-lg-12">
<div class="card">
<div class="card-header">
             
			<div>
			<label for="rol_id"> Elija un ROL </label>
			<select name="rol_id">
				@foreach($roles as $r)
				<option value="{{$r->rol_id}} {{ isset($user) && $user->rol_id==$r->rol_id?'selected':''}}">{{$r->rol_descripcion}}</option>
				@endforeach
				</select>
			<br>
			<label for="name">Nombre de Usuario </label>
			<input type="text" name="name" value="{{ isset($user)?$user->name:''}}">
			<br>
			<label for="usu_nombre"> Nombre y Apellido </label>
			<input type="usu_nombre" name="usu_nombre" value="{{ isset($user)?$user->name:''}}">
			<br>			
			<label for="usu_telefono"> Teléfono </label>
			<input type="text" name="usu_telefono" value="{{ isset($user)?$user->name:''}}">	
			<br>
			<label for="email"> Correo</label>
			<input type="email" name="email" value="{{ isset($user)?$user->name:''}}">
			<br>
			<label for="password"> Contraseña</label>
			<input type="password" name="password">

			<button type="submit" class="btn btn-primary" >Guardar</button>
			</div>

</div>
</div>
</div>
           
