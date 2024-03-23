<!-- ======= Header ======= -->
<header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="{{ asset('logo/logo2.svg') }}" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">{{ Auth::user()->administrador->nombres }}</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bi bi-person-workspace"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="{{ route('categorias') }}" class="nav-link scrollto"><i></i> <span>Categorias</span></a></li>
          <li><a href="{{ route('aprobados') }}" class="nav-link scrollto"><i></i> <span>Reportes aprobados</span></a></li>
          <li><a href="{{ route('pendiente.index') }}" class="nav-link scrollto"><i></i> <span>Reportes pendientes</span></a></li>
          <li><a href="{{ route('desaprobados') }}" class="nav-link scrollto"><i></i> <span>Reportes desaprobados</span></a></li>
          <li><a href="{{ route('cuentaA') }}" class="nav-link scrollto"><i></i> <span>Mi cuenta</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->