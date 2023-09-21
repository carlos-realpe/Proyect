<?php require_once 'views/partials/encabezado.php'; ?>

<section>

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
                        Listado de Trabajos        
            </h4>
<div class="busqueda">
            <input type="text" id="buscarTrabajo" onkeyup="buscarAjaxTrabajo()" placeholder="Buscar título de trabajo">
            <div class="select_trabajo">
      <span style="color:white;">Ordenar por Fecha: </span> 
      <select name="selec-fecha"
        onchange="buscarAjaxTrabajo()" id="selec-fecha" style="width:80%; height: 34px;border-radius: 10px;"
        required>

        <option value="1" selected>Ascendente</option>
        
        <option value="2">Descendente</option>
             </select>
            
            </div>
</div>
            

    <div class="container justify-content-center align-items-center" style="min-height: 35vh;">

<table class="table" style="background:#eeeeee;">
  <thead class="thead-dark" style="background:grey;" >
    <tr>
      <th scope="col">#</th>
      <th scope="col">Título</th>
      <th scope="col">Detalle</th>
      <th scope="col">Fecha de Publicación</th>
      <th scope="col" style="width:20%">Acciones</th>
    </tr>
  </thead>

 <tbody id="listaTrabajos">  


</tbody>
 
   
  
</table>


</div>

<script src="assets/jss/AjaxAdminTrabajos.js"></script>





</section>



<?php require_once 'views/partials/piedepagina.php'; ?>