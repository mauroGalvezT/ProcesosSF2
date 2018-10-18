<?php
$id = $_GET['id'];
echo $id;
include_once '../../Model/Classe_colegiaturas.php';
$usu1 = new Classe();

$usu1->del_colegiaturas($id);

header("Location:tablapagos.php");
