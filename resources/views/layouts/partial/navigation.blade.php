<!-- ======= Header ======= -->
<header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="{{ asset('logo/logo2.svg') }}" alt="" class="img-fluid rounded-circle">
        @if(Auth::check())
           <!-- Mostramos información del alumno -->
           @if(Auth::user()->tipo === 'Alumno')
        <h1 class="text-light">{{ Auth::user()->alumno->nombres }} - Alumno</h1>
           <!-- Mostramos información del profesor -->
           @elseif(Auth::user()->tipo === 'Profesor')
        <h1 class="text-light">{{ Auth::user()->profesor->nombres }} - Profesor</h1>
           <!-- Mostramos información del personal -->
           @elseif(Auth::user()->tipo === 'Personal')
        <h1 class="text-light">{{ Auth::user()->personal->nombres }} - Personal</h1>
           @endif
        @endif
        <div class="social-links mt-3 text-center">
          <a href="#" class="facebook"><i class="bi bi-person-circle"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="{{ route('nosotros') }}" class="nav-link scrollto"><i></i> <span>Nosotros</span></a></li>
          <li><a href="{{ route('reportar.index') }}" class="nav-link scrollto"><i></i> <span>Reportar</span></a></li>
          <li><a href="{{ route('reportes.index') }}" class="nav-link scrollto"><i></i> <span>Mis reportes</span></a></li>
          <li><a href="{{ route('noticias.index') }}" class="nav-link scrollto"><i></i> <span>Noticias</span></a></li>
          <li><a href="{{ route('cuenta.index') }}" class="nav-link scrollto"><i></i> <span>Mi cuenta</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
</header><!-- End Header -->