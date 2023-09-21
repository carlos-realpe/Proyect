<?php require_once 'views/partials/encabezado.php'; ?>
</header>

<?php
if (isset($_GET['type'])){
$valor= $_GET['type'];
}else { $valor=""; }
echo $valor;
?>
<div class="busqueda">
  <form action="" method="POST" class="nav_busqueda">
    <input id="Buscar" name="Buscar" type="text" placeholder="Búsqueda" onkeyup="buscarAjaxPublicacion()" />

    <div class="select_trabajo">
      <span style="color:white;">Oficio: </span> 
      <select name="selec-gentrabajo"
        onchange="buscarAjaxPublicacion()" id="selec-gentrabajo" style="width:80%; height: 34px;border-radius: 10px;"
        required>

        <option value="" ></option>
        <?php
        foreach ($select as $valores):
         if ($valores["id_profesion_user"] == $valor){
            echo '<option value="' . $valores["id_profesion_user"] . '" selected>' . $valores["name_profesion_user"] . ' </option>';
          }else{
          echo '<option value="' . $valores["id_profesion_user"] . '">' . $valores["name_profesion_user"] . '</option>';
          }
        endforeach;
        ?>
      </select>

    </div>

  </form>
  <div class="contenedor-iconos">
    <button id="micro" onclick="reconocimientoVoz()"><span class="material-icons">mic</span></button>
    <button><span class="material-icons">search</span></button>
  </div>

</div>


<!-- SECCION DEL CONTENEDOR DONDE SE VISUALIZAN LOS RESULTADOS -->

<div class="contenedor-resultsearch" id="contenedor-resul">
 
  <?php foreach ($resultados as $fila) { ?>
    <a href="index.php?c=Vista&a=verVistaBusqueda&var=<?php echo $fila['id_registro_trabajo'] ?>&par=vd>" target="_blank"
      style="text-decoration:none;">
      <div class="contenedor-cartas-m">
        <div class="contenedor-cartext">
          <h3 style="font-size:20px; text-align: center;  text-overflow: ellipsis;overflow: hidden;  display: -webkit-box; -webkit-line-clamp: 2;  -webkit-box-orient: vertical;">
            <?php echo $fila['titulo'] ?>
          </h3>
          <div class="textT">
            <p>Oficio:
              <?php echo $fila['name_profesion_user'] ?>
            </p>
            <p>Ciudad:
              <?php echo $fila['lugar-trabajo'] ?>
            </p>
            <p>Detalle del anuncio:
              <?php echo $fila['detalle'] ?>
            </p>
          </div>
        </div>
        <div class="contenedor-imgm">
          <img src=" <?php echo $fila['foto_trabajo'] ?>   " alt="imagen de misión" />
        </div>
      </div>

    </a>
  <?php } ?>
</div>
<script src="assets/jss/AjaxBusqueda.js"></script>
      <script>
// Verificar si hay una opción seleccionada al cargar la página
window.addEventListener('DOMContentLoaded', function() {
  var selectElement = document.getElementById('selec-gentrabajo');
 
  if (selectElement.value != '') {
    buscarAjaxPublicacion();
  }
});
</script>
<?php require_once 'views/partials/piedepagina.php'; ?>