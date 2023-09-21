<?php

session_start();


require_once 'models/PerfilModel.php';

class PerfilController
{
  private $model;

  public function __construct()
  {
    $this->model = new PerfilModel();
  }



  public function miPerfil()
  {
    if (!isset($_SESSION['login']) || $_SESSION['login'] != true){
      require_once 'views/page_not_found.php';
            }else{
    $resultados = $this->model->mostrarPerfil();
    $selec_profesion = $this->model->mostrarselec();
    require_once 'views/perfil/perfil.php';
            }
  }



  public function editarPerfil()
  {

    $id = $_SESSION['id'];
    $nombre = htmlentities($_POST['nombre']);
    $apellido = htmlentities($_POST['apellido']);
    
    $telf = htmlentities($_POST['telf']);
    $lugar = htmlentities($_POST['lugar']);
    //llamar al modelo
    $res = $this->model->editarPerfil($id, $nombre, $apellido, $telf, $lugar);
    $msj = 'Usuario actualizado exitosamente';
    $color = 'primary';
    if (!$res) {
      $msj = "No se pudo realizar la actualizacion";
      $color = "danger";
    }
    $_SESSION['mensaje'] = $msj;
    $_SESSION['color'] = $color;

    //llamar a la vista

    header('Location:index.php?c=Perfil&a=miPerfil');
  




  }

  ////////////update par ta foto de perfil
 
  public function editarFotoPerfil()
  {
    $id = $_SESSION['id'];
    $ruta = "assets/imgPerfil/".$id."/";
    mkdir($ruta,0777); // crea el directorio VALIDAR SI YA ESTA si es posible
        $foto_perfil = $ruta . "perfil".$id;


    if (move_uploaded_file($_FILES["btn_abrir_file"]["tmp_name"], $foto_perfil)) {
      $msj = htmlspecialchars(basename($_FILES["archivosubido"]["name"]));
      $_SESSION['url']= $foto_perfil;
     }


    //llamar al modelo
   $res = $this->model->editarFotoPerfil($id, $foto_perfil);
    $msj = 'Usuario actualizado exitosamente';
    $color = 'primary';
  if (!$res) {
      $msj = "No se pudo realizar la actualizacion";
      $color = "danger";
   }
    $_SESSION['mensaje'] = $msj;
    $_SESSION['color'] = $color;

    //llamar a la vista

    header('Location:index.php?c=Perfil&a=miPerfil');

  }
///////////////PDF ARCHIVO
  public function ActualizarCv(){
    $id = $_SESSION['id'];
    $ruta = "assets/cvPDF/" . $id . "/";
    //if (!file_exists($ruta)) {
      mkdir($ruta, 0777);
    //}
    $rutaCV = $ruta . "use".$id.".pdf";

     if (move_uploaded_file($_FILES["activador"]["tmp_name"],$rutaCV)){
      $msj = "error";
    }

    $res = $this->model->ActualizarCv($id, $rutaCV);
    $msj = 'Usuario actualizado exitosamente';
    $color = 'primary';
    if (!$res) {
      $msj = "No se pudo realizar la actualizacion";
      $color = "danger";
    }

    header('Location:index.php?c=Perfil&a=miPerfil');

  }















}