@extends('admin.panel2')

@section('contenidos')
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
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Breve descripción</h2>
              <p>
                {{ $reporte->descripcion }}
              </p>
            </div>
            <div class="portfolio-description">
              @if ($reporte->estado === 'Aprobado')
              <h2>Acciones</h2>
              <form action="{{ route('ejecutarR', ['id' =>$reporte->id]) }}" method="POST">
                @csrf
                <button type="submit">Iniciar solución</button>
                <p></p>
              </form>
              @elseif ($reporte->estado === 'En ejecución')
              <h2>Acciones</h2>
              <form action="{{ route('solucionadoR', ['id' =>$reporte->id]) }}" method="POST">
                @csrf
                <button type="submit">Reporte solucionado</button>
                <p></p>
              </form>
              <form action="{{ route('noSolucionadoR', ['id' =>$reporte->id]) }}" method="POST">
                @csrf
                <button type="submit">No solucionado</button>
                <p></p>
              </form>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section><!-- Reporte Detalles -->

@endsection