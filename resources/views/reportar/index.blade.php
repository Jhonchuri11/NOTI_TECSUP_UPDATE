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
           <p class="description">Seleccionar la categoría según el tipo de incidente.</p>
         </div>
         <div class="col-lg-6 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
           <div class="icon"><i class="bi bi-card-checklist"></i></div>
           <h4 class="title"><a href="">Segundo Paso</a></h4>
           <p class="description">Llenar cada campo según corresponda la categoría.</p>
         </div>
         <div class="col-lg-6 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
           <div class="icon"><i class="bi bi-bar-chart"></i></div>
           <h4 class="title"><a href="">Tercer Paso</a></h4>
           <p class="description">Después del llenado de datos se procederá el envio del reporte.</p>
         </div>
         <div class="col-lg-6 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
           <div class="icon"><i class="bi bi-binoculars"></i></div>
           <h4 class="title"><a href="">Cuarto Paso</a></h4>
           <p class="description">Para la verificación del reporte, se tomará en cuenta el estado según sea la categoría.</p>
         </div>
       </div>
     </div>
 </section><!-- Pasos Reportar -->

   <!-- ======= Categorias ======= -->
   <section id="portfolio" class="section-bg">
     <div class="container">

       <div class="section-title">
         <h2>+INFO</h2>
         <p>Escoger una de las categorías que este relacionado con el problema que va reportar:</p>
       </div>         
        <div class="row">
           <div class="categoria col-lg-3 col-md-12 icon-box" >
                <h4><a class="cat" href="{{ route('reportar.create') }}">
                  Ir a reportar
               </a></h4>
           </div>
        </div>
     </div>
   </section><!-- End Categorias -->

@endsection