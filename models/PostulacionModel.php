<?php
require_once 'config/Conexion.php';

class PostulacionModel
{

    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }




    public function mostrarPublicacion()
    {

        $sql = "SELECT * FROM `registro_trabajo` INNER JOIN `usuario` ON `usuario_id`= `id-usuario` WHERE `id-usuario`= " . $_SESSION['id'] . " AND estado_trabajo=0 order by id_registro_trabajo desc ";

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

    public function mostrarMisPostulaciones()
    {

        $sql = "SELECT * FROM `postular` INNER JOIN `registro_trabajo` ON `id_fk_registro_trabajo`= `id_registro_trabajo`  INNER JOIN `usuario` ON `usuario_id`= `id-usuario` WHERE `id_fk_usuario`= " . $_SESSION['id'] . " ORDER by `id_postular` DESC";

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


    public function insertarMisPostulacion($idUser, $idRegistroP)
    {

        $sql2 = "UPDATE `registro_trabajo` SET `cantidad_postulantes` = `cantidad_postulantes`+ 1  WHERE id_registro_trabajo = :idRegistroP";

        $sentencia2 = $this->con->prepare($sql2);
        //bind parameters
        $data2 = [
            'idRegistroP' => $idRegistroP,
        ];
        $sentencia2->execute($data2);



        $sql = "INSERT INTO `postular` (`id_postular`, `id_fk_registro_trabajo`, `id_fk_usuario`) VALUES (NULL, :idRegistroP, :idUser)";


        $sentencia = $this->con->prepare($sql);

        $data = [
            'idUser' => $idUser,
            'idRegistroP' => $idRegistroP,
        ];
        //execute
        print_r($data);
        $sentencia->execute($data);
        if ($sentencia->rowCount() <= 0) {

            return false;
        }
        return true;


    }

    public function cancelarPostulacion($idUser, $idRegistroP)
    {
        $sql2 = "UPDATE `registro_trabajo` SET `cantidad_postulantes` = `cantidad_postulantes`- 1  WHERE id_registro_trabajo = :idRegistroP";

        $sentencia2 = $this->con->prepare($sql2);
        //bind parameters
        $data2 = [
            'idRegistroP' => $idRegistroP,
        ];
        $sentencia2->execute($data2);



        //prepare
        $sql = "DELETE FROM `postular` WHERE `id_fk_usuario` = :idUser and `id_fk_registro_trabajo` = :idRegistroP ";
        $sentencia = $this->con->prepare($sql);
        //bind parameters
        $data = [
            'idUser' => $idUser,
            'idRegistroP' => $idRegistroP,
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados
        if ($sentencia->rowCount() <= 0) { // rowCount retorna el numero de filas afectadas
            // verificar si se inserto 
            return false;
        }
        return true;
    }


    public function eliminarPostulacion($idUser, $idRegistroP)
    {

        //prepare
        // $sql1 = "UPDATE postular set estado_solicitud=3 where id_fk_registro_trabajo=:idRegistroP and estado_solicitud=0";

        // $sentencia2 = $this->con->prepare($sql1);
        // //bind parameters
        // $data1 = [
        //     'idRegistroP' => $idRegistroP,
        // ];
        // $sentencia2->execute($data1);

        $sql2 = "UPDATE `registro_trabajo` SET `estado_trabajo` = 1  WHERE `id_registro_trabajo` =  :idRegistroP and `usuario_id` =  :idUser ";

        $sentencia2 = $this->con->prepare($sql2);
        //bind parameters
        $data2 = [
            'idRegistroP' => $idRegistroP,
            'idUser' => $idUser,
        ];
        $sentencia2->execute($data2);

    }

    public function eliminarPostulacionValidacion($idRegistroP)
    {
        $idUser = $_SESSION["id"];
        $sql2 = "UPDATE chat SET chat_leido = 1
WHERE 
    (id_user_emisor = :idUser AND EXISTS (SELECT 1 FROM postular WHERE id_fk_registro_trabajo = :idRegistroP AND id_fk_usuario = chat.id_user_receptor))
    OR
    (id_user_receptor = :idUser AND EXISTS (SELECT 1 FROM postular WHERE id_fk_registro_trabajo = :idRegistroP AND id_fk_usuario = chat.id_user_emisor));";

        $sentencia2 = $this->con->prepare($sql2);
        //bind parameters
        $data2 = [
            'idRegistroP' => $idRegistroP,
            'idUser' => $idUser,
        ];
        $sentencia2->execute($data2);





        $sql = "DELETE FROM `postular` WHERE `id_fk_registro_trabajo` =  :idRegistroP";
        $sentencia = $this->con->prepare($sql);
        $data = [
            'idRegistroP' => $idRegistroP,
        ];
        $sentencia->execute($data);
        if ($sentencia->rowCount() <= 0) { // rowCount retorna el numero de filas afectadas
            // verificar si se inserto 
            return false;
        }
        return true;
    }




}