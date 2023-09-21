<?php
require_once 'config/Conexion.php';

class ChatModel
{

    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }
    public function MostrarListaChat()
    {

        $sql = "SELECT DISTINCT nombre, Apellido, foto_perfil, `id-usuario` as idPerfil, (SELECT COUNT(*) FROM chat WHERE chat_leido = 0 AND id_user_receptor = " . $_SESSION["id"] . " AND id_user_emisor = `id-usuario`) as contadorLeido FROM postular INNER JOIN registro_trabajo ON id_fk_registro_trabajo = id_registro_trabajo INNER JOIN usuario ON usuario_id = `id-usuario` WHERE `id_fk_usuario` = " . $_SESSION["id"] . " AND estado_solicitud = 1";
        //     $sql = "SELECT nombre,Apellido,foto_perfil,`id-usuario` as idPerfil FROM `postular` INNER JOIN registro_trabajo ON id_fk_registro_trabajo=id_registro_trabajo inner join usuario on usuario_id = `id-usuario` WHERE `id_fk_usuario`=" . $_SESSION["id"] . " and estado_solicitud = 1";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;

    }


    public function MostrasListaChatMiPublicacion()
    {
        //  $sql = "SELECT nombre,Apellido,foto_perfil,`id-usuario` as idPerfil, COUNT(CASE WHEN chat_leido = 0 THEN 1 ELSE NULL END) as contadorLeido FROM chat inner join `usuario` on id_user_emisor=`id-usuario` inner join registro_trabajo ON usuario_id=" . $_SESSION["id"] . " inner join postular on id_registro_trabajo = `id_fk_registro_trabajo` WHERE `id_fk_usuario`=`id-usuario` and estado_solicitud = 1 GROUP by id_user_emisor";
        $sql = "SELECT DISTINCT nombre,Apellido,foto_perfil,`id-usuario` as idPerfil, (SELECT COUNT(*) FROM chat WHERE chat_leido = 0 AND id_user_emisor = `id-usuario`) as contadorLeido FROM `usuario` inner join registro_trabajo ON usuario_id=" . $_SESSION["id"] . "  inner join postular on id_registro_trabajo = `id_fk_registro_trabajo` WHERE `id_fk_usuario`=`id-usuario` and estado_solicitud = 1;";
        //  $sql = "SELECT nombre,Apellido,foto_perfil,`id-usuario` as idPerfil FROM `usuario` INNER JOIN registro_trabajo ON usuario_id=" . $_SESSION["id"] . " inner join postular on id_registro_trabajo = `id_fk_registro_trabajo` WHERE `id_fk_usuario`=`id-usuario` and estado_solicitud = 1;";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    /*CHAT LEIDO*/
    public function ChatLeido()
    {
        //  $sql= "SELECT count(*) as contador,id_user_emisor FROM `chat` Where chat_leido=0 and id_user_receptor=". $_SESSION["id"]." GROUP BY id_user_emisor";

        $sql = "SELECT count(*) as contador FROM `chat` Where chat_leido=0 and id_user_receptor=" . $_SESSION["id"] . "";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;

    }
    /*FIN CHAT LEIDO*/
    public function enviarMsg($idReceptor, $msg, $idUser)
    {
        $sql = "INSERT INTO `chat` (`id_chat`, `id_user_emisor`, `id_user_receptor`, `mensaje`,fecha) VALUES (NULL, :idUser, :idReceptor, :msg,CURRENT_TIMESTAMP)";

        $sentencia = $this->con->prepare($sql);
        $data = [
            'idUser' => $idUser,
            'idReceptor' => $idReceptor,
            'msg' => $msg,
        ];
        //execute
        print_r($data);
        $sentencia->execute($data);
        if ($sentencia->rowCount() <= 0) {

            return false;
        }
        return true;

    }

    public function mostrarMsg($idReceptor, $id)
    {

        $sql = "SELECT *, CASE 
    WHEN (`id_user_emisor` = " . $id . " AND `id_user_receptor` = " . $idReceptor . ") THEN 1
    WHEN (`id_user_emisor` = " . $idReceptor . " AND `id_user_receptor` = " . $id . ") THEN 0
END AS bandera
FROM `chat`
WHERE (`id_user_emisor` = " . $id . " AND `id_user_receptor` = " . $idReceptor . ") OR (`id_user_emisor` = " . $idReceptor . " AND `id_user_receptor` = " . $id . ")";
        //   $sql = "SELECT * FROM `chat` where `id_user_emisor`=".$id." and `id_user_receptor`=".$idReceptor."";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }



    public function usuarioSeleccionado($id)
    {

        $sql = "select foto_perfil,nombre,Apellido from usuario where `id-usuario`=" . $id . "";
        // $sql = "select * from usuario where email=:email and password=:password";

        $stmt = $this->con->prepare($sql);

        $stmt->execute();

        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultados;

    }



    public function ActualizarChatLeido($id)
    {
        $sql = "UPDATE `chat` SET `chat_leido`=1 WHERE `id_user_emisor`=" . $id . " and `id_user_receptor`=" . $_SESSION["id"] . "";

        $sentencia = $this->con->prepare($sql);
        $sentencia->execute();

        if ($sentencia->rowCount() <= 0) {
            return false;
        }
        return true;




    }

}