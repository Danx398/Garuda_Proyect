  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
      <div class="container-fluid">
          <a class="navbar-brand text-light" href="{{route('admin')}}"><img style="width: 60px" src="{{ asset('img/LogoMamalon.webp') }}" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link active text-light" aria-current="page" href="{{ route('registrar-admin') }}">Registrar Alumno</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light" href="{{route('tramite-admin')}}">Creditos</a>
                  </li>
                  {{-- <li class="nav-item">
                      <a class="nav-link text-light" href="{{route('liberado-admin')}}">Creditos Liberados</a>
                  </li> --}}
              </ul>
              <a href="{{ route('logout') }}" class="btn btn-danger">Cerrar Sesion</a>
          </div>
      </div>
  </nav>
