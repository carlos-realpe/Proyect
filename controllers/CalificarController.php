<?php
session_start();


require_once 'models/CalificarModel.php';

class CalificarController
{
    private $model;

    public function __construct()
    {
        $this->model = new CalificarModel();
    }


    public function calificarMostrar()
    {
     if (!isset($_SESSION['login']) || $_SESSION['login'] != true){
      require_once 'views/page_not_found.php';
            }else{
          require_once 'views/calificar/calificarMostrar.php';
        }

    }

    public function calificarAjaxMostrar(){
        
        $resultados = $this->model->calificarAjaxMostrar();
        echo json_encode($resultados);

    }

    public function valorarUsuario(){
        
$idUser= $_GET["idUser"];
$idRegistro=$_GET["idRegistro"];
$UsuarioACalificar=$_GET["UsuarioACalificar"];
$valor=$_GET["valor"];
  $resultados = $this->model->valorarUsuario($idUser, $idRegistro, $UsuarioACalificar, $valor);
    }
public function FinalizarTrabajo(){

        $idFactura = $_GET["idFactura"];
        $idUsuario = $_GET["idUsuario"];
        $UserActual = $_SESSION["id"];
        $this->model->FinalizarTrabajo($idFactura, $idUsuario, $UserActual);

}




}