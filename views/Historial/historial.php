<?php require_once 'views/partials/encabezado.php'; ?>
<style>
    .card {
        width: 75%;
        margin: 20px auto;

    }

    .row-cols-auto>* {
        flex: 0 0 auto;
        width: auto;
        display: flex;
        align-content: flex-end;
        flex-wrap: wrap;
    }

    div.valoracion label:hover,
div.valoracion label:hover ~ label{

 color: grey !important;
}

 div.valoracion input:checked ~ label {
  color: #e0bc48 !important;
  }

  div.valoracion label {
    float: right;
    color: grey;
    width: 23px;
    font-size: 20px;
    cursor: pointer;
}
</style>


<section>



<div id="historialVacante">

</div>


<script src="assets/jss/AjaxHistorial.js"></script>

</section>




<?php require_once 'views/partials/piedepagina.php'; ?>