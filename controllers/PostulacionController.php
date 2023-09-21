<?php
session_start();


require_once 'models/PostulacionModel.php';

class PostulacionController
{
  private $model;

  public function __construct()
  {
    $this->model = new PostulacionModel();
  }


  public function postulacion()
  {

    $type = $_GET["type"];

    if ($type =="postulacion"){
      $_SESSION['validador'] = 1;
    }else{
      $_SESSION['validador'] = 0;
    }
  echo "<script>var validador = true;</script>";
   if (!isset($_SESSION['login']) || $_SESSION['login'] != true){
      require_once 'views/page_not_found.php';
            }else{
     require_once 'views/postulaciones/postulaciones.php';
         }
  }



  public function postulacionT()
  {
    echo "<script>var validador = false;</script>";
    if (!isset($_SESSION['login']) || $_SESSION['login'] != true){
      require_once 'views/page_not_found.php';
            }else{
    require_once 'views/postulaciones/postulaciones.php';
            }
  }



  public function verMas()
  {
    
    require_once 'views/postulaciones/vermas.php';
  }



  public function Postular()
  {
    
      $idUser = $_SESSION["id"];
      $idRegistroP = $_GET["postu"];
      $resultados = $this->model->insertarMisPostulacion($idUser, $idRegistroP);
      /* TENGO QUE VALIDAR RESULTADOS (VERIFICAR SI SE INSERTO CORRECTAMENTE*/
      header("Location:index.php?c=Postulacion&a=postulacion&type=postulacion");
    



  }

  public function Cancelar()
  {
    $idUser = $_SESSION["id"];
    $idRegistroP = $_GET["postu"];
    $resultados = $this->model->cancelarPostulacion($idUser, $idRegistroP);


    /* TENGO QUE VALIDAR RESULTADOS (VERIFICAR SI SE INSERTO CORRECTAMENTE*/
    header("Location:index.php?c=Vista&a=verVistaBusqueda&var=" . urlencode($idRegistroP) . "&par=elp");
  }
  public function Eliminar()
  {
    $idUser = $_SESSION["id"];
    $idRegistroP = $_GET["postu"];
    $terminar ="";
     if(isset($_GET["terminar"])){
      $terminar = $_GET["terminar"];
     }

    $resultados2 = $this->model->eliminarPostulacionValidacion($idRegistroP);
    $resultados = $this->model->eliminarPostulacion($idUser, $idRegistroP);


    /* TENGO QUE VALIDAR RESULTADOS (VERIFICAR SI SE INSERTO CORRECTAMENTE*/
if($terminar == "terminar"){
      header("Location:index.php?c=Calificar&a=calificarMostrar");
}else{
    echo "<script>var validador = false;</script>";
    require_once 'views/postulaciones/postulaciones.php';
    }


    //header("Location:index.php?c=Postulacion&a=postulacion&act=val");
  }














  /*---------------------------AJAX-------------------------*/




  public function MisPostulacionAjax()
  {

    unset($_SESSION["temp"]);
    $resultados = $this->model->mostrarMisPostulaciones();
    /// $resultados2 =  $this->model->mostrarMisPostulaciones();
    echo json_encode($resultados);

    // require_once 'views/postulaciones/postulaciones.php';
  }




  public function PostulacionAjax()
  {

    $resultados = $this->model->mostrarPublicacion();
    /// $resultados2 =  $this->model->mostrarMisPostulaciones();
    echo json_encode($resultados);

    // require_once 'views/postulaciones/postulaciones.php';
  }

  public function CancelarVisualizarP()
  {
    $idUser = $_SESSION["id"];
    $idRegistroP = $_GET["postu"];
    $resultados = $this->model->cancelarPostulacion($idUser, $idRegistroP);

    //require_once 'views/postulaciones/postulaciones.php';

    /* TENGO QUE VALIDAR RESULTADOS (VERIFICAR SI SE INSERTO CORRECTAMENTE*/
    //header("Location:index.php?c=Postulacion&a=postulacion");
  }
  public function EliminarVisualizarP()
  {
    $idUser = $_SESSION["id"];
    $idRegistroP = $_GET["postu"];


    $resultados2 = $this->model->eliminarPostulacionValidacion($idRegistroP);
    $resultados = $this->model->eliminarPostulacion($idUser, $idRegistroP);


    /* TENGO QUE VALIDAR RESULTADOS (VERIFICAR SI SE INSERTO CORRECTAMENTE*/

    //header("Location:index.php?c=Postulacion&a=postulacion&act=val");
  }




}