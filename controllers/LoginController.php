<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require_once 'models/LoginModel.php';

class LoginController
{
  private $model;

  public function __construct()
  {
    $this->model = new LoginModel();
  }

  public function login()
  {

    require_once 'views/login/login.php';
  }

public function recoveryLogin(){

        require_once 'views/login/login_recovery.php';
}


  public function usuario()
  {
    $email = htmlentities($_POST['correo']);
    $pass = htmlentities($_POST['password']);

    $validador = $this->model->consultaUser($email);

    //var_dump($validador);

    if (isset($validador) && password_verify($pass, $validador['password'])) {

      setcookie("user", $validador['email'], time() + (60 * 60), "/");
      setcookie("pass", $validador['password'], time() + (60 * 60), "/");
      $_SESSION['login'] = true;
      $_SESSION['Nombre'] = $validador['nombre'] . " " . $validador['Apellido'];
      $_SESSION['id'] = $validador['id-usuario'];
      $_SESSION['url'] = $validador['foto_perfil'];
      $_SESSION['rol'] = $validador['rol'];
    




      $miPorcentaje = $this->model->MiPorcentaje($_SESSION['id']);

      if ($miPorcentaje["Porcentaje"] == null) {
        $_SESSION['porcentaje'] = 0;
      } else {
        $_SESSION['porcentaje'] = $miPorcentaje["Porcentaje"];
      }



      if ($validador['id_fk_prfesionuser'] == null && $validador['rol'] == "user") {
        header('Location:index.php?c=Perfil&a=miPerfil');
      } else {
        header('Location:index.php?c=Index&a=index');
      }

    } else {
      $_SESSION['login'] = false;
      require_once 'views/login/login.php';
      echo ('<script>swal("Contraseña/Usuario Incorrectos");</script>');
    }

    /*
    if ($validador == false ){
    //setcookie("user", $tipoUser['username'], time() + (60 * 60), "/");
    //setcookie("pass", $tipoUser['password'], time() + (60 * 60), "/");
    //header('Location:index.php?c=Index&a=index');
    }
    if ($validador == true){
    require_once 'views/login/login.php';
    echo('<script>alert("Contraseña/Usuario Incorrectos");</script>');
    }*/


  }

  public function porcentaje()
  {
    $miPorcentaje = $this->model->MiPorcentaje($_SESSION['id']);
    
    if ($miPorcentaje["Porcentaje"] == null) {
      $_SESSION['porcentaje'] = 0;
    } else {
      $_SESSION['porcentaje'] = $miPorcentaje["Porcentaje"];
    }
  }



  public function recovery_usuario()
  {

    $email = htmlentities($_POST['correo']);
    $validador = $this->model->consultaUser($email);

    if (isset($validador)) {

      // var_dump($validador['id-usuario']);

      $tk = openssl_random_pseudo_bytes(32);
      $token = bin2hex($tk);
      $logmodel = new LoginModel();
      $logmodel->ingresartoken($token, $email);
      $valitoken = $this->model->consultatoken($token);

      // var_dump($validador['authtk']);


      try {
        //Server settings

        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->Host = 'smtp-mail.outlook.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'workanimus2023@outlook.es'; //SMTP username
        $mail->Password = 'workanimus99'; //SMTP password                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`                                   

        //Recipients
        $mail->isHTML(true); //Set email format to HTML
        $mail->setFrom('workanimus2023@outlook.es', 'WorkAnimus');
        $mail->addAddress($validador['email'], 'Usuario'); //Add a recipient

        // http://localhost/PROYECTO_TITULACION/recovery_pw.php?id=
        $mail->CharSet = "UTF-8";
        $mail->Subject = 'WorkAnimus: Recuperar contrasena';
        $mail->Body = 'Buen día estimado/a ' . $validador['nombre'] . ', le informamos que debe ingresar al link
        correspondiente para el ingreso de la nueva contraseña que solicitó <p>de click <a href="http://localhost/PROYECTO_TITULACION/index.php?c=Login&a=vistacontrasena&id=' . $valitoken['authtk'] . '">Aqui</a>.</p>';

        $mail->send();
        // echo 'Message has been sent';
        header("Location:index.php?c=Login&a=recoveryLogin&msg=ok");
      } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("Location:index.php?c=Login&a=recoveryLogin&msg=error");
       }


    } else {
      header("Location:index.php?c=Login&a=recoveryLogin&msg=no_found");
    }


  }
  public function vistacontrasena()
  {
    ///consulta y validar
   if (isset($_GET['id']) && $_GET['id'] != ""){
    $valitoken = $this->model->consultatoken($_GET['id']);
    }


    if (isset($valitoken)) {
      require_once 'views/login/recovery_pw.php';
    } else {
      require_once 'views\page_not_found.php';
    }



  }



  public function cerrarSesion()
  {
    

    $this->model->cerrarLogin();
    header('Location:index.php?c=Index&a=index');

  }



}