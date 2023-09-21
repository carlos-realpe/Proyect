<?php require_once 'views/partials/encabezado.php'; ?>

<section>
    <?php
    if (isset($_SESSION['mensaje']) && $_SESSION['mensaje'] == true) {
        echo '
     <script>
        swal({
          title: "Éxito",
          text: "Éxito al guardar cambios",
          icon: "success",
          button: true,
        
        });
    </script>
    ';
        unset($_SESSION['mensaje']);
    }
    if (isset($_SESSION['mensaje']) && $_SESSION['mensaje'] == false) {
        echo '
     <script>
       swal({
          title: "Error",
          text: "Error al guardar cambios ",
          icon: "error",
          button: true,
          });
    </script>
    ';
        unset($_SESSION['mensaje']);
    }
    ?>


    <div id="contenedor">
        <div class="formularios">
            <h2 style="text-align:center;"> Editar Usuario </h2>
            <hr id="barraform">
            <div class="perfil-usuario-avatar" style="text-align:center">

                <?php if ($usuarios['foto_perfil'] != "") { ?>
                    <img src="<?php echo $usuarios['foto_perfil']; ?>" alt="img-avatar"
                        style="width:155px; height :160px;" />
                <?php } else { ?>
                    <img src="<?php $_SESSION['url']; ?>" alt="img-avatar" style="width:105px; height :100px;" />
                <?php } ?>


                <form action="index.php?c=Admin&a=editarfotoPerfil" method="post" enctype="multipart/form-data">
                    <label class="material-symbols-outlined boton-avatar" id="boton-avatar">
                        <input type="file" id="btn_abrir_file" name="btn_abrir_file"
                            accept="image/png, .jpeg, .jpg, image/gif" style="display:none;" onchange="subirimagen()">
                        <span class="icon-subida-perfil" style="left: 10px;">add_a_photo</span>
                    </label>
                    <input type="hidden" name="user2" id="user2" value='<?php echo $usuarios["id-usuario"]; ?>' />
                    <input type="submit" value="Submit" id="clic" hidden>
                </form>
            </div>
            <form id="formContacto" action="index.php?c=Admin&a=editarUsuario" method="post"
                onsubmit="return validarRegistro()" enctype="multipart/form-data">

                <hr id="barraform">
                <div class="row g-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombres" id="nombres" value='<?php echo $usuarios["nombre"]; ?>'
                                class="form-control " required />
                            <span class="lbl-titulo-of" id="lbl-nombres"> Nombre debe contener máximo 30 caracteres
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Apellido</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control"
                                value='<?php echo $usuarios["Apellido"]; ?>' required />
                            <span class="lbl-titulo-of" id="lbl-apellidos"> Apellido debe contener máximo 30 caracteres
                            </span>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" name="correo" id="correo" onkeyup="correoExistente();"
                                class="form-control" required value='<?php echo $usuarios["email"]; ?>' />

                            <span class="lbl-titulo-of" id="lbl-correo">El Correo ya existe </span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Numero de teléfono Móvil</label>
                            <input type="tel" name="telf" id="telf" class="form-control" maxlength="10" required
                                value='0<?php echo $usuarios["telefono"]; ?>' />
                            <span class="lbl-titulo-of" id="lbl-telf"> El teléfono debe disponer de 10 dígitos </span>

                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cédula</label>
                            <input type="cedula" name="cedula" id="cedula" class="form-control" maxlength="10" required
                                value='<?php echo $usuarios["cedula"]; ?>' />
                            <span class="lbl-titulo-of" id="lbl-cedula"> La cedula debe disponer de 10 dígitos </span>

                        </div>




                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Ciudad</label>
                                <input type="text" class="form-control" name="ciudad" id="ciudad"
                                    placeholder="Guayaquil, Daule etc." required
                                    value='<?php echo $usuarios["lugar"]; ?>'>
                                <span class="lbl-titulo-of" id="lbl-ciudad"> Debe contener máximo 20 palabras </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class=" col-md-6">
                                <label class="form-label">Contraseña </label>
                                <input type="password" name="password" id="password" class="form-control" required
                                    value='<?php echo $usuarios["password"]; ?>' />
                                <p style="font-size: 70%; color:gray;"> Mínimo 6 caracteres </p>
                                <span class="lbl-titulo-of" id="lbl-password"> La contraseña es muy corta</span>

                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Repetir Contraseña</label>
                                <input type="password" name="repassword" id="repassword" class="form-control" required
                                    value='<?php echo $usuarios["password"]; ?>' />
                                <span class="lbl-titulo-of" id="lbl-repassword"> La contraseña no coincide</span>
                            </div>

                        </div>



                        <input type="hidden" name="user" id="user" value='<?php echo $usuarios["id-usuario"]; ?>' />

                        <div class="row" style="text-align:center; margin-top:2%;">

                            <div style="display:inline-block; ">
                                <input type="submit" class="btn btn-primary" value="Guardar Edición">
                                <a href="index.php?c=Admin&a=ListaUsuarios" class="btn btn-danger">Cancelar</a>

                            </div>

                        </div>
                    </div>

            </form>





        </div>

    </div>


</section>
<script type="text/javascript" src="assets\jss\validarFormEdit.js"></script>
<script src="assets\jss\view-oculto.js"></script>
<?php require_once 'views/partials/piedepagina.php'; ?>