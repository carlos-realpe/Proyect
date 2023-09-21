<?php
require_once 'config/Conexion.php';

class AdminModel
{

    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function ListaUsuarios()
    {

        $sql = "SELECT `id-usuario` as IdUser,CONCAT(nombre, ' ', apellido) AS Nombre,cedula,email FROM `usuario` where rol='user';";

        $stmt = $this->con->prepare($sql);


        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;

    }
    public function seleccionUsuario($id)
    {
        $sql = "SELECT * FROM `usuario` where `id-usuario`=" . $id . "";

        $stmt = $this->con->prepare($sql);
        //bind parameters

        //ejecuto la sentencia
        $stmt->execute();
        // recupero resultados
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        // retorno resultados
        return $resultados;
    }




    public function editarUsuario($id, $nombre, $apellido, $pass, $email, $telf, $lugar, $cedula)
    {

        $sql = "UPDATE `usuario` SET `nombre`=:nombre,`Apellido`=:apellido,`password`=:pass,`email`=:email, `telefono`=:telf,`lugar`=:lugar,`cedula`=:cedula  WHERE  `id-usuario`=:id";

        $sentencia = $this->con->prepare($sql);
        //bind parameters
        $data = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'pass' => $pass,
            'email' => $email,
            'telf' => $telf,
            'id' => $id,
            'lugar' => $lugar,
            'cedula' => $cedula,
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados
        if ($sentencia->rowCount() < 0) { // rowCount retorna el numero de filas afectadas
            // verificar si se inserto 
            return false;
        }
        return true;



    }


    public function editarfotoPerfil($id, $foto_perfil)
    {
        $sql = "UPDATE `usuario` SET `foto_perfil`=:foto_perfil WHERE  `id-usuario`=:id";

        $sentencia = $this->con->prepare($sql);
        //bind parameters
        $data = [
            'foto_perfil' => $foto_perfil,
            'id' => $id,
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

    public function AjaxEliminarUsuario($id)
    {

        $sql = "DELETE FROM `usuario` WHERE `id-usuario`=:id";

        $sentencia = $this->con->prepare($sql);
        //bind parameters
        $data = [
            'id' => $id,
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

    public function buscarAjaxUsuarios($busqueda)
    {
        $sql = "SELECT `id-usuario` as IdUser,CONCAT(nombre, ' ', apellido) AS Nombre,cedula,email,rol FROM `usuario` where rol='user' and (nombre like :b1) or (Apellido like :b1) or (cedula like :b1)";


        $stmt = $this->con->prepare($sql);

        $conlike = '%' . $busqueda . '%';
        $data = [
            'b1' => $conlike,
        ];

        $stmt->execute($data);

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;



    }


















    /* =============================================TRABAJOS=============================================*/



    public function ListaTrabajos()
    {
        $sql = "SELECT `id_registro_trabajo`,titulo,detalle,fecha FROM `registro_trabajo`;";

        $stmt = $this->con->prepare($sql);


        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;


    }


    public function mostrarEditarTrabajo($id)
    {
        $sql = "SELECT registro_trabajo.*, usuario.`id-usuario` as idUser FROM `registro_trabajo`  INNER JOIN `usuario` ON `usuario_id`= `id-usuario` WHERE `id_registro_trabajo`= " . $id . "";
        $stmt = $this->con->prepare($sql);

        $stmt->execute();

        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultados;
    }


    public function selecbd()
    {
        $sql = "SELECT * FROM `profesion_user`";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados_selec = $stmt->fetchAll();
        return $resultados_selec;
    }
    public function selecbdmostrar($idProfesion)
    {
        $sql = "SELECT * FROM `profesion_user` where `id_profesion_user`=" . $idProfesion . "";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultados;
    }


    public function EditarTrabajo($titulo, $detalle, $selechora, $tiempo, $precio, $vacante, $labor, $lugar, $longitud, $latitud, $idPos, $imgEditable)
    {
        $sql = "UPDATE `registro_trabajo` SET `titulo` =:titulo, `detalle` =:detalle, `cntd_tiempo` =:tiempo, `lbl_tiempo` =:selechora, `precio` =:precio, `vacante` =:vacante, `lugar-trabajo` =:lugar, `labor_trabajo` =:labor, `longitud` =:longitud,`latitud` =:latitud, `foto_trabajo` =:imgEditable WHERE `registro_trabajo`.`id_registro_trabajo` =:idPos";

        $sentencia = $this->con->prepare($sql);
        //bind parameters
        $datas = [
            'titulo' => $titulo,
            'detalle' => $detalle,
            'tiempo' => $tiempo,
            'selechora' => $selechora,
            'precio' => $precio,
            'vacante' => $vacante,
            'lugar' => $lugar,
            'labor' => $labor,
            'longitud' => $longitud,
            'latitud' => $latitud,
            'idPos' => $idPos,
            'imgEditable' => $imgEditable
        ];


        //execute
        print_r($datas);

        //retornar resultados
        $sentencia->execute($datas);
        if ($sentencia->rowCount() <= 0) {

            return false;
        }
        return true;




    }

    public function AjaxEliminarTrabajo($idTrabajo)
    {
        //$sql2 = "UPDATE `registro_trabajo` SET `estado_trabajo` = 1  WHERE `id_registro_trabajo` =  :idTrabajo";

        $sql2 = "DELETE FROM `registro_trabajo` WHERE `id_registro_trabajo` =  :idTrabajo";

        $sentencia2 = $this->con->prepare($sql2);
        //bind parameters
        $data2 = [
            'idTrabajo' => $idTrabajo,
        ];
        $sentencia2->execute($data2);



    }


    public function buscarAjaxTrabajo($busqueda, $busquedaFecha)
    {
        if ($busquedaFecha == 1) {
            $sql = "SELECT `id_registro_trabajo`,titulo,detalle,fecha FROM `registro_trabajo` where (titulo like :b1) ORDER BY `fecha` DESC";
        }
        if ($busquedaFecha == 0) {
            $sql = "SELECT `id_registro_trabajo`,titulo,detalle,fecha FROM `registro_trabajo` where (titulo like :b1) ORDER BY `fecha` ASC";
        }


        $stmt = $this->con->prepare($sql);

        $conlike = '%' . $busqueda . '%';
        $data = [
            'b1' => $conlike,
        ];

        $stmt->execute($data);

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;



    }



    /* =============================================PROFESIONES=============================================*/



    public function EditarProfesion($titulo, $idProf, $urlImgProf)
    {

        $sql = "UPDATE `profesion_user` SET `name_profesion_user` =:titulo, `img_profesionuser` =:imgEditable WHERE `id_profesion_user` =:idPos";

        $sentencia = $this->con->prepare($sql);
        //bind parameters
        $datas = [
            'titulo' => $titulo,
            'idPos' => $idProf,
            'imgEditable' => $urlImgProf
        ];
        //execute
        // print_r($datas);

        //retornar resultados
        $sentencia->execute($datas);


        if ($sentencia->rowCount() <= 0) {

            return false;
        }
        return true;

    }
    public function EnviarProfesion($titulo, $urlImgProf)
    {

        $sql = "INSERT INTO `profesion_user`(`id_profesion_user`, `img_profesionuser`, `name_profesion_user`)VALUES (NULL,:imgEditable,:titulo)";
        $sentencia = $this->con->prepare($sql);
        //bind parameters
        $datas = [
            'titulo' => $titulo,
            'imgEditable' => $urlImgProf
        ];
        //execute
        // print_r($datas);

        //retornar resultados
        $sentencia->execute($datas);

        if ($sentencia->rowCount() <= 0) {

            return false;
        }
        return true;

    }

    public function AjaxEliminarProfesion($idP)
    {



        $sql2 = "DELETE FROM `profesion_user` WHERE `id_profesion_user` =  :id";

        $sentencia2 = $this->con->prepare($sql2);
        //bind parameters
        $data2 = [
            'id' => $idP,
        ];
        //execute
        $sentencia2->execute($data2);
        //retornar resultados
        if ($sentencia2->rowCount() <= 0) { // rowCount retorna el numero de filas afectadas


            return false;
        } else {
            $sql = "UPDATE `usuario` SET `id_fk_prfesionuser` ='' WHERE `id_fk_prfesionuser`= :id";

            $sentencia = $this->con->prepare($sql);
            //bind parameters
            $data = [
                'id' => $idP,
            ];
            //execute


            $sentencia->execute($data);

            $sql3 = "UPDATE `registro_trabajo` SET `labor_trabajo`='' WHERE `labor_trabajo`= :id";

            $sentencia3 = $this->con->prepare($sql3);
            //bind parameters
            $data3 = [
                'id' => $idP,
            ];
            //execute
            $sentencia3->execute($data3);
            return true;
        }

    }



}