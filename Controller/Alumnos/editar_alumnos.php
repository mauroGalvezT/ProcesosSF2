<?php
include_once 'Classe.php';
$usu1 = new Classe();


			
echo $matricula = $_POST['matricula'];
echo $nombre = $_POST['nombre'];
echo $fechan = $_POST['fechan'];
echo $telefono = $_POST['telefono'];
echo $direccion = $_POST['direccion'];
echo $tutor = $_POST['tutor'];
echo $fecha = $_POST['fecha'];
echo $documentos = $_POST['documentos'];
echo $estatus = $_POST['estatus'];
echo $archivo = $_POST['archivo'];
echo $emergencia = $_POST['emergencia'];

if(isset($_POST['id'])){
    $id = $_POST['id'];
}else{
	$id= null;
}
  

$usu1->set_alum($id,$matricula,$nombre,$fechan,$telefono,$direccion,$tutor,$fecha,$documentos,$estatus,$archivo,$emergencia);
$sql =$usu1->add_alum();
header("Location:tabla.php");


    
