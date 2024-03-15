<div class="container-fluid bg-primary">
  <nav class="navbar">
    <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Inicio</a>

      <a class="navbar-brand" href="{{ route('cursos.index') }}">Cursos</a>

      <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->usu_nombre }}

          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
            <li><a class="dropdown-item" onclick="event.preventDefault();cerrarSession.submit()">Cerrar Session</a></li>
            <form action="{{ route('logout') }}" id="cerrarSession" method="POST">
    @csrf
</form>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


    </div>
  </nav>
</div>

























