<?php
session_start();
use Twilio\Rest\Client;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'models/VistaModel.php';


class VistaController
{
  private $model;

  function enviarNotificacionCorreo($email, $titulo, $nombre, $telfUser)
  {

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    $mail = new PHPMailer(false);
    try {

      $mail->isSMTP(); //Send using SMTP

      $mail->Host = 'smtp-mail.outlook.com';

      $mail->SMTPAuth = true;

      $mail->Username = 'workanimus2023@outlook.es'; //SMTP username
      $mail->Password = 'workanimus99'; //SMTP password


      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('workanimus2023@outlook.es', 'WorkAnimus');
      $mail->addAddress($email, 'Usuario'); // Al correo que se le va a enviar

      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';
      $mail->Subject = 'WorkAnimus: Estado de Postulación';
      $mail->Body = 'Buen día estimado/a ' . $nombre . ', le informamos que fue Aceptado por parte del trabajo "' . $titulo . '",
para la cual postuló, se solicita ponerse en contacto, para establecer el horario y acuerdos relevantes con el autor del trabajo al siguiente número 0' . $telfUser;

      $mail->send();

      return 0;
    } catch (Exception $e) {

      return 1;
    }


  }
  public function __construct()
  {
    $this->model = new VistaModel();
  }



  public function verMas()
  {

    require_once 'views/postulaciones/vermas.php';
  }


  public function verVistaBusqueda()
  {
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
      $estado = "";
      if (isset($_GET['estado'])) {
        $estado = htmlentities($_GET['estado']);
      }
      $id = htmlentities($_GET['var']);
      $_SESSION["temp"] = $id;
      $val = $_GET['par'];
      $selec_profesion = $this->model->selecbd();
      $resultados = $this->model->consultaVistaBusqueda($id);
      if (isset($_SESSION['id'])) {

        // $postulante = $this->model->consultaPostulantes($id);
        $validador = $this->model->validarUserP($id);
      }
      /*
      <?php if ($val == "vd" &&  $resultados["usuario_id"] != $_SESSION["id"] ){?>
      <a href="#" class="card-link btn btn-primary">Postular</a>
      <?php }else{  ?>
      <a href="#" class="card-link btn btn-primary">Cancelar Postulacion</a> 
      <?php   } ?>
      
      <?php if ($val == "mis" &&  $resultados["usuario_id"] != $_SESSION["id"] ){?>
      <a href="#" class="card-link btn btn-primary">Eliminar</a>
      <?php } ?>
      */

      /*   if(!isset($validador)){
      if ($val == "vd" &&  $resultados["usuario_id"] != $_SESSION["id"] ){
      $mensaje ="Postular";
      }else{ 
      $mensaje ="Cancelar Postulacion";
      if ($val == "mis" &&  $resultados["usuario_id"] != $_SESSION["id"] ){
      $mensaje ="Cancelar Postulacion";
      } else{
      $mensaje ="Eliminar Postulacion";
      }
      } 
      }else{
      $mensaje ="Funciono";
      }*/
      if (isset($_SESSION['id'])) {
        if (!isset($validador)) {
          if ($resultados["usuario_id"] == $_SESSION['id']) {
            $mensaje = "Eliminar";
            $mensaje2 = "Trabajo";
          } else {
            if ($val == "vd" || $val == "mis") {

              $mensaje = "Cancelar Postulación";
            } else {
              $mensaje = "Postular";
              $mensaje2 = "";
            }
          }
        } else {
          $mensaje = "Cancelar";
          $mensaje2 = "Postulacion";
        }
      } else {
        $mensaje = "Postular";
        $mensaje2 = "";
      }

      require_once 'views/postulaciones/vermas.php';



    } else {
      header("Location:index.php?c=Login&a=Login&p=login");
    }





  }



  public function verAjaxVistaSolicitud()
  {




    // if (isset($_SESSION['id'])){
    $postulante = $this->model->consultaPostulantes($_SESSION["temp"]);

    echo json_encode($postulante);





    //  }

  }
  function json()
  {

    echo json_encode("true", JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  }

  function AceptarAjaxSolicitud()
  {
    /* $correo = "carlosnarutokun@gmail.com";
    $asunto = "Fuiste Aceptado";
    $header = "Workanimus";
    $mensaje = "Fuiste Aceptado";
    mail($correo, $asunto, $mensaje, $header);*/

    $idFactura = $_GET["idFactura"];
    $idUsuario = $_GET["idUsuario"];
    $email = $_GET["email"];
    $titulo = $_GET["titulo"];
    $numero = $_GET["numero"];
    $nombre = $_GET["nombre"];
    $telfUser = $_GET["telfUser"];

    $cancelar = "";

    $respuesta = $this->enviarNotificacionCorreo($email, $titulo, $nombre, $telfUser);
    $this->enviarNotificacionWhasApp($titulo, $numero, $nombre, $telfUser);
    $this->model->AjaxSolicitud($idFactura, $idUsuario, $cancelar);

    echo json_encode($respuesta);

  }

  function enviarNotificacionWhasApp($titulo, $numero, $nombre, $telfUser)
  {
    /* TWILLIO  blibloteca v 6.44.3*/
    // Esta configurado con mi numero
    require_once 'Twilio/autoload.php';
    $sid = "AC137c1ec6bf1b9a42ecf4acef9c5b390a";
    $token = "740ab8a38ba0a8984bb114aa7b1490b5";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create(
        "whatsapp:+593" . $numero,
        // // NUMERO AL QUE SE ENVIA
        array(
          "from" => "whatsapp:+14155238886",
          "body" => "Buen día Estimado/a " . $nombre . ", le informamos que fue Aceptado por parte del trabajo '" . $titulo . "' para la cual postuló, se solicita ponerse en contacto, para establecer el horario y acuerdos relevantes con el autor del trabajo al siguiente número 0" . $telfUser
        )
      );


  }





  function CancelarAjaxSolicitud()
  {

    $idFactura = $_GET["idFactura"];
    $idUsuario = $_GET["idUsuario"];
    $cancelar = $_GET["cancelar"];

    $resultado = $this->model->AjaxSolicitud($idFactura, $idUsuario, $cancelar);

  }



  function RechazarAjaxSolicitud()
  {
    $idFactura = $_GET["idFactura"];
    $idUsuario = $_GET["idUsuario"];
    $nombre = $_GET["nombre"];
    $titulo = $_GET["titulo"];
    $email = $_GET["email"];

    $respuesta = $this->notificarRechazarSolicitud($email, $titulo, $nombre);
    $this->model->RechazarAjaxSolicitud($idFactura, $idUsuario);
    echo json_encode($respuesta);

  }

  function notificarRechazarSolicitud($email, $titulo, $nombre)
  {

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    $mail = new PHPMailer(false);
    try {
      //Server settings

      $mail->isSMTP(); //Send using SMTP

      $mail->Host = 'smtp-mail.outlook.com';

      $mail->SMTPAuth = true;

      $mail->Username = 'workanimus2023@outlook.es'; //SMTP username
      $mail->Password = 'workanimus99'; //SMTP password


      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('workanimus2023@outlook.es', 'WorkAnimus');
      $mail->addAddress($email, 'Usuario'); // Al correo que se le va a enviar

      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';
      $mail->Subject = 'WorkAnimus: Estado de Postulación';
      $mail->Body = 'Buen día estimado/a ' . $nombre . ', le informamos que fue Rechazado por parte del trabajo "' . $titulo . '",para la cual postuló, gracias por su atención';

      $mail->send();

      return 0;
    } catch (Exception $e) {

      return 1;
    }
  }

  function ValorarInsertar()
  {
    $valor = $_GET["valorar"];
    $idUsuario = $_GET["idUser"];


    $resultado = $this->model->ValorarInsertar($valor, $idUsuario);


  }

  function ValorarActualizar()
  {
    $valor = $_GET["valorar"];
    $idUsuario = $_GET["idUser"];
    $UserActual = $_SESSION["id"];

    $resultado = $this->model->ValorarActualizar($valor, $idUsuario, $UserActual);


  }





  function Porcentaje()
  {
    $id = $_GET["idUserC"];


    $resultado = $this->model->Porcentaje($id);


    echo json_encode($resultado);


  }


  function Vacante()
  {
    $id = $_GET["idFactura"];
    $resultado = $this->model->Vacante($id);
    echo json_encode($resultado);
  }



  /**REPORTE */

  function Reporte()
  {
    $nombre = $_GET["nombre"];
    $titulo = $_GET["titulo"];
    $reporte = $_GET["reporte"];
    $resultado = $this->ReporteNotificar($nombre, $titulo, $reporte);
    echo json_encode($resultado);
  }

  function ReporteNotificar($nombre, $titulo, $reporte)
  {

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    $mail = new PHPMailer(false);
    try {

      $mail->isSMTP(); //Send using SMTP

      $mail->Host = 'smtp-mail.outlook.com';

      $mail->SMTPAuth = true;

      $mail->Username = 'workanimus2023@outlook.es'; //SMTP username
      $mail->Password = 'workanimus99'; //SMTP password


      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('workanimus2023@outlook.es', 'WorkAnimus');
      $mail->addAddress("workanimus2023@outlook.es", 'Usuario'); // Al correo que se le va a enviar

      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';
      $mail->Subject = 'WorkAnimus: Reporte de Publicación';
      $mail->Body = 'Se tiene un reporte de la publicación de ' . $nombre . ' con el título de "' . $titulo . '" con la siguiente razón: <b>' . $reporte . "</b>";

      $mail->send();

      return 0;
    } catch (Exception $e) {

      return 1;
    }


  }


}