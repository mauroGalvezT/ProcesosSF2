<?php
require_once 'conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;
	private $idalumnos;
    private $matricula;
	private $nombrealumno;
    private $fechanacimiento;
	private $telefonoa;
    private $direcciona;
	private $tutor;
    private $fecharegistro;
    private $documentos;
	private $estatus_idestatus;
    private $foto;
	private $emergencia;
    public function __construct()
    {
     $this->con = Conexion::singleton_conexion();
    }

    public function set_alum($id,$matricula,$nombre,$fechan,$telefono,$direccion,$tutor,$fecha,$documentos,$estatus,$foto,$emergencia){
    $this->idalumnos = $id;
	  $this->matricula = $matricula;
    $this->nombrealumno = $nombre;
	 $this->fechanacimiento = $fechan;
	 $this->telefonoa = $telefono;
	 $this->direcciona= $direccion;
	 $this->tutor= $tutor;
	 $this->fecharegistro= $fecha;
	 $this->documentos= $documentos;
	 $this->estatus_idestatus= $estatus;
	 $this->foto= $foto;
	 $this->emergencia = $emergencia;


    }


    public function get_alum($id = null)
    {
        try
        {
    $sql = "SELECT * FROM alumnos join estatus on estatus.idestatus=alumnos.estatus_idestatus where idestatus=1";

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
     public function get_formalum($id = null)
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
    public function add_alum(){
        try{
             if($this->idalumnos == null){

        $sql= "INSERT INTO alumnos VALUES(0,?,?,?,?,?,?,?,?,?,?,?)";

    }else{
        $sql = "UPDATE  alumnos"
		. " SET matricula = ?,"
    . " grado_idgrado = ?,"
		. " nombrealumno = ?,"
		. " fechanacimiento= ?,"
		. " telefonoa= ?,"
		. " direcciona= ?,"
		. " tutor= ?,"
		. " fecharegistro= ?,"
		. " documentos= ?,"
		. " estatus_idestatus= ?,"
		. " foto= ?,"
		. " emergencia= ?"
		." WHERE idalumnos =?";
    }

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1,$this->matricula);
            $consulta->bindparam(2,$this->nombrealumno);
			$consulta->bindparam(3,$this->fechanacimiento);
            $consulta->bindparam(4,$this->telefonoa);
			 $consulta->bindparam(5,$this->direcciona);
			  $consulta->bindparam(6,$this->tutor);
			   $consulta->bindparam(7,$this->fecharegistro);
			    $consulta->bindparam(8,$this->documentos);
				 $consulta->bindparam(9,$this->estatus_idestatus);
				 $consulta->bindparam(10,$this->foto);
				 	 $consulta->bindparam(11,$this->emergencia);


            if($this->idalumnos !=null){
                $consulta->bindparam(12, $this->idalumnos);
            }
            $consulta->execute();
			return $sql;
            $this->con = null;

        } catch (PDOEception $ex){
        print "Error:" . $e->getMessage();
        }
    }


	public function del_alum($id){
      try{
          $sql = "DELETE FROM alumnos WHERE idalumnos = ?";
          $consulta = $this->con->prepare($sql);
          $consulta->bindParam(1, $id);
          $consulta->execute();
          $this->con = null;
      } catch (PDOException $e) {
          print "Error: " . $e->getMessage();
      }
  }
 public function get_estatus()
    {
        try
        {
     $sql = "SELECT * FROM estatus";

        $consulta = $this->con->prepare($sql);

         $consulta->execute();

        if($consulta->rowCount() > 0){
         return $consulta;
        }else{
            return false;
        }//fin else
        }catch(PDOExeption $e){
            print "Error:" . $e->getmessage();
        }
  }
   public function get_grupo()
    {
        try
        {
     $sql = "SELECT * FROM grupos join tipodegrupo on tipodegrupo.idtipodegrupo=grupos.tipodegrupo_idtipodegrupo
	 join profesores_tiene_materias on profesores_tiene_materias.grupos_idgrupos=grupos.idgrupos
join materias on materias.idmaterias=profesores_tiene_materias.materias_idmaterias group by idgrupos";

        $consulta = $this->con->prepare($sql);

         $consulta->execute();

        if($consulta->rowCount() > 0){
         return $consulta;
        }else{
            return false;
        }//fin else
        }catch(PDOExeption $e){
            print "Error:" . $e->getmessage();
        }
  }

   public function get_periodos()
    {
        try
        {
     $sql = "SELECT * FROM periodosescolares where stus=1";

        $consulta = $this->con->prepare($sql);

         $consulta->execute();

        if($consulta->rowCount() > 0){
         return $consulta;
        }else{
            return false;
        }//fin else
        }catch(PDOExeption $e){
            print "Error:" . $e->getmessage();
        }
  }
   public function comprobar($matricula)

     {
     try{

     $sql = "SELECT * FROM  alumnos WHERE matricula= ?";

     $consulta = $this->con->prepare($sql);
	  $consulta->bindParam(1, $matricula);

     $consulta->execute();

//SI EXISTE EL USUARIO

if($consulta->rowCount() == 1){
return true;

      }else {
        return false;
      }
		}catch(PDOExeption $e){
			print "Error: " .$e->getMessage();
		}
	}
}//cierra clase
