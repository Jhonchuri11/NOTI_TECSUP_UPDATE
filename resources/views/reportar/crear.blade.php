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
            <form id="enviar" action="{{ route('envio_reporte') }}" method="POST" role="form" class="php-email-form" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="categoria">Categoría</label>
                  <select class="form-control" name="categoria_id" id="categoria" required>
                    <option value="">Seleccionar categoria</option>
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                <!--   <option>Otra</option>  ---> 
                  </select>
                </div>
                <!--
                <div class="form-group col-md-6">
                    <label for="otra_categoria">Otra Categoría</label>
                    <input type="text" class="form-control" name="otra_categoria" id="otra_categoria">
                </div>  -->
                <div class="form-group col-md-6">
                  <label for="name">Ubicación</label>
                  <input type="text" class="form-control" name="ubicacion" id="ubicacion" placeholder="Ejemplo: Aula 706" required>
                  @error('ubicacion')
                 <small style="color: red;">{{ $message }}</small>
               @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Fecha</label>
                  <input type="datetime-local" class="form-control" name="fecha" id="fecha" required>
                  @error('fecha')
                 <small style="color: red;">{{ $message }}</small>
               @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Descripción</label>
                  <input type="text" class="form-control" name="descripcion" id="deescripcion" placeholder="Describir a detalle según la categoria" required>
                </div>
                @error('descripcion')
                 <small style="color: red;">{{ $message }}</small>
               @enderror
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
                <input name="imagen" id="imagen" type="file" class="hidden" required/>
               </label>
               @error('imagen')
                 <small style="color: red;">{{ $message }}</small>
               @enderror
            </div>
            </div>
            <div class="enviar">
                <div class="text-center">
                <button id="envio" class="envio" type="submit">Enviar</button>
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
@section('scripts')
<script>
  (function (){
        'use strict'
        var forms = document.querySelectorAll('#enviar')
        Array.prototype.slice.call(forms)
           .forEach(function (form) {
              form.addEventListener('submit', function(event) {
                event.preventDefault()
                event.stopPropagation()
                Swal.fire({
                    title: '¿Confirma el envio de reporte?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#20c997',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Confirmar'
                  }).then((result) => {
                    if(result.isConfirmed) {
                        Swal.fire('¡Enviado!', 'El reporte ha sido enviado exitosamente.','success');
                        this.submit();
                    }
                  })    
              }, false)
           })
    })()
</script>
@endsection

