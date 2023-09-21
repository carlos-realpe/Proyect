<?php require_once 'views/partials/encabezado.php'; ?>



<div class="seccion-perfil-usuario">


    <div class="perfil-usuario-body-genelab">

        <h3 class="titulo">
            <?php echo $_SESSION['Nombre']; ?>
        </h3>

    </div>


    <div class="contenedor-registroempleo">

        <div class="titulo-registroempleo" ><h4>Generar Trabajo</h4></div>

        <form action="index.php?c=Registro&a=agregar_generar_oferta" class="form" id="form" method="post"
            enctype="multipart/form-data" onsubmit="return validargeneraroferta()" >
         

            <div class="detalle-usuario">


                <div class="input-img imagen">
                    <div class="perfil-usuario-avatar-generarem">
                        <label class="material-symbols-outlined boton-avatar" id="boton-avatar">
                            <input type="file" id="imgTrabajo" name="imgTrabajo"
                                accept="image/png, .jpeg, .jpg, image/gif" style="display:none;">
                            <span class="icon-subida-perfil">add_a_photo</span>
                        </label>

                        <img src="assets/img/perfilBase/trabajoR.jpg" alt="foto de referencia al trabajo" id="cargarImg"
                            width="120px" height="120px">
                    </div>
                </div>








                <div class="input-box teximagen">
                    <div class="container text-center ">
                        <div class="row row-cols-3">
                            <div class="col-auto p-0"> <label for="detalle-titulo">Título</label></div>

                            <div class="col-auto p-0 align-self-center"><button
                                    style="background-color: transparent; border: none;" class="d-inline-block"
                                    tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                                    data-bs-content="El título debe precisar de manera específica la actividad a realizar."
                                    disabled> <span class="material-symbols-outlined"> info</span></button></div>
                        </div>
                    </div>


                    <div>
                        <input type="text" name="detalle-titulo" id="detalle-titulo" required style="width:100%; ">
                        <!-- <span class="material-symbols-outlined">check_circle</span> -->
                        <span class="lbl-titulo-of" id="lbl-titulo">*El título solo puede llevar letras, espacios y
                            acentos.</span>
                    </div>
                    <label id="prueb" for="detalle-det">Detalle del anuncio</label>
                    <textarea name="detalle-det" id="detalle-det" required style="height:100px;"></textarea>
                    <span class="lbl-titulo-of" id="lbl-det">*El detalle solo puede llevar Letras,números, espacios y
                        acentos.</span>



                </div>

            </div>
            <div class="detalle-usuario2">
                <div class="detalle-campos dcizquierda">
                    <div class="input-box">
                        <div class="container text-center ">
                            <div class="row row-cols-3">
                                <div class="col-auto p-0 align-self-center"> <input type="checkbox"
                                        name="habilitar-time" id="habilitar-time" value="male"></div>

                                <div class="col-9 p-0"> <label for="habilitar-time">Habilitar el tiempo de duración del
                                        trabajo</label></div>
                                <div class="col-auto p-0 align-self-center"><button
                                        style="background-color: transparent; border: none;" class="d-inline-block"
                                        tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                                        data-bs-content="Habilitar tiempo, no hace énfasis en el tiempo de publicación."
                                        disabled> <span class="material-symbols-outlined"> info</span></button></div>
                            </div>
                        </div>
                        <span class="lbl-opcional">*opcional</span>
                    </div>

                    <div id="habilitar-deshablitar" class="input-box" style="display:none">
                        <span class="tiempo">Tiempo estimado</span>
                        <select name="selec" id="selec" style="width:178px;">
                            <!-- s<option > -- </option> -->
                            <option value="n" selected></option>
                            <option value="h">HORA</option>

                            <option value="m">MESES</option>

                            <option value="a">AÑO</option>

                        </select>
                        <input type="number" id="quantity-tiempos" name="quantity-tiempo" min="1" max="10"
                            style="width:50px">
                        <script>
                            document.getElementById("selec").onchange = function () { myFunction() };

                            function myFunction() {

                                const selec = document.getElementById("selec").value;

                                switch (selec) {
                                    case "h":
                                        document.getElementById("label-sicheked").innerHTML = 'hora!';
                                        document.getElementById("sueldo").innerHTML = 'Sueldo por Hora';
                                        break;
                                    case "m":
                                        document.getElementById("label-sicheked").innerHTML = 'mes!';
                                        document.getElementById("sueldo").innerHTML = 'Sueldo por Mes';
                                        break;
                                    case "a":
                                        document.getElementById("label-sicheked").innerHTML = 'año!';
                                        document.getElementById("sueldo").innerHTML = 'Sueldo por Año';
                                        break;

                                }
                            }

                        </script>
                        <span id="label-sicheked"></span>
                    </div>

                    <div class="row">


                        <div class="col-md-auto">
                            <div class="container text-center ">
                                <div class="row row-cols-2">
                                    <div class="col-auto p-0"> <span id="sueldo">Sueldo por Mes</span></div>
                                    <div class="col-auto p-0 align-self-center"><button
                                            style="background-color: transparent; border: none;" class="d-inline-block"
                                            tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                                            data-bs-content="Se hace referencia al sueldo que se pagará a cada trabajador."
                                            disabled> <span class="material-symbols-outlined"> info</span></button>
                                    </div>
                                    <input type="number" id="quantity-precio" name="quantity-precio" min="5"
                                        style="width:100%" step="0.01" placeholder="00.00" required>
                                </div>
                            </div>



                        </div>
                        <div class="col-md-auto">
                            <div class="container text-center ">
                                <div class="row row-cols-2">
                                    <div class="col-auto p-0"> <span class="">Num. Vacantes</span> </div>

                                    <input type="number" id="quantity-numero" name="quantity-numero" min="1" max="10"
                                        style="width:100%" required>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="input-selec">

                        <div class="container text-center ">
                            <div class="row row-cols-2">
                                <div class="col-auto p-0"> <span class="">Seleccione el oficio</span></div>
                                <div class="col-auto p-0 align-self-center"><button
                                        style="background-color: transparent; border: none;" class="d-inline-block"
                                        tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                                        data-bs-content="Tiene que seleccionar el oficio referente al trabajo que se va a generar."
                                        disabled> <span class="material-symbols-outlined"> info</span></button></div>
                            </div>
                        </div>

                        <select name="selec-gentrabajo" id="selec-gentrabajo" style="width:178px;" required>
                            <option value="" selected></option>

                            <?php
                            $flag = false;
                            foreach ($resultados as $valores):

                                echo '<option value="' . $valores["id_profesion_user"] . '">' . $valores["name_profesion_user"] . '</option>';


                            endforeach;
                            ?>

                            <!-- <option value="" selected></option>

                            <option value="1">albanil</option>

                            <option value="2">gafitero</option>

                            <option value="3">zapatero</option>

                            <option value="4">electricista</option>

                            <option value="5">arquitecto</option>

                            <option value="6">ama de casa</option>

                            <option value="7">cagu</option> -->

                        </select>

                    </div>








                </div>

                <div class="detalle-campos dcderecha">
                    <div class="input-box">
                        <span>Ciudad:</span>

                        <input type="search" name="detalle-lugar" placeholder="ciudad" required>
                        <span class="lbl-titulo-of" id="lbl-lugar">*No se admite caracteres especiales</span>
                        <!--  MAPA  -->
                        <div>Ubicar el punto <span class="material-symbols-outlined"
                                style="color: red; font-weight: bold;"> location_on </span> más cercano a la zona </div>
                        <span class="lbl-titulo-of" id="lbl-longitud">*Debe mover el punto en algún lugar de la
                            zona.</span>
                        <div class="col-md-6" id="map"> </div>
                        <input type="hidden" id="longitud" name="longitud">
                        <input type="hidden" id="latitud" name="latitud">
                        <script
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVfpKuY8R6Yxja9m65-lOjga4d8sTlB3g&callback=iniciarMap"></script>
                        <!--  <img src="https://www.google.com/maps/d/thumbnail?mid=1mztUrhOy1FuBqwHbCrBxohJztj0&hl=es-419"
                            alt="api de google maps" style="display:block;" width="150px;" height="150px;">-->


                        <!--  MAPA  -->

                    </div>

                </div>

            </div>
            <div class="formulario__mensaje-off" id="formulario__mensaje" style="margin:20px">
                <p><span class="material-symbols-outlined">warning</span>
                    <b>Error:</b> Por favor ingresar los datos correctamente.
                </p>
            </div>

            <div class="btn-toolbar d-flex justify-content-center">
                <div class="button-gc-form mx-1"><input type="submit" value="Guardar"></div>
                <div class="button-gc-form mx-1"><input type="reset" value="Cancelar" onclick="regresar()"></div>
                <script>

                    function regresar() {
                        history.back();

                    }
                </script>

            </div>
            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>

        </form>
    </div>



</div>
<script src="assets/jss/js-generar-tb.js"></script>
<script>
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
</script>

<?php require_once 'views/partials/piedepagina.php'; ?>