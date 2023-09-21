<?php

require_once 'config/Conexion.php';

class RegistroModel
{

    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function mostrarSelec()
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

    public function insertar_generaroferta($titulo, $detalle, $selechora, $tiempo, $precio, $vacante, $labor, $lugar, $longitud, $latitud, $idUser, $imgTrab)
    {


        //    $usuario_id="";
        // $direccion = "";
        // $fecha = ;
        // $titulo="gasfitero";

        $sql = "INSERT INTO registro_trabajo (`id_registro_trabajo`, `titulo`, `detalle`, `cntd_tiempo`, `lbl_tiempo`, `precio`, `vacante`, `lugar-trabajo`, `labor_trabajo`, `fecha`,`longitud`, `latitud`, `usuario_id`, `foto_trabajo`) VALUES 
        (NULL,:titulo ,:detalle,:tiempo,:selechora,:precio,:vacante,:lugar,:direccion,CURRENT_TIMESTAMP,:longitud,:latitud,:idUser,:imgTrab)";

        $sentencia = $this->con->prepare($sql);


        $datas = [
            'titulo' => $titulo,
            'detalle' => $detalle,
            'tiempo' => $tiempo,
            'selechora' => $selechora,
            'precio' => $precio,
            'vacante' => $vacante,
            'lugar' => $lugar,
            'direccion' => $labor,
            'longitud' => $longitud,
            'latitud' => $latitud,
            'idUser' => $idUser,
            'imgTrab' => $imgTrab,
            // 'fecha' => $fecha,

        ];
        //execute
        print_r($datas);
        $sentencia->execute($datas);
        if ($sentencia->rowCount() <= 0) {

            return false;
        }
        return true;




    }
    public function insertar($nombre, $apellido, $passwor, $email, $telf, $cedula, $ciudad)
    {
        //prepare
        $rol = "user";
        $foto = "assets/img/perfilBase/perfilBase.jpg";
        $direc = "";
        $sql = "INSERT INTO usuario (`id-usuario`, `foto_perfil`, `nombre`, `Apellido`, `telefono`,cedula, `email`, `password`, `lugar`, `id_fk_prfesionuser`,rol) VALUES 
            (NULL,:foto ,  :nombre,:apellido, :telf,:cedula, :email, :passwor,:ciudad,:direc,:rol)";
        //now()
        $sentencia = $this->con->prepare($sql);


        $data = [
            'foto' => $foto,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'telf' => $telf,
            'cedula' => $cedula,
            'email' => $email,
            'passwor' => $passwor,
            'ciudad' => $ciudad,
            'direc' => $direc,
            'rol' => $rol,
        ];
        //execute
        // print_r($data);
        $sentencia->execute($data);
        if ($sentencia->rowCount() <= 0) {

            return false;
        }
        return true;
    }

    public function consultarCorreo($email)
    {

        $sql = "select * from usuario where email=:email";

        $stmt = $this->con->prepare($sql);

        $data = ['email' => $email];

        $stmt->execute($data);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() <= 0) { /// esta cprrectactamente
            return $resultado = null;
        }

        return $resultado;
    }

    public function insertar_labor($seleclabor)
    {
        $user = $_SESSION['id'];

        $sql = "UPDATE `usuario` SET `id_fk_prfesionuser`=:seleclabor  WHERE `id-usuario`=:user";


        $sentencia = $this->con->prepare($sql);


        $data = [
            'seleclabor' => $seleclabor,
            'user' => $user,
            // 'nombre' =>$nombre,

        ];
        //execute
        $sentencia->execute($data);
        if ($sentencia->rowCount() <= 0) {

            return false;
        }
        return true;

    }


    public function insertar_pw($pw)
    {
        $auth = $_SESSION['id'];
        var_dump($auth);
        $sql = "UPDATE `usuario` SET `password`=:pw  WHERE `id-usuario`=:auth";


        $sentencia = $this->con->prepare($sql);


        $data = [
            'pw' => $pw,
            'auth' => $auth,
            // 'nombre' =>$nombre,

        ];
        //execute
        $sentencia->execute($data);
        if ($sentencia->rowCount() <= 0) {

            return false;
        }
        return true;

    }
    public function insertar_pwtoken($pw, $tokensession)
    {
        $auth = $tokensession;
        $sql = "UPDATE `usuario` SET `password`=:pasword  WHERE `authtk`=:auth";


        $sentencia = $this->con->prepare($sql);


        $data = [
            'pasword' => $pw,
            'auth' => $auth,
            // 'nombre' =>$nombre,

        ];
        //execute
        $sentencia->execute($data);
        if ($sentencia->rowCount() <= 0) {

            return false;
        }
        return true;

    }
    public function deletetkn($tokensession)
    {
        $auth = $tokensession;
        $sql = "UPDATE `usuario` SET `authtk`=''  WHERE `authtk`=:auth";


        $sentencia = $this->con->prepare($sql);


        $data = [

            'auth' => $auth,
            // 'nombre' =>$nombre,

        ];
        //execute
        $sentencia->execute($data);
        if ($sentencia->rowCount() <= 0) {

            return false;
        }
        return true;
    }


    public function mostrarEditar($id)
    {
        $sql = "SELECT * FROM `registro_trabajo` INNER JOIN `usuario` ON `usuario_id`= `id-usuario` WHERE `id_registro_trabajo`= " . $id . "";
        $stmt = $this->con->prepare($sql);

        $stmt->execute();

        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultados;
    }
    public function selecbd()
    {
        $sql = "SELECT * FROM `profesion_user` ";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados_selec = $stmt->fetchAll();
        return $resultados_selec;
    }







    public function editarPublicacion($titulo, $detalle, $selechora, $tiempo, $precio, $vacante, $labor, $lugar, $longitud, $latitud, $idPos, $imgEditable)
    {

        /*$sql = "UPDATE `registro_trabajo` SET `titulo`=:titulo, `detalle`=:detalle,
        `cntd_tiempo`=:tiempo,`lbl_tiempo`=:selechora, `precio`=:precio, 
        `vacante`=:vacante, `lugar-trabajo`=:lugar, `labor_trabajo`=:labor, 
        `longitud`=:longitud, `latitud`=:latitud where `id_registro_trabajo`=:idPos";*/

        //$sql = "UPDATE `registro_trabajo` SET `titulo` = ':titulo', `detalle` = ':detalle', `cntd_tiempo` = ':tiempo', `lbl_tiempo` = ':selechora', `precio` = ':precio', `vacante` = ':vacante', `lugar-trabajo` = ':lugar', `labor_trabajo` = ':labor', `longitud` = ':longitud', `latitud` = ':latitud' WHERE `registro_trabajo`.`id_registro_trabajo` = :idPos";

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



}