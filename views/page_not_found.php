<?php require_once 'views/partials/encabezado.php'; ?>

<section>

    <?php

    if (isset($_GET["mg"])) {
        $msjex = $_GET["mg"];
        if ($msjex == 1) {
            echo ('<script language="javascript">swal("REGISTRO CON EXITO");</script>');
        } else {
            echo ('<script language="javascript">swal("No se pudo realizar el registro");</script>');
        }
    }
    ?>

    <div id="contenedor">
        <div>

            <div class="container_pgnfound" style="text-align:center">

                <div style=" text-align: center; margin-bottom:20px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="red" class="bi bi-x-octagon"
                        viewBox="0 0 16 16">
                        <path
                            d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />

                    </svg>
                </div>
                <h1>Enlace no válido

                </h1>
                <hr>
                <p>página no encontrada, vuelva al inicio de la página</p>

            </div>
        </div>

    </div>
</section>

<?php require_once 'views/partials/piedepagina.php'; ?>