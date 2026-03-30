<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('index') }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('create') }}">Agregar Contacto</a>
        </li>
      </ul>
      {{-- Condición: Solo muestra el formulario si la ruta NO es 'create' --}}
      @if(request()->routeIs('index'))
      <form class="d-flex" role="search" action="{{ route('index') }}" method="GET">
        <input name="search" class="form-control me-2" type="search" placeholder="V-00000000" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
      @endif
    </div>
  </div>
</nav>