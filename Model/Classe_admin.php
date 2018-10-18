<?php
require_once 'conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;



    public function __construct()
    {
     $this->con = Conexion::singleton_conexion();
    }




    public function get_colegiaturas($id = null)
    {
        try
        {
    $sql = " SELECT *, max(fechadepago) as ultimo FROM colegiaturas join alumnos on alumnos.idalumnos=colegiaturas.alumnos_idalumnos
       group by alumnos_idalumnos; ";

        if($id != null){
        $sql .= " WHERE idcolegiaturas =?";

        }
        $consulta = $this->con->prepare($sql);
        if($id != null){
        $consulta->bindParam(1,$id);
        }
    $consulta->execute();
        $this->con = null;

        if($consulta->rowCount() > 0){
         return $consulta;
        }else{
            return $consulta;
        }//fin else
        }catch(PDOExeption $e){
            print "Error:" . $e->getmessage();
        }
  }


}//cierra clase
