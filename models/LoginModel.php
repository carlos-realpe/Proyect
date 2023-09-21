<?php
require_once 'config/Conexion.php';

class LoginModel
{

    private $con;

    public function __construct()
    { //cosntructor
        $this->con = Conexion::getConexion(); //operador :: llamando a un metodo estatico
    }



    public function consultaUser($email)
    {
        $sql = "select * from usuario where email=:email";
        // $sql = "select * from usuario where email=:email and password=:password";

        $stmt = $this->con->prepare($sql);

        $data = ['email' => $email];

        $stmt->execute($data);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() <= 0) { /// esta cprrectactamente
 
            return $resultado = null;
        }
        

        return $resultado;


    }








    public function consultatoken($token)
    {
        $sql = "select authtk from usuario where authtk=:auth";
       

        $stmt = $this->con->prepare($sql);

        $data = ['auth' => $token];

        $stmt->execute($data);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() <= 0) { 
            return $resultado = null;
        }


        return $resultado;


    }

    function ingresartoken($tk, $mail)
    {


        $sql = "UPDATE `usuario` SET `authtk`=:tk  WHERE `email`=:mail";


        $sentencia = $this->con->prepare($sql);


        $data = [
            'tk' => $tk,
            'mail' => $mail,

        ];
        //execute
        $sentencia->execute($data);
        if ($sentencia->rowCount() <= 0) {

            return false;
        }

        return true;


    }

    public function cerrarLogin()
    {
        unset($_SESSION['login']);

        setcookie("email", "", time() - (60 * 60), "/");
        setcookie("password", "", time() - (60 * 60), "/");
        session_destroy();
    }



    public function MiPorcentaje($MiId)
    {

        $sql = "SELECT TRUNCATE(((SUM(CalificacionPostulante)/COUNT(*))/0.05),0) AS Porcentaje from valoracion inner join usuario on `id-usuario` = UsuarioCalifica inner join usuario as us on us.`id-usuario` = UserCalificado where UserCalificado = :MiId and estado_valoracion=2";

        $stmt = $this->con->prepare($sql);

        $data = ['MiId' => $MiId];

        $stmt->execute($data);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() <= 0) {
            return $resultado = null;
        }


        return $resultado;

    }




}