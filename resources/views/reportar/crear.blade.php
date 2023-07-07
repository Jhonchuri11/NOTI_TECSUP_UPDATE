@extends('layouts.panel')

@section('contenido')
<!-- Formulario para reporte -->
<section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Iniciar Reporte</h2>
          <p>La importancia de estar unidos!</p>
        </div>
        <div class="row" data-aos="fade-in">
          <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="{{ route('envio_reporte') }}" method="POST" role="form" class="php-email-form" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="categoria">Categoría</label>
                  <input type="hidden" name="categoria_id" value="{{ $categoriaIdSeleccionada }}">
                  <input type="text" class="form-control" value="{{ $categoriaSeleccionada }}" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Ubicación</label>
                  <input type="text" class="form-control" name="ubicacion" id="ubicacion" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Fecha</label>
                  <input type="datetime-local" class="form-control" name="fecha" id="fecha" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Descripción</label>
                  <input type="text" class="form-control" name="descripcion" id="deescripcion" required>
                </div>
              </div>
            <div class="imagenes">
                <img id="Seleccionar">
            </div>
            <div>
               <label>Subir Imagen</label>
            <div class="drag-area">
                <label>
                <div class="icono">
                <svg class="icon txt-center" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"></path>
                </svg>
                 <p class="txt-center col-md-12">Selecionar imagen</p>
                </div>
                <input name="imagen" id="imagen" type="file" class="hidden" />
               </label>
            </div>
            </div>
            <div class="enviar">
                <div class="text-center">
                <button type="submit">Enviar</button>
                </div>
            </div>
        </form>
          </div>
        </div>
      </div>
</section>
<!-- Formulario para registrar reporten -->
<script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(e){
        $('#imagen').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#Seleccionar').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        })
    }) 
</script>
@endsection