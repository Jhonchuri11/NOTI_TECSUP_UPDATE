@extends('layouts.panel')

@section('contenido')
<!-- Reportes -->
<section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Historial de reportes</h2>
          <p>Tus últimos reportes</p>
        </div>

        <div class="row" data-aos="fade-in">
          @foreach($reportes as $reporte)
          <div class="col-lg-6 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-file-text"></i>
                <h4>Categoria: {{ $reporte->categoria->nombre }}</h4>
                <p>Fecha: {{ $reporte->fecha }} </p>
                <h4>Estado: {{ $reporte->estado }}</h4>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
</section><!-- Reportes -->
@endsection