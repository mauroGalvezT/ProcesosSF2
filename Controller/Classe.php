<?php
require_once '../Model/conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;



    public function __construct()
    {
     $this->con = Conexion::singleton_conexion();
    }



   public function get_constancia($correo)
    {
        try
        {
    $sql = "SELECT * FROM users where nombre like ? ";



        $consulta = $this->con->prepare($sql);


        $consulta->bindParam(1, $correo);


        $consulta->execute();
        $this->con = null;

        if($consulta->rowCount() > 0){
         return $consulta;
        }else{
            echo'<script type="text/javascript">
			     alert("En correo no existe en el sistema");
				 window.location.href="formrecuperar.php";
				 </script>';
        }//fin else
        }catch(PDOExeption $e){
            print "Error:" . $e->getmessage();
        }
  }




}//cierra clase
