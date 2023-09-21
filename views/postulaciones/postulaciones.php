<?php require_once 'views/partials/encabezado.php'; ?>

<style>
    .card {
        width: 75%;
        margin: 25px auto;

    }

    .active {
        visibility: visible;
    }

    .nav-tabs .nav-link {
        background: #bbbbbb;
    }

    .iconos-tempypost-postulacion {
        text-align: left;
        margin-right: 20px;
        margin-left: 20px;
        font-size: 12px;
        color: rgba(0, 0, 0, 0.6);

    }

    .col p {
        margin-top: 20px;
    }
</style>

<section>

    <?php
    // Imprime una cookie individual
    // echo $_SESSION['validador'];
    if (isset($_SESSION['validador'])&&$_SESSION['validador'] != 1) {
        echo "<script>var validador=false;</script>";
        $_SESSION['validador'] = 1;
    }

    ?>
    <div id="GenTrabajo">







    </div>



</section>

<script src="assets/jss/AjaxEvent.js"></script>



<?php require_once 'views/partials/piedepagina.php'; ?>