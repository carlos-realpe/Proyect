<?php
session_start();


require_once 'models/ChatModel.php';
class ChatController
{
    private $model;

    public function __construct()
    {
        $this->model = new ChatModel();
    }

    public function MostrarListaChat()
    {
        $resultadosChat = $this->model->MostrarListaChat();
       echo json_encode($resultadosChat);
       
    }


    public function MostrasListaChatMiPublicacion(){
        $resultadosChat2 = $this->model->MostrasListaChatMiPublicacion();
        echo json_encode($resultadosChat2);

    }

    /*CHAT LEIDO*/
public function ChatLeido(){
        $LeidoChat = $this->model->ChatLeido();
        echo json_encode($LeidoChat);

    }

    /*FIN CHAT LEIDO*/



    public function ChatMsg(){
if (!isset($_SESSION['login']) || $_SESSION['login'] != true){
      require_once 'views/page_not_found.php';
            }else{

       $id=$_GET['i'];  // La id
       $_SESSION['idReceptor']= base64_decode($id);

        $this->model->ActualizarChatLeido($_SESSION['idReceptor']);
        $user = $this->model->usuarioSeleccionado($_SESSION['idReceptor']);
       require_once 'views/chat/chat.php';
            }
    }


    public function enviarMsg()
    {
     $idReceptor=$_GET['idUserReceptor'];
     $msg=$_GET['mensaje'];
      
        $enviarMSG = $this->model->enviarMsg($idReceptor,$msg,$_SESSION['id']);

     //   echo json_encode($enviarMSG);
    }

   public function mostrarMsg(){
        $idReceptor = $_SESSION['idReceptor'];

        $this->model->ActualizarChatLeido($idReceptor);

     $mostrarMSG = $this->model->mostrarMsg($idReceptor, $_SESSION['id']);
       echo json_encode($mostrarMSG);
        
   }




}