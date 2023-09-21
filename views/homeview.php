<?php require_once 'views/partials/encabezado.php'; ?>
<div class="headf">
  <div class="section-principal">

    <img class="d-block mx-auto mb-4"
      src="assets/img/home.jpg"
      alt="" width="72" height="57">
    
    <div class="mar" style=" overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
        style="height: 100%; width: 100%;">
        <path d="M0.00,49.98 C293.73,136.50 287.52,-90.45 500.00,49.98 L500.27,151.30 L0.00,150.00 Z"
          style="stroke: none; fill: #242E45  ;"></path>
      </svg></div>

  </div>

</div>



<section>


  <div class="section-secundario">

    <div class="contenedor-collage">
      <h1 class="titulo ">OFICIOS</h1>
      <div class="galeria-port">

        <?php foreach ($resul_pgp as $fila) {       ; ?>
          <div class="imagen-port">

            <!-- <span id="hola">HOLA</span> -->
          
              <img src=<?php echo $fila["img_profesionuser"] ?> alt="img1">
           
        <a href="index.php?c=Busqueda&a=mostrarLista&type=<?php echo $fila["id_profesion_user"] ?>">
            <div class="hover-galeria">
              <img src="assets/img/mano.png" alt="img-1-rever">
              <p>
                <?php echo $fila["name_profesion_user"] ?>
              </p>
            </div>
             </a>
          </div>
        <?php } ?>

      </div>
    </div>
    <!-- SECCION DE CARTAS DE MISION Y VISION -->

    <div class="cartas">
      <div class="contenedor-cartas">

        <div class="contenedor-cartas-m">
          <div class="contenedor-cartext">
            <h1>Misión</h1>
            <p> Ayudar a la población que se encuentra o no en la necesidad de buscar un trabajo de forma autónoma, sin delimitar en los requisitos
              u habilidades que posee</p>
          </div>
          <div class="contenedor-imgm">
            <img
              src="assets/img/home.jpg"
              alt="imagen de mision">
          </div>
        </div>


        <div class="contenedor-cartas-m">
          <div class="contenedor-cartext">
            <h1>Visión</h1>
            <p>Lograr llegar a más lugares del país, ofreciendo los beneficios de generar más trabajo como también postulantes, para que las
              alternativas sobren a que falten.</p>
          </div>
          <div class="contenedor-imgm">
            <img
              src="assets/img/home.jpg"
              alt="imagen de mision">
          </div>
        </div>
      </div>
    </div>

    <!-- SECCION DE LOS BENEFICIO QUE TRAE LA PAGINA  -->
    <div class="carta-sevice">
      <div class="contenedor-collage-inferior">
        <h2 class="titulo">TE OFRECEMOS</h2>
        <div class="contenedor-service-cartas">
          <div class="servicio-ind">
            <img src="assets/img/practica.jpg" alt="img generar_empleo">
            <h3>GENERAR EMPLEO</h3>
            <p>Tener la oportunidad de publicar un servicio que desea resolver, la seguridad en mostrar todo dato 
              relevante del postulante y demás</p>
          </div>
          <div class="servicio-ind">
            <img src="assets/img/practica.jpg" alt="img generar_empleo">
            <h3>BÚSQUEDA DE EMPLEO</h3>
            <p>Presentar diferentes resultados de búsqueda por medio del lugar o el tipo de trabajos, con la opción de postular al servicio u trabajo </p>
          </div>
          <div class="servicio-ind">
            <img src="assets/img/practica.jpg" alt="img generar_empleo">
            <h3>VALORACIÓN</h3>
            <p>Mostrar el resultado valorado en porcentaje de todas las evaluaciones realizadas de posteriores trabajos</p>
          </div>
        </div>
      </div>

    </div>


  </div>
  <?php

  // echo $resul_pgp;
  ?>
</section>

<?php require_once 'views/partials/piedepagina.php'; ?>