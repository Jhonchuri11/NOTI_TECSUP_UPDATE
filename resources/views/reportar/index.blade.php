@extends('layouts.panel')

@section('contenido')
<!-- ======= Pasos  Reportar ======= -->
<section id="skills" class="fondo">
     <div class="container">
       <div class="section-title">
       <h2>Reportar</h2>
         <p>Para la realización de un reporte, tomar en cuenta los siguientes pasos:</p>
       </div>
       <div class="row">
         <div class="col-lg-6 col-md-6 icon-box" data-aos="fade-up">
           <div class="icon"><i class="bi bi-bookmark-check"></i></div>
           <h4 class="title"><a href="">Primer Paso</a></h4>
           <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
         </div>
         <div class="col-lg-6 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
           <div class="icon"><i class="bi bi-card-checklist"></i></div>
           <h4 class="title"><a href="">Segundo Paso</a></h4>
           <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
         </div>
         <div class="col-lg-6 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
           <div class="icon"><i class="bi bi-bar-chart"></i></div>
           <h4 class="title"><a href="">Tercer Paso</a></h4>
           <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
         </div>
         <div class="col-lg-6 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
           <div class="icon"><i class="bi bi-binoculars"></i></div>
           <h4 class="title"><a href="">Cuarto Paso</a></h4>
           <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
         </div>
       </div>
     </div>
 </section><!-- Pasos Reportar -->

   <!-- ======= Categorias ======= -->
   <section id="portfolio" class="portfolio section-bg">
     <div class="container">

       <div class="section-title">
         <h2>Categorías</h2>
         <p>Escoger una de las categorías que este relacionado con el problema que va reportar:</p>
       </div>         
        <div class="row">
          @foreach ($categorias as $categoria)
           <div class="categoria col-lg-3 col-md-12 icon-box" data-aos="fade-up">
                <h4><a class="cat" href="{{ route('reportar.create', ['categoria' => $categoria->nombre, 'categoria_id' => $categoria->id]) }}">
               {{ $categoria->nombre }}
            </a></h4>
           </div>
           @endforeach
        </div>
     </div>
   </section><!-- End Categorias -->

@endsection