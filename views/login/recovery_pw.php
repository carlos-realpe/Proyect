<?php require_once 'views/partials/encabezado.php'; ?>

<section>

    <?php

    $_SESSION['id'] = $_GET['id'];
    // var_dump($_SESSION);
    
    // $valitoken = new LoginModel;
    // $valitoken->consultatoken($email);
    // if(isset($valitoken)){
    //         echo "HOLAAAAAAAAA";
    // }else{ echo "no entroooooooooooo";}
    // $valitoken = $this->model->consultatoken($email);
    ?>

    <div id="contenedor">
        <div>

            <div class="formularios">
                <div>
                    <h2 style="text-align:center;">RECUPERAR CONTRASEÑA</h2>
                </div>
                <hr id="barraform">
                <form action="index.php?c=Registro&a=change_pw" method="post" id="formContacto">
                    <div class="row py-3 justify-content-center align-items-center">
                        <div class=" col-md-6">

                            <p style="text-align:center; font-style: italic; font-size:15px;">Ingrese su dirección de
                                correo electrónico y le enviaremos instrucciones para
                                restablecer su contraseña.</p>
                            <hr id="barraform">

                            <div>
                                <label class="form-label">Nueva contraseña </label> <br>
                                <input type="password" name="correo" id="correo" class="form-control" required />
                            </div>
                            <div style="margin-top: 5%;">

                                <label class="form-label"> confirmar Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required />

                            </div>

                            <div class="d-flex justify-content-center" style="margin-top: 5%;">

                                <input type="submit" class="btn btn-primary px-5" value="Enviar">

                            </div>
                        </div>



                    </div>

                </form>

            </div>
        </div>

    </div>
</section>

<?php require_once 'views/partials/piedepagina.php'; ?>