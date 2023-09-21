<?php require_once 'views/partials/encabezado.php'; ?>

<section>

    <?php

    // if (isset($_GET["mg"])) {
    //     $msjex = $_GET["mg"];
    //     if ($msjex == 1) {
    //         echo ('<script language="javascript">swal("REGISTRO CON EXITO");</script>');
    //     } else {
    //         echo ('<script language="javascript">swal("No se pudo realizar el registro");</script>');
    //     }
    // }
    ?>

    <div id="contenedor">
        <div>

            <div class="formularios">
                <div>
                    <h2 style="text-align:center;">RECUPERAR CONTRASEÑA</h2>
                </div>
                <hr id="barraform">
                <form action="index.php?c=Login&a=recovery_usuario" method="post" id="formContacto">
                    <div class="row py-3 justify-content-center align-items-center">
                        <div class=" col-md-6">

                            <p style="text-align:center; font-style: italic; font-size:15px;">Ingrese su dirección de
                                correo electrónico y le enviaremos instrucciones para
                                restablecer su contraseña.</p>
                            <hr id="barraform">

                            <div>
                                <label class="form-label">Correo Electrónico</label> <br>
                                <input type="email" name="correo" id="correo" class="form-control" required />
                            </div>
                            <!-- <div style="margin-top: 5%;">

                                <label class="form-label"> confirmar Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" />

                            </div> -->

                            <div class="d-flex justify-content-around" style="text-align: center; margin-top: 5%">

                                <input type="submit" class="btn btn-primary px-5" value="Enviar">
                                <a class="btn btn-primary px-5" href="index.php?c=Login&a=Login">Cancelar<a>
                            </div>

                            <?php
                            if (isset($_GET['msg'])) {

                                switch ($_GET['msg']) {
                                    case 'ok':
                                        ?>
                                        <div class="alert alert-success mt-2 alert-dismissible ">
                                            <button class="btn-close" data-bs-dismiss="alert"></button>
                                            se envió el link a su correo!
                                        </div>
                                        <?php
                                        break;
                                    case 'no_found':
                                        ?>
                                        <div class="alert alert-success mt-2 alert-dismissible ">
                                            <button class="btn-close" data-bs-dismiss="alert"></button>
                                            El correo no se encuentra registrada en la cuenta!
                                        </div>
                                        <?php
                                        break;

                                    case 'error':
                                        ?>

                                        <div class="alert alert-success mt-2 alert-dismissible ">
                                            <button class="btn-close" data-bs-dismiss="alert"></button>
                                            hubo un error, intente de nuevo!
                                        </div>
                                        <?php
                                        break;
                                }
                                ?>


                                <?php
                            } ?>







                        </div>



                    </div>

                </form>

            </div>
        </div>

    </div>
</section>
<?php require_once 'views/partials/piedepagina.php'; ?>