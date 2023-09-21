<?php
require_once 'config/Conexion.php';

class PerfilModel {

private $con;

    public function __construct() { 
        $this->con = Conexion::getConexion(); 
    }



 
    public function mostrarPerfil(){
      
        $sql = "SELECT * FROM `usuario` WHERE `id-usuario`=".$_SESSION['id']."";
        $stmt = $this->con->prepare($sql);
        //bind parameters
   
        //ejecuto la sentencia
        $stmt->execute();
        // recupero resultados
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        // retorno resultados
        return $resultados;
            
            
        }

        public function mostrarselec(){
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

        public function editarPerfil($id,$nombre, $apellido,$telf,$lugar) {
         
            $sql = "UPDATE `usuario` SET `nombre`=:nombre,`Apellido`=:apellido,`telefono`=:telf,`lugar`=:lugar WHERE  `id-usuario`=:id";

      $sentencia = $this->con->prepare($sql);
            //bind parameters
            $data = [ 'nombre' => $nombre,
                'apellido' => $apellido,
                       'telf' => $telf,
                      'id' => $id,
                      'lugar' => $lugar,   
            ];
            //execute
            $sentencia->execute($data);
            //retornar resultados
            if ($sentencia->rowCount() <= 0) {// rowCount retorna el numero de filas afectadas
                // verificar si se inserto 
                return false;
            }
            return true;
        }


       public function editarFotoPerfil($id,$foto_perfil){
        $sql = "UPDATE `usuario` SET `foto_perfil`=:foto_perfil WHERE  `id-usuario`=:id";

        $sentencia = $this->con->prepare($sql);
              //bind parameters
              $data = [ 'foto_perfil' => $foto_perfil, 
                        'id' => $id,
              ];
              //execute
              $sentencia->execute($data);
              //retornar resultados
              if ($sentencia->rowCount() <= 0) {// rowCount retorna el numero de filas afectadas
                  // verificar si se inserto 
                  return false;
              }
              return true;
       }


////////////////////////////////////////////////////////////////////***************************************** */
       function ActualizarCv($id, $rutaCV){

        $sql = "UPDATE `usuario` SET `curriculum`=:rutaCV WHERE  `id-usuario`=:id";

        $sentencia = $this->con->prepare($sql);
        //bind parameters
        $data = [
              'id' => $id,
            'rutaCV' => $rutaCV,
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


}