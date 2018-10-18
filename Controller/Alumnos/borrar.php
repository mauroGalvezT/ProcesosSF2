<?php
$id = $_GET['id'];
echo $id;
include_once '../../Model/Classe_alumnos.php';
$usu1 = new Classe();

$usu1->del_alum($id);

header("Location:tabla.php");
