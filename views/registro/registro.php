<?php require_once 'views/partials/encabezado.php'; ?>
<section>

    <?php if (isset($validarCorreo)) {
        echo ('<script language="javascript">swal("Correo Ya Registrado");</script>');
    } ?>

    <div id="contenedor">
        <div class="formularios">

            <form id="formContacto" action="index.php?c=Registro&a=agregar" method="post"
                onsubmit="return validarRegistro();" enctype="multipart/form-data">
                <h2 style="text-align:center;"> Registro </h2>
                <hr id="barraform">

                <div class="row g-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombres" id="nombres" class="form-control " required />
                            <span class="lbl-titulo-of" id="lbl-nombres"> Nombre debe contener máximo 30 caracteres
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Apellido</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control" required />
                            <span class="lbl-titulo-of" id="lbl-apellidos"> Apellido debe contener máximo 30 caracteres
                            </span>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" name="correo" id="correo" onkeyup="correoExistente();"
                                class="form-control" required />

                            <span class="lbl-titulo-of" id="lbl-correo">El Correo ya existe </span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Número de teléfono Móvil</label>
                            <input type="tel" name="telf" id="telf" class="form-control" maxlength="10" required />
                            <span class="lbl-titulo-of" id="lbl-telf"> El teléfono debe disponer de 10 dígitos </span>

                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cédula</label>
                            <input type="cedula" name="cedula" id="cedula" class="form-control" maxlength="10"
                                required />
                            <span class="lbl-titulo-of" id="lbl-cedula"> La cédula debe disponer de 10 dígitos </span>

                        </div>




                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Ciudad</label>
                                <input type="text" class="form-control" name="ciudad" id="ciudad"
                                    placeholder="Guayaquil, Daule etc." required>
                                <span class="lbl-titulo-of" id="lbl-ciudad"> Debe contener máximo 20 palabras </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class=" col-md-6">
                                <label class="form-label">Contraseña </label>
                                <input type="password" name="password" id="password" class="form-control" required />
                                <p style="font-size: 70%; color:gray;"> Mínimo 6 caracteres </p>
                                <span class="lbl-titulo-of" id="lbl-password"> La contraseña es muy corta</span>

                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Repetir Contraseña</label>
                                <input type="password" name="repassword" id="repassword" class="form-control"
                                    required />
                                <span class="lbl-titulo-of" id="lbl-repassword"> La contraseña no coincide</span>
                            </div>
                        </div>



                        <input type="hidden" name="cliente" id="cliente" value="3" />
                        <div class="row">
                            <div class="col-md-9">
                                <label> <input type="checkbox" name="terminos" id="terminos" required />
                                    He leído y aceptado los Términos de uso y condiciones <br></label>
                            </div>
                            <div class="col-md-9">
                                <label> <input type="checkbox" name="terminos2" required />
                                    Desea estar estar notificado de cualquier oferta laboral</label>
                            </div>
                        </div>

                        <div class="row" style="text-align:center; margin-top:2%;">

                            <div style="display:inline-block; ">
                                <input type="submit" class="btn btn-primary" value="Registrarse">

                            </div>

                        </div>
                    </div>

            </form>









        </div>

    </div>
    <script type="text/javascript" src="assets/jss/validarFom.js"></script>

</section>
<?php require_once 'views/partials/piedepagina.php'; ?>