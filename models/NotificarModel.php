<?php
require_once 'config/Conexion.php';

class NotificarModel {

private $con;

    public function __construct() { //cosntructor
        $this->con = Conexion::getConexion(); //operador :: llamando a un metodo estatico
    }
 

    public function NotificarPostulante(){

        $sql = "SELECT usuario_id,leido,foto_trabajo,id_fk_registro_trabajo,estado_solicitud,titulo FROM `postular` inner join registro_trabajo on id_fk_registro_trabajo=id_registro_trabajo where id_fk_usuario=".$_SESSION["id"] ." GROUP BY id_postular DESC";

        $stmt = $this->con->prepare($sql);
        //bind parameters

        //ejecuto la sentencia
        $stmt->execute();
        // recupero resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorno resultados
        return $resultados;


    }

    public function NotificarLeido()
    {
        $sql = "UPDATE `postular` SET `leido`=1 WHERE  `id_fk_usuario`=".$_SESSION["id"]." and estado_solicitud != 0";

        $sentencia = $this->con->prepare($sql);
        $sentencia->execute();
        
        if ($sentencia->rowCount() <= 0) { 
                  return false;
        }
        return true;
    }

}