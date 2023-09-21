<?php require_once 'views/partials/encabezado.php'; ?>
<section>
    <style>
        .card {
            width: 75%;
            margin: 25px auto;

        }

        .row-cols-auto>* {
            flex: 0 0 auto;
            width: auto;
            display: flex;
            align-content: flex-end;
            flex-wrap: wrap;
        }
    </style>
    <div class="card" style="padding:20px;">
        <p class="m-0"><b>Nota:</b> La calificación con estrellas <label for="radio"
                style="color: #e0bc48; font-size:22px;">★</label> se asigna según la siguiente escala de ponderación:
        <ul style="margin: 0 auto; list-style: none;" class="list-inline">
            <li class="list-inline-item"><label for="radio"
                    style="color: #e0bc48; font-size:22px;">★</label>5=excelentente</li>
            <li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>4=Bueno
            </li>
            <li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>3=Regular
            </li>
            <li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>2=Malo</li>
            <li class="list-inline-item"><label for="radio" style="color: #e0bc48; font-size:22px;">★</label>1=Pésimo
            </li>
        </ul>
    </div>

    <div id="ListaCalificaciones"></div>

    <script src="assets/jss/AjaxCalificacion.js"></script>


</section>
<?php require_once 'views/partials/piedepagina.php'; ?>