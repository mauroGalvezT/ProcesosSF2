<?php
include_once '../../Model/Classe_colegiaturas.php';
$usu1 = new Classe();
 $alumnos_idalumnos = $_POST['alumnos_idalumnos'];
 $cantidad = $_POST['cantidad'];
 $fechadepago = $_POST['fechadepago'];
 $tipodepago = $_POST['tipodepago'];
 $semana = $_POST['semana'];
 $recibo = $_POST['recibo'];




if(isset($_POST['id'])){
    $id = $_POST['id'];
}else{
	$id= null;
}


$usu1->set_colegiaturas($id,$alumnos_idalumnos,$cantidad,$fechadepago,$tipodepago,$semana,$recibo);
$sql =$usu1->add_colegiaturas();
  echo'<script type="text/javascript">
			     alert("Pago Guardado con Exito!!!");
				 window.location.href="tablapagos.php";
				 </script>';
