<?php
require_once 'config/Conexion.php';

class VistaModel
{

    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function selecbd()
    {
        $sql = "SELECT * FROM `profesion_user` ";
        $stmt = $this->con->prepare($sql);
        //bind parameters

        //ejecuto la sentencia
        $stmt->execute();
        // recupero resultados
        $resultados_selec = $stmt->fetchAll();
        // retorno resultados
        return $resultados_selec;
    }





    public function consultaVistaBusqueda($id)
    {

        $sql = "SELECT * FROM `registro_trabajo` INNER JOIN `usuario` ON `usuario_id`= `id-usuario` WHERE `id_registro_trabajo`= " . $id . "";
        //  $sql = "SELECT * FROM `postular` INNER JOIN `registro_trabajo` ON `id_fk_registro_trabajo`= `id_registro_trabajo`  INNER JOIN `usuario` ON `id_fk_usuario`= `id-usuario`  WHERE `id_registro_trabajo`= ".$id."";

        // $sql = "select * from registro_trabajo INNER JOIN usuario ON id-usuario=".$idUsuario." where usuario_id_usuario=".$idUsuario."";

        $stmt = $this->con->prepare($sql);
        //bind parameters

        //ejecuto la sentencia
        $stmt->execute();
        // recupero resultados
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        // retorno resultados
        return $resultados;


    }
    public function validarUserP($id)
    {
        $idUser = $_SESSION["id"];
        $sql = "select * from postular where id_fk_registro_trabajo=:id and id_fk_usuario=:idUser";
        $stmt = $this->con->prepare($sql);

        $data = ['id' => $id, 'idUser' => $idUser];

        $stmt->execute($data);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() <= 0) {
            return $resultado = null;
        }


        return $resultado;


    }


    public function consultaPostulantes($id)
    {
        $sql = "SELECT * FROM `postular`, registro_trabajo,`profesion_user`, usuario  where id_fk_usuario = `id-usuario` and id_fk_registro_trabajo = id_registro_trabajo and id_fk_prfesionuser=id_profesion_user  and id_fk_registro_trabajo=" . $id . " and usuario_id = " . $_SESSION['id'] . " and estado_solicitud =0 ";
        $stmt = $this->con->prepare($sql);
        //bind parameters

        //ejecuto la sentencia
        $stmt->execute();
        // recupero resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorno resultados
        return $resultados;


    }




    public function AjaxSolicitud($idFactura, $idUsuario, $cancelar)
    {
        $idActual = $_SESSION["id"];
        if ($cancelar == "Cancel") {
            //   $sql = "UPDATE `postular` SET `estado_solicitud` = '0' WHERE `id_fk_registro_trabajo` =:idFactura and `id_fk_usuario` = :idUsuario";


            $sql2 = "UPDATE `postular` SET `estado_solicitud` = '0',`leido` = '0'  WHERE `id_fk_registro_trabajo` =:idFactura and `id_fk_usuario` = :idUsuario";
            $sentencia2 = $this->con->prepare($sql2);
            $data2 = ['idFactura' => $idFactura, 'idUsuario' => $idUsuario,];
            $sentencia2->execute($data2);




            $sqlActVal = "UPDATE `valoracion` SET `estado_valoracion` = '1',CalificacionPostulante=0  WHERE `id_reg_trabajo` =:idFactura and `UserCalificado` = :idUsuario ";
            $sentenciaActVal = $this->con->prepare($sqlActVal);
            $dataActVal = [
                'idFactura' => $idFactura,
                'idUsuario' => $idUsuario,
            ];
            $sentenciaActVal->execute($dataActVal);

            $sql = "UPDATE `postular`,`registro_trabajo` SET `estado_solicitud` = '0',`vacante` = `vacante`+ 1  WHERE `id_fk_registro_trabajo` =:idFactura and `id_fk_usuario` = :idUsuario and id_registro_trabajo = :idFactura";



        } else {
            //   INSERCION
            $validarBusqueda = "SELECT * FROM valoracion WHERE `id_reg_trabajo` =:idFactura and `UserCalificado` = :idUsuario ";

            $busqueda = $this->con->prepare($validarBusqueda);
            $dataBusqueda = ['idFactura' => $idFactura, 'idUsuario' => $idUsuario];
            $busqueda->execute($dataBusqueda);
            $busqueda->fetch(PDO::FETCH_ASSOC);
            if ($busqueda->rowCount() <= 0) {
                $sqlVal = "INSERT INTO `valoracion` (`id_rating`, `UsuarioCalifica`, `UserCalificado`,id_reg_trabajo, estado_valoracion) VALUES (NULL, :idActual, :idUsuario,:idFactura,0)";
                $sentenciaVal = $this->con->prepare($sqlVal);
                $dataVal = [
                    'idActual' => $idActual,
                    'idUsuario' => $idUsuario,
                    'idFactura' => $idFactura,
                ];

                //  print_r($dataVal);
                $sentenciaVal->execute($dataVal);
            } else {
                $sqlVal = "UPDATE `valoracion` SET estado_valoracion = 0 where `id_reg_trabajo` =:idFactura and `UserCalificado` = :idUsuario and UsuarioCalifica =:idActual";
                $sentenciaVal = $this->con->prepare($sqlVal);
                $dataVal = [
                    'idActual' => $idActual,
                    'idUsuario' => $idUsuario,
                    'idFactura' => $idFactura,
                ];

                // print_r($dataVal);
                $sentenciaVal->execute($dataVal);
            }

            /// FIN DE INSERCION


            $sql = "UPDATE `postular`,`registro_trabajo` SET `estado_solicitud` = '1',`vacante` = `vacante`- 1, `cantidad_postulantes` = `cantidad_postulantes`- 1  WHERE `id_fk_registro_trabajo` =:idFactura and `id_fk_usuario` = :idUsuario and id_registro_trabajo = :idFactura";

        }



        $sentencia = $this->con->prepare($sql);
        //bind parameters
        $data = [
            'idFactura' => $idFactura,
            'idUsuario' => $idUsuario,
        ];
        $sentencia->execute($data);
        if ($sentencia->rowCount() <= 0) { // rowCount retorna el numero de filas afectadas
            // verificar si se inserto 
            //   return false;
        }
        // return true;
    }




    public function RechazarAjaxSolicitud($idFactura, $idUsuario)
    {


        $sql2 = "UPDATE `registro_trabajo` SET `cantidad_postulantes` = `cantidad_postulantes`- 1 WHERE id_registro_trabajo = :idFactura";
        $sentencia2 = $this->con->prepare($sql2);
        $data2 = ['idFactura' => $idFactura,];
        $sentencia2->execute($data2);


        //prepare
        //  $sql = "DELETE FROM `postular` WHERE `id_fk_registro_trabajo` =:idFactura and `id_fk_usuario` = :idUsuario";
        $sql = "UPDATE `postular` SET `estado_solicitud` = '2' WHERE `id_fk_registro_trabajo` =:idFactura and `id_fk_usuario` = :idUsuario";
        $sentencia = $this->con->prepare($sql);
        //bind parameters
        $data = [
            'idFactura' => $idFactura,
            'idUsuario' => $idUsuario,
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados
        if ($sentencia->rowCount() <= 0) { // rowCount retorna el numero de filas afectadas
            // verificar si se inserto 
            // return false;
        }
        // return true;
    }



    public function ValorarInsertar($valor, $idUsuario)
    {
        $UsuarioActual = $_SESSION["id"];
        $sql2 = "UPDATE usuario SET `id_fk_valoracion`=:idUsuario where `id-usuario` = :idUsuario";
        //now()
        $sentencia2 = $this->con->prepare($sql2);
        $data2 = [
            'idUsuario' => $idUsuario,
        ];
        //execute
        // print_r($data);
        $sentencia2->execute($data2);


        $sql = "INSERT INTO `valoracion` (`id_valoracion`,`CalificacionPostulante`,UsuarioCalifica) VALUES (:idUsuario,:valor,:UsuarioActual)";
        //now()
        $sentencia = $this->con->prepare($sql);
        $data = [
            'valor' => $valor,
            'idUsuario' => $idUsuario,
            'UsuarioActual' => $UsuarioActual,
        ];
        //execute
        // print_r($data);
        $sentencia->execute($data);


        if ($sentencia->rowCount() <= 0) {

            return false;
        }
        return true;



    }



    public function ValorarActualizar($valor, $idUsuario, $UserActual)
    {
        $sql = "UPDATE valoracion SET `CalificacionPostulante`=:valor  where `id_valoracion` = :idUsuario and UsuarioCalifica = :UserActual";
        //now()
        $sentencia = $this->con->prepare($sql);
        $data = [
            'valor' => $valor,
            'idUsuario' => $idUsuario,
            'UserActual' => $UserActual

        ];
        //execute
        // print_r($data);
        $sentencia->execute($data);

        $sentencia->execute($data);
        if ($sentencia->rowCount() <= 0) {

            return false;
        }
        return true;



    }


    public function Porcentaje($id)
    {

        $sql = "SELECT UserCalificado as usuarioCalificado,Count(*) as CantidadResenas,TRUNCATE(((SUM(CalificacionPostulante)/COUNT(*))/0.05),0) AS Porcentaje from valoracion inner join usuario on `id-usuario` = UsuarioCalifica inner join usuario as us on us.`id-usuario` = UserCalificado where UserCalificado = " . $id . " and estado_valoracion=2";
        //  $sql = "SELECT UserCalificado as usuarioCalificado,Count(*) as CantidadResenas,TRUNCATE(((SUM(CalificacionPostulante)/COUNT(*))/0.05),0) AS Porcentaje from valoracion inner join usuario on `id-usuario` = UsuarioCalifica inner join usuario as us on us.`id-usuario` = UserCalificado where UserCalificado = us.`id-usuario` and estado_valoracion=0 GROUP by us.`id-usuario`";
        $stmt = $this->con->prepare($sql);
        //bind parameters

        //ejecuto la sentencia
        $stmt->execute();
        // recupero resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorno resultados



        return $resultados;

    }


    public function Vacante($id)
    {
        $sql = "SELECT vacante FROM `registro_trabajo` where id_registro_trabajo =" . $id . "";
        $stmt = $this->con->prepare($sql);
        //bind parameters

        //ejecuto la sentencia
        $stmt->execute();
        // recupero resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorno resultados
        return $resultados;


    }
}