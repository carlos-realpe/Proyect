<?php
  session_start();


require_once 'models/NotificarModel.php';

class NotificarController {
  private $model;

    public function __construct() {
        $this->model = new NotificarModel();
    }


    public function NotificarPostulante(){

    $notificar = $this->model->NotificarPostulante();
        echo json_encode($notificar);

    }
    
     public function NotificarLeido(){

   $this->model->NotificarLeido();
       

    }



    

}