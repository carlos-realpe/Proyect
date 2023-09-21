<?php require_once 'views/partials/encabezado.php'; ?>
<style>
    .cards-wrapper {
        display: flex;
        justify-content: center;
    }

    .card img {
        max-width: 100%;
        max-height: 100%;
    }

    .card {
        margin: 0 0.5em;
        box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
        border: none;
        border-radius: 0;

    }

    .carousel-inner {
        padding-bottom: 1em;
    }

    .carousel-item-next,
    .carousel-item-prev,
    .carousel-item.active {
        display: flex;
        justify-content: space-around;
    }

    #inlineFrameExample {
        position: absolute;
        top: -445px;
        /*left:-465px;*/
        width: 690px;
        height: 735px;
    }

    #outerdiv {
        /* width: 100%;
        height: 100%; */
        overflow: hidden;
        position: relative;
        text-align: center;
        text-decoration: none;
    }

    #outerdiv a {
        text-decoration: none;
    }

    .carousel-control-prev,
    .carousel-control-next {
        background-color: var(--colorAzul);
        width: 5vh;
        height: 5vh;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
    }

    .fechamodific {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row-reverse;
        margin: 15px auto;
        font-weight: bold;
        font-family: inherit;
        color: #b0b3b8;
        font-size: 15px;
    }

    .boton_acep_rech_vmas {
        display: flex;
        flex-direction: row;
        gap: 10px;
    }

    .modal-vermas {
        width: 130%;
        right: 15%;
    }

    @media (min-width: 768px) {
        .card img {
            height: 11em;
        }
    }

    @media (max-width: 990px) {
        .modal-vermas {
            width: auto;
            right: auto;
        }

        .bloques-izde {
            flex-direction: column;
            gap: 0px;
            padding: 0px;
        }

        .bloque-izquierdo-vm,
        .bloque-derecho-vm {
            width: 100%;
            padding: 100px;
            text-align: center;
            padding: 10px;
        }

        .boton_acep_rech_vmas {
            display: flex;
            width: 100%;
            flex-flow: row wrap;
            text-align: center;
            justify-content: center;
            gap: 5px;
        }
    }



    #map {
        width: 400px;
    }
</style>
<section>


    <div id="contenedor">
        <div class="formularios">

            <div class="row justify-content-lg-center">
                <div style="text-align:end" ;>
                    <a style="color:red; width: auto;" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Reportar
                    </a>
                </div>
                <div style="text-align:center" ;>
                    <img src="  <?php echo $resultados["foto_trabajo"]; ?>" alt="Avatar Logo"
                        style="width:200px; height :200px;" class="rounded mx-auto d-block"> </img>
                </div>
                <div style="text-align:center" ;>
                    <h2 id="tituloTrabajo">
                        <?php echo $resultados["titulo"]; ?>
                    </h2>
                    <h5>
                        <?php echo $resultados["nombre"] . " " . $resultados["Apellido"]; ?>
                    </h5>
                    <input type="hidden" id="telfUser" value="<?php echo $resultados["telefono"]; ?>">

                    <?php
                    if ($estado == 0) {
                        $estado = "EN PROGRESO";
                        $color = "";
                    }
                    if ($estado == 1) {
                        $estado = "ACEPTADO";
                        $color = "green";
                    }
                    if ($estado == 2) {
                        $estado = "RECHAZADO";
                        $color = "red";
                    }
                    if ($estado == 3) {
                        $estado = "TRABAJO CULMINADO";
                        $color = "orange";
                    }
                    ?>




                    <div>
                        <h6 style="color:<?php echo $color; ?>; text-align:center;">
                            <?php echo $estado; ?>
                        </h6>
                    </div>


                </div>

                <?php
                $tmp = $resultados["fecha"];
                $fecha = date('Y-m-d');
                // $fecha="2024-02-14";
                $dias = floor((strtotime($fecha) - strtotime($tmp)) / (60 * 60 * 24));


                function calcularSemanasEnDias($dias)
                {
                    $semanas = floor($dias / 7);
                    return $semanas;
                }
                $cantidadesemana = calcularSemanasEnDias($dias);

                // var_dump($cantidadesemana);
                
                if ($dias > 7 && $dias < 14) {
                    echo "<div class='fechamodific'> Publicado hace " . $cantidadesemana . " semana</div>";
                }
                if ($dias >= 14) {
                    echo "<div class='fechamodific'> Publicado hace " . $cantidadesemana . " semanas</div>";

                }
                if ($dias < 7 && $dias > 1) {
                    echo "<div class='fechamodific'> Publicado hace " . $dias . " días</div>";
                }
                if ($dias == 1) {

                    echo "<div class='fechamodific'> Publicado hace " . $dias . " día</div>";
                }
                if ($dias == 0) {
                    echo "<div class='fechamodific'> publicado recientemente</div>";
                }

                //  if($dias>7){
                
                //  }else{
//     echo "<div class='fechamodific'> Publicado hace".$cantidadesemana." semana</div>";
//  }
                ?>


                <?php if ($estado == "ACEPTADO") { ?>
                    <hr id="barraform">
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <img style="width:200px; height :200px;" class="rounded"
                                    src="<?php echo $resultados["foto_perfil"]; ?>" alt="">
                            </div>
                            <div class="col-9"
                                style="text-align:left; white-space: nowrap; text-overflow: ellipsis; overflow: hidden; ">
                                <h5>Información del Usuario: </h5>
                                <p> <b>Nombre: </b>
                                    <?php echo $resultados["nombre"]; ?>
                                </p>
                                <p><b> Apellido:</b>
                                    <?php echo $resultados["Apellido"]; ?>
                                </p>
                                <p> <b>Teléfono:</b>
                                    <?php echo "0" . $resultados["telefono"]; ?>
                                </p>
                                <p> <b>Email:</b>
                                    <?php echo $resultados["email"]; ?>
                                </p>
                                <p> <b>Ciudad:</b>
                                    <?php echo $resultados["lugar"]; ?>
                                </p>
                            </div>

                        </div>





                    </div>
                <?php } ?>



                <?php if ($mensaje == "Eliminar") { ?>
                    <div id=contenedorSoli>


                    </div>


                <?php } ?>





                <hr id="barraform">



                <div class="row justify-content-lg-center">

                    <h5>Detalle del Anuncio</h5>

                    <P>
                        <?php echo $resultados["detalle"]; ?>
                    </P>
                </div>


                <hr id="barraform">


                <!---*********************************  --->

                <div class="col ">

                    <div style=" display: flex;">
                        <span style="margin-right:8px;" class="material-symbols-outlined">
                            home_repair_service
                        </span>
                        <p> Oficio:
                            <?php



                            foreach ($selec_profesion as $valores):
                                if ($resultados['labor_trabajo'] == $valores["id_profesion_user"]) {

                                    echo $valores["name_profesion_user"];

                                }

                            endforeach;




                            ?>
                        </p>
                    </div>

                    <div style=" display: flex;">
                        <span style="margin-right:8px;" class="material-symbols-outlined ">
                            schedule
                        </span>
                        <p> Tiempo de duración del trabajo:
                            <?php
                            if (isset($resultados["lbl_tiempo"]) && $resultados["cntd_tiempo"] == 0) {
                                $resultados["cntd_tiempo"] = "---";
                                $filaresult = "";
                            }
                            switch ($resultados["lbl_tiempo"]) {

                                case 'h':
                                    if ($resultados["cntd_tiempo"] > 1 && $resultados["cntd_tiempo"]) {
                                        $filaresult = "horas";
                                    } else {
                                        $filaresult = "hora";
                                    }

                                    break;
                                case 'm':
                                    if ($resultados["cntd_tiempo"] > 1 && $resultados["cntd_tiempo"]) {
                                        $filaresult = "meses";
                                    } else {
                                        $filaresult = "mes";
                                    }
                                    break;
                                case 'a':
                                    if ($resultados["cntd_tiempo"] > 1 && $resultados["cntd_tiempo"]) {
                                        $filaresult = "años";
                                    } else {
                                        $filaresult = "año";
                                    }
                                    break;
                                case '':
                                    $resultados["cntd_tiempo"] = "---";
                                    $filaresult = "";
                                    break;
                            }


                            echo $resultados["cntd_tiempo"] . " " . $filaresult ?>
                        </p>
                    </div>


                    <div style=" display: flex;">
                        <span style="margin-right:8px;" class="material-symbols-outlined">
                            payments
                        </span>
                        <p> Sueldo por
                            <?php if ($filaresult == "") {
                                echo "Mes";
                            } else
                                echo $filaresult; ?>:
                            <?php echo "$" . $resultados["precio"]; ?>
                        </p>
                    </div>




                    <div style=" display: flex;">
                        <span style="margin-right:8px;" class="material-symbols-outlined">
                            groups
                        </span>
                        <p id="numVacante"> Vacante:
                            <?php echo $resultados["vacante"]; ?>
                        </p>
                    </div>


                    <div style=" display: flex;">
                        <span style="margin-right:8px;" class="material-symbols-outlined">
                            location_on
                        </span>
                        <p> Ciudad:
                            <?php echo $resultados["lugar-trabajo"]; ?>
                        </p>
                    </div>

                </div>



                <hr id="vertical">
                <input type="hidden" id="longitud" name="longitud" value='<?php echo $resultados["longitud"]; ?>'>
                <input type="hidden" id="latitud" name="latitud" value='<?php echo $resultados["latitud"]; ?>'>

                <div class="col-md-6" id="map"> </div>

                <!---*********************************  --->


                <div style=" display: flex; display:inline; text-align:center; padding-top:5%;">
                    <?php
                    if ($mensaje == "Eliminar") {
                        $btn = "btn-danger";
                    } else {
                        $btn = "btn-primary";
                    }

                    ?>


                    <a href="index.php?c=Postulacion&a=<?php echo $mensaje ?>&postu=<?php echo $resultados["id_registro_trabajo"] ?>"
                        class="card-link btn  <?php echo $btn; ?>" <?php if ($mensaje == "Eliminar") {
                               echo 'id="eliminarPublicacion"';
                           } ?>>
                        <?php echo $mensaje . " " . $mensaje2 ?>
                    </a>
                    <?php if ($mensaje == "Eliminar") { ?>
                    <a href="index.php?c=Postulacion&a=<?php echo $mensaje ?>&postu=<?php echo $resultados["id_registro_trabajo"] ?>&terminar=terminar"
                        class="card-link btn btn-primary" id="terminarTrabajo">
                        Culminar Trabajo
                    </a>

                    <?php } ?>






                </div>

            </div>

            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVfpKuY8R6Yxja9m65-lOjga4d8sTlB3g&callback=mapaConsulta"></script>










        </div>
    </div>

    <!-- <div class="overlai" id="overlai">
        <div class="popup" id="popup">
            <a href="#" id="btn-cerrar" class="btn-cerrar">
                <span class="material-symbols-outlined">disabled_by_default</span>
            </a>

            <div class="descripcion-gnrl-postulante">
                <div class="portada-popup">
                    <img width="100px" height="100px" src="https://cengage.force.com/resource/1607465003000/loginIcon"
                        alt="img-avatar" />
                    <h4> Carlos Andres Realpe Melendres</h4>
                </div>
                <hr>
                <div class=" bloques-izde">
                    <div class="bloque-izquierdo-vm ">
                        <p>E-mail: carlos@hotmail.com</p>
                        <p>Telefono: 123456789</p>
                        <p>Ciudad: Gauayas</p>

                    </div>
                    <hr id="vertical">
                    <div class="bloque-derecho-vm ">
                        <p>Especialidades en trabajo:</p>
                        <p>gafitero </p>
                        <p>CURRICULUM: </p>
                        <img style="width: 100px; height: 100px;"
                            src="https://www.tipos.co/wp-content/uploads/2014/12/archivo-e1418047657309.jpg" alt="">



                    </div>
                </div>
            </div>
        </div>




    </div> -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-vermas"> <!-- style="width:150%;     right: 20%;" -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Solicitud de Vacantes</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="descripcion-gnrl-postulante">

                        <div class="portada-popup" id="perfilpostu3"></div>

                        <hr>
                        <div class=" bloques-izde">
                            <div class="bloque-izquierdo-vm perfilpostu" id="perfilpostu">
                                <!-- <p>E-mail: carlos@hotmail.com</p>
                                <p>Telefono: 123456789</p>
                                <p>Ciudad: Gauayas</p> -->


                            </div>
                            <hr id="vertical">
                            <div class="bloque-derecho-vm perfilpostu2 " id="perfilpostu2">
                                <!-- <p>Especialidades en trabajo:</p>
                            <p>gafitero </p>
                            <p>CURRICULUM: </p> -->
                                <!-- <img style="width: 100px; height: 100px;"
                                src="https://www.tipos.co/wp-content/uploads/2014/12/archivo-e1418047657309.jpg" alt=""> -->



                            </div>

                        </div>
                        <div id="outerdiv">
                            <a target="_blank"
                                href="https://certificados.ministeriodelinterior.gob.ec/gestorcertificados/antecedentes/">Ingrese
                                Aqui
                                <img style="width: 100%;height: 100%;" src="assets\img\imgtrabajosfav\Antecedentes.jpg"
                                    alt="No Found"></a>
                            <!--   <iframe id="inlineFrameExample"  name="container-fluid" title="Inline Frame Example" width="100%" height="500px" 
                            src="https://procesosjudiciales.funcionjudicial.gob.ec/expel-busqueda-avanzada"></iframe> -->
                        </div>
                    </div>
                    <!-- <div class="perfilpostu" id="perfilpostu"></div> -->


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>






    <!---- ****** REPORTE**********----->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reportar Publicación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <h8><b>Seleccione la razón del reporte: </b></h8>
                    <?php $nombre = $resultados["nombre"] . " " . $resultados["Apellido"]; ?>
                    <input type="hidden" value="<?php echo $resultados["nombre"] . " " . $resultados["Apellido"]; ?>">
                    <input type="hidden" value="<?php echo $resultados["titulo"]; ?>">
                    <div>
                        <select name="reporteSelect" id="reporteSelect" style="width:300px;">
                            <!-- s<option > -- </option> -->
                            <option value="Fraude o estafa" selected>Fraude o estafa</option>
                            <option value="Violencia">Violencia</option>

                            <option value="Contenido o información falsa">Contenido o información falsa</option>

                            <option value="Spam">Spam</option>
                            <option value="Ventas no autorizadas">Ventas no autorizadas</option>
                            <option value="Lenguaje que incita al odio">Lenguaje que incita al odio</option>
                            <option value="Material que presenta sexualización">Material que presenta sexualización
                            </option>
                            <option value="Tiempo de fecha antiguo">Tiempo de fecha antiguo</option>
                            <option value="7">Otro </option>

                        </select>
                    </div>
                    <div style="display:none" id="otro">
                        <h6>Ingrese la razón:</h6>
                        <textarea style="width:100%; height:20%; display:block;" name="reporte" id="reporte" cols="40"
                            rows="10"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="cerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    <input onclick="Reporte('<?php echo $nombre; ?>','<?php echo $resultados['titulo']; ?>');"
                        type="submit" class="btn btn-primary" value="Enviar Reporte">


                </div>


            </div>
        </div>
    </div>


















</section>


<script type='text/javascript' src='assets/jss/AjaxSolicitud.js'></script>
<script type='text/javascript' src='assets/jss/Reporte.js'></script>
<script type='text/javascript'>


    document.getElementById("terminarTrabajo").addEventListener('click', function (event) {
        event.preventDefault();
        swal({
            title: "Al culminar el trabajo, se hace énfasis en que se finalizó correctamente el trabajo. ¿Está seguro de culminar el trabajo?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: ["No", "Si"],
        }).then((willDelete) => {
            if (willDelete) {
                swal({
                    type: "success",
                    icon: "warning",
                    title: "En caso de haber aceptado postulantes, por favor calificar su trabajo en la sección 'Vacantes Aceptados'"
                }).then(function () {
                    window.location = document.getElementById("terminarTrabajo").getAttribute('href');
                });
            }

        });

    });



    document.getElementById("eliminarPublicacion").addEventListener('click', function (event) {
        event.preventDefault();
        swal({
            title: "¿Está seguro de Eliminar el trabajo?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: ["No", "Si"],
        }).then((willDelete) => {
            if (willDelete) {
                window.location = document.getElementById("eliminarPublicacion").getAttribute('href');

            }

        });

    });



</script>
<!-- 
<script src="assets\jss\view-oculto-postulant.js"></script> -->
<script src="assets\jss\infoperfil.js"></script>
<?php require_once 'views/partials/piedepagina.php'; ?>