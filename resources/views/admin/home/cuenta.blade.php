@extends('admin.panel2')

@section('contenidos')
<!-- Perfil -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Cuenta</h2>
          <ol>
            <li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
            <li>Perfil</li>
          </ol>
        </div>

      </div>
    </section><!-- Detalle -->

    <!-- Cuenta Detalle -->
    <section class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="{{ asset('logo/tecsup.png') }}" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="{{ asset('logo/noti.png') }}" alt="">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Información</h3>
              <ul>
                @if (Auth::user())
                <li><strong>Nombres: </strong>{{ Auth::user()->administrador->nombres }}</li>
                <li><strong>Correo: </strong>{{ Auth::user()->administrador->email}}</li>
                @endif
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Mensaje</h2>
              <p>
                La honradez te abrirá muchos caminos.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- Cuenta Detalles -->
    @endsection