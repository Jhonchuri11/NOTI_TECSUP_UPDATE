@extends('admin.panel2')

@section('contenidos')
<!-- ======= Pasos  Reportar ======= -->
<section id="skills" class="fondo">
     <div class="container">
       <div class="section-title">
       <h2>Categorias</h2>
         <p>Dentro de las categorias encontradas, tenemos los siguientes:</p>
       </div>
       <div class="table-responsive">
            <table  class="table table-hover table-striped">
                <thead>
                <tr>
                <div>
                {!! $categorias->links() !!}
             </div>
                    <th>Nombres</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                    
                </tr>
                </thead>
                <tbody>
                @foreach ($categorias as $categoria)
                <tr>
	                <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
				 <td>
                    <div class="text-center justify-center">
                       <button  class="bi bi-eyedropper" data-bs-toggle="modal" data-bs-target="#ModalA{{ $categoria->id }}"></button>
                       <form id="eliminar" action="{{ route('eliminar', $categoria->id) }}"  method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="bi bi-trash-fill"></button>
                       </form>
                    </div>
				 </td>
				</tr>                            
                </tbody>
                @endforeach
            </table>
        </div>
     </div>
 </section><!-- Pasos Reportar -->
   <!-- ======= Categorias ======= -->
   <section id="portfolio" class="portfolio section-bg">
     <div class="container">

       <div class="section-title">
         <h2>+INFO</h2>
         <p>Para el caso de agregar una nueva categoria:</p>
       </div>

        <div class="row">
           <div class="categoria col-lg-3 col-md-12 icon-box" >
                <h4><a class="cat" data-bs-toggle="modal" data-bs-target="#Modal">
                  Crear nueva categoría
               </a></h4>
           </div>
        </div>
     </div>
   </section><!-- End Categorias -->

<!-- ModalCrear -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creando nueva categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('pendiente.store') }}" method="POST" >
            @csrf
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="name">Categoria</label>
                  <input type="text" class="form-control" name="categoria" id="categoria" required>
                </div>
                <div class="form-group col-md-12">
                  <label for="name">Descripción</label>
                  <textarea type="text" class="form-control" name="descripcion" id="deescripcion" required></textarea>
                </div>
              </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <button type="submit" class="btn btn-primary">Crear</button>
            </div>
      </form>
    </div>
  </div>
</div>
@foreach ($categorias as $categoria)
<!-- Modal2 Actualizar -->
<div class="modal fade" id="ModalA{{ $categoria->id }}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('pendiente.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="name">Categoria</label>
                  <input type="text" value="{{ $categoria->nombre }}" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="form-group col-md-12">
                  <label for="name">Descripción</label>
                  <textarea type="text" class="form-control" name="descripcion" id="descripcion">{{ $categoria->descripcion }}</textarea>
                </div>
              </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
      </form>
    </div>
  </div>
</div>
@endforeach
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
                    title: 'Confirma la eliminación de la categoria?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#20c997',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Confirmar'
                  }).then((result) => {
                    if(result.isConfirmed) {
                        Swal.fire('¡Eliminado!', 'La categoria ha sido eliminado exitosamente.','success');
                        this.submit();
                    }
                  })    
              }, false)
           })
    })()
</script>
@endsection