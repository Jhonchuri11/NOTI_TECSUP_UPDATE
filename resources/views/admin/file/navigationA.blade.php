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
          <li><a href="{{ route('nosotros') }}" class="nav-link scrollto"><i></i> <span>Nosotros</span></a></li>
          <li><a href="{{ route('reportar.index') }}" class="nav-link scrollto"><i></i> <span>Reportar</span></a></li>
          <li><a href="{{ route('adminR.index') }}" class="nav-link scrollto"><i></i> <span>Reportes</span></a></li>
          <li><a href="{{ route('noticias.index') }}" class="nav-link scrollto"><i></i> <span>Noticias</span></a></li>
          <li><a href="{{ route('cuenta.index') }}" class="nav-link scrollto"><i></i> <span>Mi cuenta</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->