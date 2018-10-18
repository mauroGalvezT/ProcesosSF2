<?php
include_once '../../Model/Classe_alumnos.php';
$usu1 = new Classe();

if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];

    $destino = "archivos/" . $nombre;
    if ($nombre != "") {
        if (copy($ruta, $destino)) {

 $matricula = $_POST['matricula'];
 $nombre = $_POST['nombre'];
 $fechan = $_POST['fechan'];
 $telefono = $_POST['telefono'];
 $direccion = $_POST['direccion'];
 $tutor = $_POST['tutor'];
 $fecha = $_POST['fecha'];
 $documentos = $_POST['documentos'];
 $estatus = $_POST['estatus'];
 $destino;
 $emergencia = $_POST['emergencia'];

$id= null;

$com= $usu1->comprobar($matricula);

if ($com == true) {


echo'<script type="text/javascript">
			     alert("Error ya Existe la Matricula");
				 setTimeout("window.history.go(-1)",100);
				 </script>';


}else{

$usu1->set_alum($id,$matricula,$nombre,$fechan,$telefono,$direccion,$tutor,$fecha,$documentos,$estatus,$destino,$emergencia);
$sql =$usu1->add_alum();
header("Location:tabla.php");
}

	   }else{
		    echo "error";
		   }
}
}
