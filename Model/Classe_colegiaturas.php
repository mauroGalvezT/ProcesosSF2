<?php
require_once 'conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;
	private $idcolegiaturas;
	private $alumnos_idalumnos;
    private $cantidad;
	private $fechadepago;
    private $tipodepago;
	private $semana;
	private $recibo;


    public function __construct()
    {
     $this->con = Conexion::singleton_conexion();
    }

    public function set_colegiaturas($id,$alumnos_idalumnos,$cantidad,$fechadepago,$tipodepago,$semana,$recibo){
    $this->idcolegiaturas = $id;
	$this->alumnos_idalumnos = $alumnos_idalumnos;
	$this->cantidad = $cantidad;
    $this->fechadepago = $fechadepago;
	$this->tipodepago = $tipodepago;
	$this->semana = $semana;
	$this->recibo = $recibo;



    }
     public function get_alum($id = null)
    {
        try
        {
    $sql = "SELECT * FROM alumnos join estatus on estatus.idestatus=alumnos.estatus_idestatus";
        if($id != null){
        $sql .= " WHERE idalumnos =?";

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


    public function get_colegiaturas($id = null)
    {
        try
        {
    $sql = "SELECT * FROM colegiaturas join alumnos on alumnos.idalumnos=colegiaturas.alumnos_idalumnos";

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

    public function add_colegiaturas(){
        try{
             if($this->idcolegiaturas == null){

        $sql= "INSERT INTO colegiaturas VALUES(0,?,?,?,?,?,?)";

    }else{
        $sql = "UPDATE colegiaturas "
		. " SET alumnos_idalumnos = ?,"
		. " cantidad = ?,"
		. " fechadepago= ?,"
		. " tipodepago= ?,"
		. " semana= ?,"
		. " recibo= ?"

		." WHERE idcolegiaturas =?";
    }

            $consulta = $this->con->prepare($sql);
			$consulta->bindparam(1,$this->alumnos_idalumnos);
            $consulta->bindparam(2,$this->cantidad);
            $consulta->bindparam(3,$this->fechadepago);
			$consulta->bindparam(4,$this->tipodepago);
			$consulta->bindparam(5,$this->semana);
			$consulta->bindparam(6,$this->recibo);


            if($this->idcolegiaturas !=null){
			$consulta->bindparam(7, $this->idcolegiaturas);
            }
            $consulta->execute();
			return $sql;
            $this->con = null;

        } catch (PDOEception $ex){
        print "Error:" . $e->getMessage();
        }
    }


	public function del_colegiaturas($id){
      try{
          $sql = "DELETE FROM colegiaturas WHERE idcolegiaturas = ?";
          $consulta = $this->con->prepare($sql);
          $consulta->bindParam(1, $id);
          $consulta->execute();
          $this->con = null;
      } catch (PDOException $e) {
          print "Error: " . $e->getMessage();
      }
  }

   public function get_matricula($filtro)
    {
        try
        {
    $sql = "select * from alumnos where matricula like ?";

        $consulta = $this->con->prepare($sql);


        $consulta->bindParam(1, $filtro);


        $consulta->execute();
        $this->con = null;

        if($consulta->rowCount() > 0){
         return $consulta;
        }else{
            echo'<script type="text/javascript">
			     alert("no existe matricula");
				 window.location.href="tabla.php";
				 </script>';
        }//fin else
        }catch(PDOExeption $e){
            print "Error:" . $e->getmessage();
        }
  }
   public function get_cole($desde,$hasta,$tipodepago)
    {
        try
        {
    $sql = "SELECT * FROM colegiaturas join alumnos on alumnos.idalumnos=colegiaturas.alumnos_idalumnos WHERE tipodepago like ? and fechadepago BETWEEN ? AND ?";



        $consulta = $this->con->prepare($sql);

        $consulta->bindParam(1, $tipodepago);
        $consulta->bindParam(2, $desde);
        $consulta->bindParam(3, $hasta);

        $consulta->execute();
        $this->con = null;

        if($consulta->rowCount() > 0){
         return $consulta;
        }else{
            echo'<script type="text/javascript">
			     alert("No hay datos");
				 window.location.href="fecha.php";
				 </script>';
        }//fin else
        }catch(PDOExeption $e){
            print "Error:" . $e->getmessage();
        }
  }
}//cierra clase
