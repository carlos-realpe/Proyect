<?php
if (!isset($_SESSION)) {
  session_start();

}






?>


<html lang="es">

<head>
  <title>Workanimus</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/regisylog.css" />
  <script src="assets/jss/script.js"></script>

  <link rel="stylesheet" href="assets/css/perfil-oferta.css" />
  <link rel="stylesheet" href="assets\css\ventana-oculta.css" />
  <!-- ********ocultar r********* -->


  <!-- ********css de BOOTSTRAP********* -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script> -->

  <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script>  OJO AQUI -->

  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/jss/sweetalert.min.js"></script>

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script> 



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script> -->


  <!-- *****eddy**** -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


  <style>
    /* NAV BAR*/

    .bg-light {
      /*background-color: rgb(197 197 197 / 90%) !important;*/
      background-color: var(--colorNegro) !important;

    }

    .nav-link {
      color: var(--colorBlanco);
    }

    .nav-link:hover {
      color: var(--colorTurquesa);
    }

    .navbar-brand {
      color: var(--colorBlanco);
    }

    .navbar-brand:hover {
      color: var(--colorBlanco);
    }

    .dropdown-item {
      width: 350px;
    }

    .dropdown-item:hover {
      background-color: var(--colorTurquesa);
    }

    .navbar-toggler {
      background-color: white;
    }

    /* BOTONES*/
    .btn-primary {
      --bs-btn-bg: var(--colorTurquesa);
      --bs-btn-border-color: var(--colorTurquesa);
      --bs-btn-hover-bg: var(--colorAzul);
      --bs-btn-hover-border-color: var(--colorAzul);
    }

    /* menu despegable*/
    .dropdown-menu.show {
      top: 3px;
      right: 0px;
      left: auto;
      /*background:linear-gradient(54deg, var(--colorAzul1) 0%, var(--colorTurquesa) 28%, var(--colorAzul1) 100%);*/
    }

    .card-msg {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
    }

    .dropdown-item {
      border-radius: 5px;
      margin-right: 10px;
      margin-left: 10px;
      width: 300px;
    }

    .border_reci {
      border: 1px solid gray;
      margin: auto 10px;
      background-color: whitesmoke;
    }

    .titulos_msg {
      font-weight: bold;
      margin-top: 10px;
      margin-left: 10px;
      border-bottom: 1mm ridge rgb(9 25 38 / 88%);
      /* border-bottom-width: medium; */
    }

    /* estilos de apartado de mensaje, cuando no existen contactos de chat */
    .noexist_contac,
    .noexist_empleado {
      text-align: center;
      margin: 5px;
      padding: 28px 80px;
      background-color: #d5e0e1e8;
      font-weight: bold;
      /* width: 300px; */

    }

    .btn-toolbar {
      display: flex;
      flex-wrap: nowrap;
    }

    /* barra lateral subida y bajada */
    /* #listaChat,
    #listaChatMiPublicacion, */
    /* #listaChat2,
    #listaChatMiPublicacion2 {
      height: 90px;
      overflow: auto;
    } */
    .fs-5 {
      font-size: 1rem !important;
    }
  </style>


</head>


<body>


  <header>

    <script type="text/javascript" src="assets/jss/Notificar.js">  </script>
    <script type="text/javascript" src="assets/jss/ChatLista.js">  </script>

    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php" style="font-size:22px;">WORKANIMUS</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" href="#offcanvasExample"
          aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
          </span>
        </button>



        <!-- OFFCANVAS MAIN CONTAINER START -->
        <section class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
          aria-labelledby="offcanvasExampleLabel" style="background-color: var(--colorAzul);">

          <div class="offcanvas-header" data-bs-theme="dark">
            <h5 class="offcanvas-title text-info">WORKANIMUS</h5>
            <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="offcanvas"></button>
          </div>




          <div style="align-items: center;" class="offcanvas-body">
            <ul class="navbar-nav fs-5 me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
              </li>
              <?php if (!isset($_SESSION["rol"]) || $_SESSION["rol"] == "user") { ?>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?c=Busqueda&a=mostrarLista">Buscar Trabajos</a>
                </li>
                <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['rol']) && $_SESSION['rol'] == "user") { ?>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php?c=Registro&a=generarOferta">Generar Trabajo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php?c=Postulacion&a=postulacion&type=postulacion">Postulaciones</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php?c=Postulacion&a=postulacion&type=publicacion">Publicaciones</a>
                  </li>

                <?php }
              } ?>
            </ul>
            <!-- =============================== SESION PERFIL ===================================== -->
            <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['rol']) && $_SESSION['rol'] == "user") { ?>


              <!-- =============================== BOTON DE CHAT ===================================== -->
              <div class="btn-group me-2">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                  style="margin-right:10px;">

                  <span class="material-symbols-outlined"> chat</span>

                  <span class="position-absolute top-10 start-105 translate-middle badge rounded-pill bg-danger"
                    id="contadorChat"></span>

                </a>
                <!-- style="max-width:300px -->
                <ul class="dropdown-menu fs-6" aria-labelledby="dropdownMenuButton" id="chatMenu1">
                  <div>
                    <h4 style=" text-align:center;">CHAT</h4>
                  </div>



                  <p class="titulos_msg">Lista de Trabajos</p>
                  <div class="mt-2 border_reci">
                    <div id="listaChat"></div>

                  </div>
                  <p class="titulos_msg">Lista de Empleados</p>
                  <div class="mt-2 border_reci">
                    <div id="listaChatMiPublicacion"></div>

                  </div>

                </ul>





                <!-- =============================== NOTIFICACIONES ===================================== -->



                <li class="nav-item dropdown position-relative" style="margin-right:10px; list-style: none;">
                  <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                    onclick="notificarLeido()"><span class="material-symbols-outlined">
                      notifications
                    </span>
                    <span class="position-absolute top-10 start-105 translate-middle badge rounded-pill bg-danger"
                      id="contador"></span></a>
                  <ul class="dropdown-menu" style=" right: 15px;">
                    <div id="listaNotificaciones">

                    </div>
                  </ul>
                </li>
              </div>
              <!-- =============================== FIN DE NOTIFICACIONES ===================================== -->


              <div style="margin-right:80px;">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown ">
                    <a onclick="porcentaje()" class="nav-link dropdown-toggle" href="#" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <!-- <img src="assets/img/perfilBase/perfilBase.jpg" alt="Avatar Logo" style="width:55px; height:40px"
                                class="rounded-pill"> -->

                      <img src="<?php echo $_SESSION['url']; ?>" alt="Avatar Logo" style="width:55px; height:40px;"
                        class="rounded-pill">

                    </a>


                    <div class="dropdown-menu">
                      <div style="text-align: center;">
                        <img src="<?php echo $_SESSION['url']; ?>" alt="Avatar Logo" style="width:105px; height :100px;"
                          class="rounded-pill">
                        <!-- <img src="assets/img/perfilBase/perfilBase.jpg" alt="Avatar Logo"
                                style="width:105px; height :100px;" class="rounded-pill">  -->
                      </div>

                      <div style="text-align: center;">
                        <!-- 
                            <div class="valoracion">
                              <input id="radio1" type="radio" name="estrellas" value="3">
                              <label for="radio1">★</label>
                              <input style="width:150px;" id="radio2" type="radio" name="estrellas" value="2">
                              <label for="radio2">★</label>
                              <input id="radio3" type="radio" name="estrellas" value="1">
                              <label for="radio3">★</label>
                            </div>
                -->


                      </div>

                      <div class="progress" id="barraProgreso" >
                        <div class="progress-bar" role="progressbar" 
                          style="width: <?php echo $_SESSION['porcentaje'] ?>%;" aria-valuenow="25" aria-valuemin="0"
                          aria-valuemax="100"> <?php echo $_SESSION['porcentaje'] . "%" ?>
                        </div>
                      </div>

               

                      <div>
                        <p style="font-size: 70%; color:gray; text-align:center;">Recomendación</p>
                      </div>




                      <p class="dropdown-item" style="text-align: center;">
                        <?php echo $_SESSION['Nombre']; ?>
                      </p>
  <a class="dropdown-item" href="index.php?c=Busqueda&a=HistorialVacantesMostrar">Historial de Vacantes</a>

                      <a class="dropdown-item" href="index.php?c=Calificar&a=calificarMostrar">Vacantes Aceptadas</a>
                      <a class="dropdown-item" href="index.php?c=Perfil&a=miPerfil">Mi Perfil</a>

                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="index.php?c=Login&a=cerrarSesion">Cerrar Sesión</a>
                      <input type="text" id="cons" value="<?php echo $_SESSION['id']; ?>" hidden>
                    </div>
                  </li>
                </ul>



                <!--- ADMIN --->
              <?php } else if (isset($_SESSION['rol']) && $_SESSION['rol'] == "admin") { ?>

              <ul class="navbar-nav">
                <li class="nav-item dropdown ">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="<?php echo $_SESSION['url']; ?>" alt="Avatar Logo" style="width:55px; height:40px;"
                      class="rounded-pill">

                  </a>


                  <div class="dropdown-menu">
                    <div style="text-align: center;">
                      <img src="<?php echo $_SESSION['url']; ?>" alt="Avatar Logo" style="width:105px; height :100px;"
                        class="rounded-pill">
                    </div>

                    <div style="text-align: center;">

                    </div>


                    <p class="dropdown-item" style="text-align: center;">
                      <?php echo $_SESSION['Nombre']; ?>
                    </p>
                    <a class="dropdown-item" href="index.php?c=Admin&a=ListaUsuarios">Lista de Usuarios</a>
                    <a class="dropdown-item" href="index.php?c=Admin&a=ListaTrabajos">Lista de Trabajos</a>
                    <a class="dropdown-item" href="index.php?c=Admin&a=Profesiones">Oficios</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?c=Login&a=cerrarSesion">CERRAR SESIÓN</a>
                    <input type="text" id="cons" value="<?php echo $_SESSION['id']; ?>" hidden>
                  </div>
                </li>
              </ul>
              <!-- =============================== FIN ADMIN ===================================== -->






              <?php } else { ?>
                  <!-- =============================== FIN SESISON PERFIL ===================================== -->
                  <ul class="navbar-nav">
                    <li>
                      <a class="nav-link" aria-current="page" href="index.php?c=Login&a=Login&p=login">Iniciar Sesión</a>
                    </li>

                    <li>
                      <a class="nav-link" aria-current="page"
                        href="index.php?c=Registro&a=Registro&p=registro">Registrarse</a>
                    </li>
                  </ul>


              <?php } ?>



            </div>
          </div>
        </section>
      </div>

    </nav>

  </header>