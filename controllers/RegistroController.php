<?php
session_start();


require_once 'models/RegistroModel.php';

class RegistroController
{
  private $model;

  public function __construct()
  {
    $this->model = new RegistroModel();
  }


  public function registro()
  {
    require_once 'views/registro/registro.php';
  }


  public function generarOferta()
  {

    if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
      require_once 'views/page_not_found.php';
    } else {
      $resultados = $this->model->mostrarSelec();
      require_once 'views/registro/generar-oferta.php';
    }

  }

  public function agregar_generar_oferta()
  {

    // echo("<script>

    // </sript>");
    // $fecha = now;

    // $fecha=$_POST['fecha'];
    // var_dump($fecha);    
    $titulo = htmlentities($_POST['detalle-titulo']); ////////////********
    $detalle = htmlentities($_POST['detalle-det']);
    $selechora = htmlentities($_POST['selec']);
    $tiempo = htmlentities($_POST['quantity-tiempo']);
    $precio = htmlentities($_POST['quantity-precio']);
    $vacante = htmlentities($_POST['quantity-numero']);
    $labor = htmlentities($_POST['selec-gentrabajo']);
    $lugar = htmlentities($_POST['detalle-lugar']); ////////////////*******
    $idUser = $_SESSION['id'];

    $longitud = htmlentities($_POST['longitud']);
    $latitud = htmlentities($_POST['latitud']);


    ////////////ARCHIVO

    $url = "assets/imgTrabajo/" . $idUser . "/";
    if (!file_exists($url)) {
      mkdir($url, 0777);
    }


    if (basename($_FILES['imgTrabajo']['name']) == null) {
      $imgTrab = "assets/img/perfilBase/trabajoR.jpg";
    } else {
      $imgTrab = $url . $_FILES['imgTrabajo']['name'];
    }



    if (move_uploaded_file($_FILES['imgTrabajo']['tmp_name'], $imgTrab)) {
      $msj = htmlspecialchars(basename($_FILES["imgTrabajo"]["name"]));
    }







    // var_dump($_POST['detalle-titulo']);
    $res = $this->model->insertar_generaroferta($titulo, $detalle, $selechora, $tiempo, $precio, $vacante, $labor, $lugar, $longitud, $latitud, $idUser, $imgTrab);

    if (!$res) {
      $msgr = '0';
      $color = "danger";
    } else {
      $msgr = '1';
      $color = 'primary';
    }
    $_SESSION['mensaje'] = $msgr;
    $_SESSION['color'] = $color;
    // require_once 'views/registro/generar-oferta.php';
    // echo "<script>var validador=false;</script>";
    // require_once 'views/postulaciones/postulaciones.php';

    //  header("Location:index.php?c=Postulacion&a=postulacion&act=val");
    session_start();

    $_SESSION['validador'] = 0;
    header("Location:index.php?c=Postulacion&a=postulacion&type=publicacion");
    exit;
  }

  public function consultarCorreo()
  {
    $email = $_GET['email'];
    $resultado = $this->model->consultarCorreo($email);
    echo json_encode($resultado);
  }

  public function agregar()
  {
    $nombre = htmlentities($_POST['nombres']);
    $apellido = htmlentities($_POST['apellidos']);
    $password = htmlentities($_POST['password']);
    $passwordencript = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    $email = htmlentities($_POST['correo']);
    $telf = htmlentities($_POST['telf']);
    $ciudad = htmlentities($_POST['ciudad']);
    $cedula = htmlentities($_POST['cedula']);
    $validarCorreo = $this->model->consultarCorreo($email);
    if (isset($validarCorreo)) {

      require_once 'views/registro/registro.php';

    } else {
      $res = $this->model->insertar($nombre, $apellido, $passwordencript, $email, $telf, $cedula, $ciudad);

      if (!$res) {
        $msgr = '0';
        $color = "danger";
      } else {
        $msgr = '1';
        $color = 'primary';
      }
      $_SESSION['mensaje'] = $msgr;
      $_SESSION['color'] = $color;

      //Vista
      header("Location:index.php?c=Login&a=Login&mg=$msgr");
    }
  }

  public function agregar_selec_profesion()
  {

    $seleclabor = htmlentities($_POST['select']);
    // echo($seleclabor);

    // $nombre =htmlentities($_POST['nombre']);
    // var_dump($_POST['nombre']);
    $res = $this->model->insertar_labor($seleclabor);

    if (!$res) {
      $msgr = '0';
      $color = "danger";
    } else {
      $msgr = '1';
      $color = 'primary';
    }
    $_SESSION['mensaje'] = $msgr;
    $_SESSION['color'] = $color;
    header("Location:index.php?c=Perfil&a=miPerfil");
  }
  public function agregar_pw()
  {

    $pw = htmlentities($_POST['password']);
    $pwencript = password_hash($pw, PASSWORD_DEFAULT);
    // echo($seleclabor);

    // $nombre =htmlentities($_POST['nombre']);
    // var_dump($_POST['nombre']);
    $res = $this->model->insertar_pw($pwencript);

    if (!$res) {
      $msgr = '0';
      $color = "danger";
    } else {
      $msgr = '1';
      $color = 'primary';
    }
    $_SESSION['mensaje'] = $msgr;
    $_SESSION['color'] = $color;
    header("Location:index.php?c=Perfil&a=miPerfil");
  }

  public function change_pw()
  {
    $regmodel = new RegistroModel();
    $tokensession = $_SESSION['id'];


    $pw = htmlentities($_POST['password']);
    $pwencript = password_hash($pw, PASSWORD_DEFAULT);
    // echo($seleclabor);

    // $nombre =htmlentities($_POST['nombre']);
    // var_dump($_POST['nombre']);

    $res = $this->model->insertar_pwtoken($pwencript, $tokensession);
    $regmodel->deletetkn($tokensession);
    if (isset($res)) {
      echo "se inserto";

      header("Location:index.php?c=Index&a=index");

    } else {
      echo "nose inserto ";
    }


  }




  public function mostrarEditar()
  {
    if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
      require_once 'views/page_not_found.php';
    } else {
      $idRegistroP = $_GET["postu"];
      $selec_profesion = $this->model->selecbd();
      $resultados = $this->model->mostrarEditar($idRegistroP);

      require_once 'views/registro/generar-ofertaEditar.php';
    }
  }



  public function editarPublicacion()
  {

    $titulo = htmlentities($_POST['detalle-titulo']); ////////////**
    $detalle = htmlentities($_POST['detalle-det']);
    $selechora = htmlentities($_POST['selec']);
    $tiempo = htmlentities($_POST['quantity-tiempo']);
    $precio = htmlentities($_POST['quantity-precio']);
    $vacante = htmlentities($_POST['quantity-numero']);
    $labor = htmlentities($_POST['selec-gentrabajo']);
    $lugar = htmlentities($_POST['detalle-lugar']); ////////////////**
    $idPos = $_GET['var'];
    $urlPos = $_GET['var2'];
    $longitud = htmlentities($_POST['longitud']);
    $latitud = htmlentities($_POST['latitud']);

    /////////////////ARCHIVO
    $ruta = "assets/imgTrabajo/" . $_SESSION['id'] . "/";
    //$imgEditable = $ruta. basename($_FILES['imgTrabajo']['name']);
    $imgEditable = $ruta . "trabajo" . $idPos;
    // echo '<script>alert($_FILES["imgTrabajo"]["name"]);</script>';

    if (move_uploaded_file($_FILES['imgTrabajo']['tmp_name'], $imgEditable)) {
      $msj = "exito al subir";
      // echo ("lo moviste");
      // print_r($_SESSION);
      // die();
    } else {
      // $imgEditable = $url . basename($_FILES['imgTrabajo']['name']);
      // echo ($imgEditable);
      // die();
      // **OBTENER LA DIRECCION DE LA IMAGEN Y RENOMBRARLAçç**
      $imgEditable = $urlPos;
    }


    $res = $this->model->editarPublicacion($titulo, $detalle, $selechora, $tiempo, $precio, $vacante, $labor, $lugar, $longitud, $latitud, $idPos, $imgEditable);
    $msj = 'Producto actualizado exitosamente';
    $color = 'primary';
    if (!$res) {
      $msj = "No se pudo realizar la actualizacion";
      $color = "danger";
    }
    $_SESSION['mensaje'] = $msj;
    $_SESSION['color'] = $color;




    //TEMPORAL
    //  header('Location:index.php?c=Vista&a=verVistaBusqueda&var='.$idPos.'&par=elp');
    header('Location:index.php?c=Postulacion&a=postulacionT');



  }
}