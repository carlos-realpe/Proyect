<?php require_once 'views/partials/encabezado.php'; ?>

<section>


    <div class="seccion-perfil-usuario">
        <div class="contenedor-registroempleo">

            <div class="titulo-registroempleo">Agregar Oficio</div>

            <form action="index.php?c=Admin&a=EnviarProfesion" class="form" id="form" method="post"
                enctype="multipart/form-data">

                <div class="detalle-usuario">
                    <div class="input-img imagen">
                        <div class="perfil-usuario-avatar-generarem">
                            <label class="material-symbols-outlined boton-avatar" id="boton-avatar">
                                <input type="file" id="imgTrabajo" name="imgTrabajo"
                                    accept="image/png, .jpeg, .jpg, image/gif" style="display:none;">
                                <span class="icon-subida-perfil">add_a_photo</span>

                            </label>

                            <img src="assets\img\perfilBase\trabajoR.jpg" alt="foto de referencia al trabajo"
                                width="120px" height="120px" id="cargarImg" name="cargarImg">
                            <input type="hidden" id="imgF" name="imgF">
                        </div>

                    </div>






                    <div class="input-box teximagen">
                        <label for="detalle-titulo">Nombre del Oficio</label>
                        <div>

                            <input type="text" name="detalle-titulo" id="detalle-titulo" required style="width:100%;">
                            <!-- <span class="material-symbols-outlined">check_circle</span> -->
                            <span class="lbl-titulo-of" id="lbl-titulo">*El titulo solo puede llevar Letras, espacios y
                                acentos.</span>
                        </div>


                    </div>

                </div>

                <div class="formulario__mensaje-off" id="formulario__mensaje" style="margin:20px">
                    <p><span class="material-symbols-outlined">warning</span>
                        <b>Error:</b> Por favor ingresar los datos correctamente.
                    </p>
                </div>

                <div class="button-guardado">
                    <div class="button-gc-form"><input type="submit" value="Guardar trabajo"></div>
                    <div class="button-gc-form"><input type="button"
                            onclick="location.href='index.php?c=Admin&a=Profesiones'" value="Cancelar"></div>
                </div>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>

            </form>
        </div>



    </div>
    <script src="assets/jss/js-generar-tb.js"></script>



</section>



<?php require_once 'views/partials/piedepagina.php'; ?>