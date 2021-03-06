<header>
  <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('dashboard') }}">TTicket</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
    <ul class="navbar-nav ml-auto">
      @if(Auth::user()->idRol === 1)
        <li class="nav-item">
          <a class="nav-link" href="{{ url('crearEvento') }}">Crear Evento</a>
        </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard') }}">Eventos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">Cerrar Sesión</a>
      </li>
    </ul>
  </div>
</nav>
</header>
