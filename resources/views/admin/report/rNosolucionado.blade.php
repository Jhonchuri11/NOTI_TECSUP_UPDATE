@extends('admin.panel2')

@section('contenidos')
<!-- Reportes -->
<section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Reportes no solucionados</h2>
          <div class="row">
            <div class="col-lg-4" data-aos="fade-center">
               <a class="button" href="{{ route('Rejecutados') }}" type="button">Reportes ejecutados</a>
            </div>
            <div class="col-lg-4 pt-4 pt-lg-0 content" data-aos="fade-center">
               <a class="button" href="{{ route('Rsolucionados') }}">Reportes solucionados</a>
            </div>
            <div class="col-lg-4 pt-4 pt-lg-0 content" data-aos="fade-center">
               <a class="button" href="{{ route('Rnosolucionado') }}">Reportes no solucionados</a>
            </div>
          </div>
        </div>
        
        <div class="row" data-aos="fade-in">
        @if ($reportes->isEmpty())
           <h1>No tiene reportes no solucionados.</h1>
        @else
          @foreach($reportes as $reporte)
          <div class="col-lg-6 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i  class="bi bi-geo-alt"></i>
                <h4>Nombre reporte: {{ $reporte->categoria->nombre }}</h4>
                <p>Fecha: {{ $reporte->fecha }} </p>
                <p>Estado: {{ $reporte->estado }}</p>
              </div>
              <div class="enviar">
                <a href="{{ route('detalleaprobado', ['id' =>$reporte->id]) }}">Detalle</a>
              </div>
            </div>
          </div>
          @endforeach
        @endif
        </div>
      </div>
</section><!-- Reportes -->
@endsection