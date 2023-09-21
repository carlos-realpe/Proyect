<?php
session_start();


require_once 'models/BusquedaModel.php';


class BusquedaController
{
    private $model;
    public function __construct()
    {
        $this->model = new BusquedaModel();
    }

    public function busqueda()
    {
        require_once 'views/busqueda/busqueda.php';



    }



    public function mostrarLista()
    {
  if(!isset($_SESSION["rol"]) || $_SESSION["rol"] !="admin"){
        $resultados = $this->model->mostrarLista();
        $select = $this->model->mostrarSelec();
        require_once 'views/busqueda/busqueda.php';
        }else{
            require_once 'views/page_not_found.php'; 
        }

    }

    //--------------------------*---------------------//


    public function buscarAjaxPublicacionn()
    {
        
        $busqueda = $_GET['nom'];
        $busquedaTipo = $_GET['busquedaTipo'];
        $resultados = $this->model->buscarAjaxPubli($busqueda, $busquedaTipo);
        echo json_encode($resultados);

    }

    public function HistorialUserMostrar()
    {
       
        
        if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
            require_once 'views/page_not_found.php';
        } else {
            $id = $_GET['idUser'];
           require_once 'views/Historial/historialUser.php';
        }

    }

    public function HistorialUser()
    {
        $id = $_GET['idUser'];
        $resultados = $this->model->HistorialUser($id);
        echo json_encode($resultados);
    }

    public function HistorialVacantesMostrar()
    {
        if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
            require_once 'views/page_not_found.php';
        } else {
            
            require_once 'views/Historial/historial.php';
        }

    }

public function HistorialVacantes(){

$resultados = $this->model->HistorialVacantes();
echo json_encode($resultados);

}


}