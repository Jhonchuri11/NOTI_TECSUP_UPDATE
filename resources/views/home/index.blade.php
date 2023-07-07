@extends('layouts.panel')

@section('contenido')
<!--  Presentación  -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>Noti-Tecsup</h1>
      <p>Te da la <span class="typed" data-typed-items="'¡Bienvenida!'"></span></p>
    </div>
  </section><!-- End presentación -->
@endsection
@section('scripts')
  @if (Session::has('success'))
     <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
       } 
      })
      Toast.fire({
        icon: 'success',
        title: 'Iniciando sesión con éxito!'
      })
     </script>
  @endif
@endsection