@extends('layouts.panel')

@section('contenido')
 <!-- Nosotros Noti-Tecsup  -->
 <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>¿Quiénes somos?</h2>
          <p>Instituto TECSUP dedicada a formar profesionales globalmente competitivos, éticos e innovadores que cuenten con un profundo conocimiento tecnológico; asimismo apoyar a las empresas a incrementar su productividad y valor.</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="{{ asset('logo/noti.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Finalidad del desarrollo</h3>
            <p class="fst-italic">
            Notificar sobre los incidentes ocurridos en el campus: que tanto docentes, personal y alumnos puedan comunicar al administrador especializado sobre perdida de celular, objetos encontrados, servicios higiénicos sucios, desorden o incumplimiento de las normas de Tecsup por parte de los  alumnos.
            </p>
            <div class="row">
              <div class="col-lg-6">

              </div>
              <div class="col-lg-6">
                
              </div>
            </div>
            <p>
              Porque el Instituto Tecsup se dedica a formar profesionales que tengan una formación capacitada profesionalmente, y estos temas no deben interponerse, lo que queremos llegar es que dentro de la comunidad se tenga en cuenta el respeto, la honradez y sobre todo la empatía.
            </p>
          </div>
        </div>

      </div>
</section><!-- End Noti-Tecsup -->
<!-- Valores Primordiales -->
<section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Valores Primordiales</h2>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up">
                <p>
                  <i class="bi bi-chat-heart quote-icon-left"></i>
                  Éste es un mundo de sueños y palabras y cosas sin sentido, pero tú debes moestrar resto por Dios.
                  Eclesiastés 5:7
                  <i class="bi bi-chat-heart quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Respeto</h3>
                <h4>1</h4>
              </div>
            </div><!-- Repeto-->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">
                <p>
                  <i class="bi bi-hand-thumbs-up-fill quote-icon-left"></i>
                  El que es honrado en lo poco, también lo será en lo mucho; y el que no es integro en lo poco, tampoco lo será en lo mucho.
                  Lucas 16:10
                  <i class="bi bi-hand-thumbs-up-fill quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Honradez</h3>
                <h4>2</h4>
              </div>
            </div><!-- Honradez -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="200">
                <p>
                  <i class="bi bi-person-hearts quote-icon-left"></i>
                  Más bien, sean bondados y compasivos unos con otros, y perdónense mutuamente, así como Dios los perdonó a ustedes en Cristo.
                  Efesios 4:32
                  <i class="bi bi-person-hearts quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Empatía</h3>
                <h4>3</h4>
              </div>
            </div><!-- Empatía -->
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
</section><!-- Valores Primordiales -->
@endsection