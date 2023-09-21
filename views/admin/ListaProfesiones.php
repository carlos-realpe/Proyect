<?php require_once 'views/partials/encabezado.php'; ?>
<script src="assets\jss\ListaProfesionEdit.js"></script>
<section>

    <style>
        td {
            max-width: 200px;
            /* Límite máximo de ancho para las celdas */
            overflow: hidden;
            /* Recorta el contenido si excede el límite máximo */
            text-align: center;
        }

        th {
            text-align: center;
        }

        tr {
            border-color: grey;
        }

        .busqueda {
            width: 80%;
            margin: 10px auto;
        }

        @media (max-width: 900px) {

            th:nth-child(2),
            td:nth-child(2) {
                display: none;
                /* Ocultar la tercera columna */
            }
        }
    </style>
    <section>




        <h4 class="text-center fw-bolder mt-4" style="color:white;">
            Listado de Oficios
        </h4>

        <div class="container justify-content-center align-items-center" style="min-height: 35vh;">
            <a href="index.php?c=Admin&a=AggProfesion" class="btn btn-primary mx-1" style="margin:10px">Agregar
                Oficio</a>
            <table class="table" style="background:#eeeeee;">
                <thead class="thead-dark" style="background:grey;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre del Oficio</th>
                        <th scope="col" style="width:20%">Acciones</th>
                    </tr>
                </thead>

                <tbody id="listaProfesiones">

                    <!-- <tr>
                        <td>1</td>
                        <td><img src="assets\img\imgtrabajosfav\panadero.jpg" alt="" width="100px" height="100px"> </td>
                        <td>' panadero + ' </td>
                        <td>
                            <div class="btn-group btn-group-sm d-flex justify-content-center" role="group">
                                <a href="#" class="btn btn-danger mx-1">Eliminar </a>
                                <a href="index.php?c=Admin&a=mostrarEditarProfesion&postu=105"
                                    class="btn btn-primary mx-1">Modificar</a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td><img src="assets\img\imgtrabajosfav\panadero.jpg" alt="" width="100px" height="100px"> </td>
                        <td>' gg + ' </td>
                        <td>
                            <div class="btn-group btn-group-sm d-flex justify-content-center" role="group">
                                <a href="#" class="btn btn-danger mx-1">Eliminar </a>
                                <a href="#" class="btn btn-primary mx-1">Modificar</a>
                            </div>
                        </td>
                    </tr> -->






                </tbody>



            </table>


        </div>







    </section>



    <?php require_once 'views/partials/piedepagina.php'; ?>