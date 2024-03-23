@extends('layouts.panel')

@section('contenido')
<!-- Detalle -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Detalles</h2>
          <ol>
            <li><a href="{{{ route('home') }}}">Home</a></li>
            <li>Reporte Detalles</li>
          </ol>
        </div>

      </div>
    </section><!-- Deatlle -->

    <!-- Reporte Detalle -->
    <section class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="/imagen/{{ $reporte->evidencia }}" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="/imagen/{{ $reporte->evidencia }}" alt="">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Información</h3>
              <ul>
                <li><strong>Categoria: </strong>{{ $reporte->categoria->nombre }} </li>
                <li><strong>Lugar: </strong>{{ $reporte->ubicacion }}</li>
                <li><strong>Fecha: </strong>{{ $reporte->fecha }} </li>
                <li><strong>Contactar | Administrador: </strong><i class="bi bi-telephone-fill"></i>913740129</li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Breve descripción</h2>
              <p>
                {{ $reporte->descripcion }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- Reporte Detalles -->

@endsection