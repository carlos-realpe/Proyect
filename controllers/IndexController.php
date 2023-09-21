<?php
session_start();


require_once 'models/Indexmodel.php';
class IndexController
{
    private $model;

    public function __construct()
    {
        $this->model = new indexmodel();
    }



    public function index()
    {

        $resul_pgp = $this->model->mostrar_resul_pgp();
        
        require_once 'views\homeview.php';
        // echo $resul_pgp;
     

    }

    public function estaticas()
    {
        $page = $_GET['p'];
        require_once 'views/estaticas/' . $page . '.php';
    }


}