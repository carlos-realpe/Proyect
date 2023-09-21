<?php require_once 'views/partials/encabezado.php'; ?>
<style>
td{
  max-width: 200px; /* Límite máximo de ancho para las celdas */
      overflow: hidden; /* Recorta el contenido si excede el límite máximo */
}
th{
    text-align: center;
}
tr{
    border-color: grey;
}
.busqueda{
    width: 80%;
    margin: 10px auto;
}
 @media (max-width: 900px) {
      th:nth-child(3),
      td:nth-child(3) {
        display: none; /* Ocultar la tercera columna */
      }
    }
    </style>
<section>




        <h4 class="text-center fw-bolder mt-4" style="color:white;">
                        Listado de Usuarios        
            </h4>
<div class="busqueda">
            <input type="text" id="BuscarUsuario" onkeyup="buscarAjaxUsuarios()" placeholder="Buscar usuario por nombre o cédula">
            </div>
    <div class="container justify-content-center align-items-center" style="min-height: 35vh;">
<table class="table" style="background:#eeeeee;">
  <thead class="thead-dark" style="background:grey;" >
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre y Apellido</th>
      <th scope="col">Correo Electrónico</th>
      <th scope="col">Cédula</th>
      <th scope="col" style="width:20%">Acciones</th>
    </tr>
  </thead>

 <tbody id="listaUsuarios">  


</tbody>
 
   
  
</table>


</div>

<script src="assets/jss/AjaxAdminUsuarios.js"></script>
</section>



<?php require_once 'views/partials/piedepagina.php'; ?>