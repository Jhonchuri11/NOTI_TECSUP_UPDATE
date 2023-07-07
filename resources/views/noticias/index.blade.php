@extends('layouts.panel')

@section('contenido')
<!-- Objetos perdidos | en cuenta que ya no se usaría el buton con diversas categorias  -->
<section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Pérdida de objetos</h2>
          <p>¡Mantente alerta</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
          @foreach($reportes as $reporte)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="/imagen/{{ $reporte->evidencia }}" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="/imagen/{{ $reporte->evidencia }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Pérdida de objeto"><i>Ver</i></a>
                <a href="{{ route('detalle', ['id' => $reporte->id]) }}" title="More Details"><i>Detalle</i></a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- Objetos perdidos -->
@endsection