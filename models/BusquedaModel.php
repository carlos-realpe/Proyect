<?php
require_once 'config/Conexion.php';

class BusquedaModel
{

    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }




    public function mostrarLista()
    {

        $sql = "SELECT id_registro_trabajo,foto_trabajo,titulo,detalle,`lugar-trabajo`,name_profesion_user FROM `registro_trabajo` INNER join profesion_user on labor_trabajo=id_profesion_user where estado_trabajo=0 AND vacante != 0;";

        $stmt = $this->con->prepare($sql);


        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;


    }

    /////------------------------------------------------

    public function buscarAjaxPubli($busqueda, $busquedaTipo)
    {

        if ($busquedaTipo == 0) {
          //  $sql = "SELECT id_registro_trabajo,foto_trabajo,titulo,detalle,`lugar-trabajo` as lugarT,name_profesion_user FROM registro_trabajo inner join profesion_user ON id_profesion_user=labor_trabajo where id_registro_trabajo = id_registro_trabajo and estado_trabajo=0 and 
          //  (titulo like :b1) or (`lugar-trabajo` like :b1)  or (`name_profesion_user` like :b1) ";
            $sql = "SELECT id_registro_trabajo,foto_trabajo,titulo,detalle,`lugar-trabajo` as lugarT,name_profesion_user FROM registro_trabajo inner join profesion_user ON id_profesion_user=labor_trabajo where id_registro_trabajo = id_registro_trabajo and estado_trabajo=0 and vacante !=0 and 
            ((titulo like :b1) or (`lugar-trabajo` like :b1)) ";
        } else {
            $sql = "SELECT id_registro_trabajo,foto_trabajo,titulo,detalle,`lugar-trabajo` as lugarT,name_profesion_user FROM registro_trabajo inner join profesion_user ON id_profesion_user=labor_trabajo where id_registro_trabajo = id_registro_trabajo and estado_trabajo=0 and vacante !=0  and 
            ((titulo like :b1) or (`lugar-trabajo` like :b1)) and id_profesion_user=:busquedaTipo";
        }
        // $sql = "SELECT * FROM registro_trabajo where id_registro_trabajo = id_registro_trabajo and 
        //   (titulo like :b1) or (`lugar-trabajo` like :b1) ";


        $stmt = $this->con->prepare($sql);

        $conlike = '%'.$busqueda.'%';
        $data = [
            "busquedaTipo" => $busquedaTipo,
            'b1' => $conlike,
        ];

        $stmt->execute($data);

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;



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

    public function HistorialVacantes()
    {

        $sql = "SELECT id_rating,telefono,email,foto_perfil,CONCAT(nombre, ' ', Apellido) AS Nombre,titulo,CalificacionPostulante FROM `valoracion` INNER join usuario on `id-usuario`=UserCalificado INNER JOIN registro_trabajo on id_registro_trabajo=id_reg_trabajo where  UsuarioCalifica = " . $_SESSION['id'] . " AND estado_valoracion = 2;";

        $stmt = $this->con->prepare($sql);


        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;

    }

    public function HistorialUser($id)
    {

        $sql = "SELECT titulo,id_rating,foto_perfil,CONCAT(nombre, ' ', Apellido) AS Nombre,CalificacionPostulante FROM `valoracion` INNER join usuario on `id-usuario`=UsuarioCalifica LEFT JOIN registro_trabajo on id_registro_trabajo=id_reg_trabajo where  UserCalificado = " . $id . " AND estado_valoracion = 2;";

        $stmt = $this->con->prepare($sql);


        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;

    }
}