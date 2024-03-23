@extends('admin.panel2')

@section('contenidos')

<!-- Reportes -->
<section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Reportes Actualizados</h2>
          <p>Muestra de reportes</p>
        </div>
        
        <div class="row" data-aos="fade-in">
        @if ($reportes->isEmpty())
           <h1>No tiene reportes recibidos.</h1>
        @else
          @foreach($reportes as $reporte)
          <div class="col-lg-6 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i  class="bi bi-geo-alt"></i>
                <h4>Nombre reporte: {{ $reporte->categoria->nombre }}</h4>
                <p>Fecha: {{ $reporte->fecha }} </p>
              </div>
              <div class="enviar">
                <a href="{{ route('detalleA', ['id' =>$reporte->id]) }}">Detalle</a>
              </div>
            </div>
          </div>
          @endforeach
        @endif
        </div>
      </div>
</section><!-- Reportes -->
@endsection