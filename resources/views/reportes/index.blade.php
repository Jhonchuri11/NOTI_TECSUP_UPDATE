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
                <div class="enviar">
                <div class="text-center">
                <form id="eliminar" action="{{ route('reportar.destroy', $reporte->id) }}"  method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" >Eliminar Reporte</button>
              </form>
                </div>
            </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
</section><!-- Reportes -->
@endsection
@section('scripts')
<script>
  (function (){
        'use strict'
        var forms = document.querySelectorAll('#eliminar')
        Array.prototype.slice.call(forms)
           .forEach(function (form) {
              form.addEventListener('submit', function(event) {
                event.preventDefault()
                event.stopPropagation()
                Swal.fire({
                    title: '¿Confirma la eliminacion de su reporte?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#20c997',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Confirmar'
                  }).then((result) => {
                    if(result.isConfirmed) {
                        Swal.fire('¡Eliminado!', 'Su reporte ha sido eliminado exitosamente.','success');
                        this.submit();
                    }
                  })    
              }, false)
           })
    })()
</script>
@endsection