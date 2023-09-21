<?php
session_start();
require_once 'models/AdminModel.php';
class AdminController
{
    private $model;
    public function __construct()
    {
        $this->model = new AdminModel();
    }
    public function AjaxListaUsuarios()
    {
        if (!isset($_SESSION['login']) || $_SESSION['login'] != true || $_SESSION['rol'] != "admin") {
            require_once 'views/page_not_found.php';

        } else {
            $usuarios = $this->model->ListaUsuarios();
            echo json_encode($usuarios);
        }
    }

    public function AjaxEliminarUsuario()
    {
        $id = htmlentities($_GET['idUser']);

        $this->model->AjaxEliminarUsuario($id);



    }
    public function buscarAjaxUsuarios()
    {

        $buscar = htmlentities($_GET['nom']);
        $resultados = $this->model->buscarAjaxUsuarios($buscar);
        echo json_encode($resultados);


    }


    public function ListaUsuarios()
    {
        if (!isset($_SESSION['login']) || $_SESSION['login'] != true || $_SESSION['rol'] != "admin") {
            require_once 'views/page_not_found.php';

        } else {


            require_once 'views/admin/ListaUser.php';

        }

    }

    public function seleccionUsuario()
    {
        $id = htmlentities($_GET['user']);
        if (!isset($_SESSION['login']) || $_SESSION['login'] != true || $_SESSION['rol'] != "admin") {
            require_once 'views/page_not_found.php';

        } else {

            $usuarios = $this->model->seleccionUsuario($id);
            require_once 'views/admin/ListaUserEdit.php';
        }

    }


    public function editarUsuario()
    {

        $id = htmlentities($_POST['user']);
        $nombre = htmlentities($_POST['nombres']);
        $apellido = htmlentities($_POST['apellidos']);

        $pwencript = htmlentities($_POST['password']);
        // $pwencript = password_hash($pw, PASSWORD_DEFAULT);
        $email = htmlentities($_POST['correo']);
        $telf = htmlentities($_POST['telf']);
        $lugar = htmlentities($_POST['ciudad']);
        $cedula = htmlentities($_POST['cedula']);

        $validar = $this->model->editarUsuario($id, $nombre, $apellido, $pwencript, $email, $telf, $lugar, $cedula);
        if ($validar) {
            $_SESSION['mensaje'] = true;
        } else {
            $_SESSION['mensaje'] = false;
        }

        header('Location:index.php?c=Admin&a=seleccionUsuario&user=' . $id);

    }


    public function editarfotoPerfil()
    {

        $id = htmlentities($_POST['user2']);
        $ruta = "assets/imgPerfil/" . $id . "/";
        $foto_perfil = $ruta . "perfil" . $id;


        if (move_uploaded_file($_FILES["btn_abrir_file"]["tmp_name"], $foto_perfil)) {
            $msj = htmlspecialchars(basename($_FILES["btn_abrir_file"]["name"]));
        }


        //llamar al modelo
        $validar = $this->model->editarfotoPerfil($id, $foto_perfil);


        if ($validar == false) {
            $_SESSION['mensaje'] = true;
        }
        if ($validar == true) {
            $_SESSION['mensaje'] = false;
        }
        header('Location:index.php?c=Admin&a=seleccionUsuario&user=' . $id);

    }












    /* =============================================TRABAJOS=============================================*/



    public function ListaTrabajos()
    {
        if (!isset($_SESSION['login']) || $_SESSION['login'] != true || $_SESSION['rol'] != "admin") {
            require_once 'views/page_not_found.php';

        } else {
            require_once 'views/admin/ListaTrabajos.php';

        }

    }


    public function AjaxListaTrabajos()
    {
        if (!isset($_SESSION['login']) || $_SESSION['login'] != true || $_SESSION['rol'] != "admin") {
            require_once 'views/page_not_found.php';

        } else {
            $trabajos = $this->model->ListaTrabajos();
            echo json_encode($trabajos);
        }
    }


    public function mostrarEditarTrabajo()
    {
        if (!isset($_SESSION['login']) || $_SESSION['login'] != true || $_SESSION['rol'] != "admin") {
            require_once 'views/page_not_found.php';
        } else {
            $idRegistroP = $_GET["postu"];
            $selec_profesion = $this->model->selecbd();
            $resultados = $this->model->mostrarEditarTrabajo($idRegistroP);
            require_once 'views/admin/ListaTrabajosEdit.php';
        }
    }
    public function mostrarEditarProfesion()
    {
        if (!isset($_SESSION['login']) || $_SESSION['login'] != true || $_SESSION['rol'] != "admin") {
            require_once 'views/page_not_found.php';
        } else {
            $idProfesion = $_GET["profs"];
            $selec_profesion = $this->model->selecbdmostrar($idProfesion);
            require_once 'views/admin/ListaProfesionesEdit.php';
        }
    }


    public function EditarTrabajo()
    {

        $idUser = htmlentities($_POST['idUser']);
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
        $ruta = "assets/imgTrabajo/" . $idUser . "/";
        //$imgEditable = $ruta. basename($_FILES['imgTrabajo']['name']);
        $imgEditable = $ruta . "trabajo" . $idPos;
        // echo '<script>alert($_FILES["imgTrabajo"]["name"]);</script>';

        if (move_uploaded_file($_FILES['imgTrabajo']['tmp_name'], $imgEditable)) {
            $msj = "exito al subir";
        } else {

            rename($urlPos, $imgEditable);
        }

        $res = $this->model->EditarTrabajo($titulo, $detalle, $selechora, $tiempo, $precio, $vacante, $labor, $lugar, $longitud, $latitud, $idPos, $imgEditable);


        //TEMPORAL
        //  header('Location:index.php?c=Vista&a=verVistaBusqueda&var='.$idPos.'&par=elp');
        header('Location:index.php?c=Admin&a=ListaTrabajos');



    }

    public function AjaxEliminarTrabajo()
    {
        $idTrabajo = htmlentities($_GET['idTrabajo']);

        $this->model->AjaxEliminarTrabajo($idTrabajo);



    }

    public function buscarAjaxTrabajo()
    {

        $buscar = htmlentities($_GET['nom']);
        $busquedaFecha = htmlentities($_GET['busquedaFecha']);
        $resultados = $this->model->buscarAjaxTrabajo($buscar, $busquedaFecha);
        echo json_encode($resultados);


    }


    /* =============================================PROFESIONES=============================================*/



    public function Profesiones()
    {
        if (!isset($_SESSION['login']) || $_SESSION['login'] != true || $_SESSION['rol'] != "admin") {
            require_once 'views/page_not_found.php';
        } else {
            // $selec_profesion = $this->model->selecbd();
            // echo json_encode($selec_profesion);
            require_once 'views/admin/ListaProfesiones.php';

        }

    }
    public function AjaxListaProfesiones()
    {
        if (!isset($_SESSION['login']) || $_SESSION['login'] != true || $_SESSION['rol'] != "admin") {
            require_once 'views/page_not_found.php';
        } else {
            $selec_profesion = $this->model->selecbd();
            echo json_encode($selec_profesion);

        }

    }
    public function EditarProfesion()
    {


        $titulo = htmlentities($_POST['detalle-titulo']); ////////////**
        $idProf = $_GET['var'];
        $urlImgProf = $_GET['var2'];
        // $flagAgg = $_GET['var3'];


        // echo ($urlImgProf);

        /////////////////ARCHIVO
        // assets\img\imgtrabajosfav\gasfitero.jpg
        // $ruta = "assets/imgtrabajosfav/" . $urlImgProf . "/";
        //$imgEditable = $ruta. basename($_FILES['imgTrabajo']['name']);
        // $imgEditable = $ruta . "trabajo" . $idProf;
        // echo '<script>alert($_FILES["imgTrabajo"]["name"]);</script>';
        $ruta = $_FILES['imgTrabajo']['name'];
        $imgEditable = "assets/img/imgtrabajosfav/" . $ruta . "";

        if (move_uploaded_file($_FILES['imgTrabajo']['tmp_name'], $imgEditable)) {
            $msj = "exito al subir";
            $urlImgProf = $imgEditable;
        }
        //  else {

        //     rename($urlImgProf, $ruta);
        // }


        $res = $this->model->EditarProfesion($titulo, $idProf, $urlImgProf);


        header('Location:index.php?c=Admin&a=Profesiones');


    }
    public function EnviarProfesion()
    {
        $url = "assets/img/imgtrabajosfav/";
        // $url = "assets/imgTrabajo/" . $idUser . "/";
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

        $titulo = htmlentities($_POST['detalle-titulo']); ////////////**
        $res = $this->model->EnviarProfesion($titulo, $imgTrab);

        header('Location:index.php?c=Admin&a=Profesiones');
    }
    public function AggProfesion()
    {
        // $nombre = htmlentities($_POST['nombres']);
        // $apellido = htmlentities($_POST['apellidos']);
        // $password = htmlentities($_POST['password']);
        // $passwordencript = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
        // $email = htmlentities($_POST['correo']);
        // $telf = htmlentities($_POST['telf']);
        // $ciudad = htmlentities($_POST['ciudad']);

        if (!isset($_SESSION['login']) || $_SESSION['login'] != true || $_SESSION['rol'] != "admin") {
            require_once 'views/page_not_found.php';
        } else {

            // $resultado = $this->model->Aggprofesion();

            require_once 'views\admin\ListaProfesionesAgg.php';

        }
    }
    public function AjaxEliminarProfesion()
    {
        $idP = htmlentities($_GET['idProf']);

        $this->model->AjaxEliminarProfesion($idP);



    }



}