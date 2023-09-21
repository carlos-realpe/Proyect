<?php
require_once 'config/Conexion.php';

class CalificarModel
{

    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function calificarAjaxMostrar(){

       
       
       
       
       
       
        $sql = "SELECT * FROM usuario,valoracion inner join registro_trabajo on id_reg_trabajo=id_registro_trabajo where UsuarioCalifica = ".$_SESSION['id']." and UserCalificado = `id-usuario` and estado_valoracion =0";

        // $sql = "select * from registro_trabajo INNER JOIN usuario ON id-usuario=".$idUsuario." where usuario_id_usuario=".$idUsuario."";

        $stmt = $this->con->prepare($sql);
        //bind parameters

        //ejecuto la sentencia
        $stmt->execute();
        // recupero resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorno resultados
        return $resultados;



    }
    public function valorarUsuario($idUser, $idRegistro, $UsuarioACalificar, $valor){
        $sql = "UPDATE valoracion set CalificacionPostulante=:valor where UsuarioCalifica=:idUser and id_reg_trabajo=:idRegistro and UserCalificado=:UsuarioACalificar";
        $sentencia = $this->con->prepare($sql);
        
        $data = [
            'idUser' => $idUser,
            'idRegistro' => $idRegistro,
            'UsuarioACalificar' => $UsuarioACalificar,
            'valor' => $valor,

        ];
   
        $sentencia->execute($data);
        if ($sentencia->rowCount() <= 0) {
       return false;
        }
        return true;
            
    }
    public function FinalizarTrabajo($idFactura, $idUsuario, $UserActual){


        $chatsql = "UPDATE chat set chat_leido=1 where (id_user_emisor=:UserActual and id_user_receptor=:idUsuario) or (id_user_emisor=:idUsuario and id_user_receptor=:UserActual)";
        $sentenciaChat = $this->con->prepare($chatsql);
        $dataChat = [
            'UserActual' => $UserActual,
            'idUsuario' => $idUsuario,
                   ];

        $sentenciaChat->execute($dataChat);


        $sql = "UPDATE postular set estado_solicitud=3 where id_fk_usuario=:idUsuario and id_fk_registro_trabajo =:idFactura";
        $sentencia = $this->con->prepare($sql);
        $data = [
            'idFactura' => $idFactura,
            'idUsuario' => $idUsuario,
        ];

        $sentencia->execute($data);




        $sql = "UPDATE valoracion set estado_valoracion=2 where UsuarioCalifica=:UserActual and id_reg_trabajo=:idFactura and UserCalificado=:idUsuario";
        $sentencia = $this->con->prepare($sql);
        $data = [
            'idFactura' => $idFactura,
            'idUsuario' => $idUsuario,
            'UserActual' => $UserActual,
         ];

        $sentencia->execute($data);
        if ($sentencia->rowCount() <= 0) {
            return false;
        }
        return true;





    }

}