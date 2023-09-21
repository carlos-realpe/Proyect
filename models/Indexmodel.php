
<?php
require_once 'config/Conexion.php';
class indexmodel{
    private $con;
    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }
    public function mostrar_resul_pgp(){
    
        $sql = "SELECT * FROM `profesion_user`";

        $stmt = $this->con->prepare($sql);
    
     
        $stmt->execute();
      
        $resul_pgp = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resul_pgp;
    
    }

}