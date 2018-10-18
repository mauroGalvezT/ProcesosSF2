<?php
include_once 'Classe.php';
$usu1 = new Classe();

	if(isset($_POST['btnfiltrar'])){
			$correo=$_POST['correo'];

$datos=$usu1->get_constancia($correo);
}
while($fila = $datos->fetchObject()){
?>

<?php
$direccion=$fila->nombre;
$contrasena=$fila->password;

?>

<?php
     }
  ?>

<?php
$contenido="Usuario;".$direccion."\nContraseña:".$contrasena;
mail($direccion,"Recuperar contraseña",$contenido);

 echo'<script type="text/javascript">
			     alert("Correo Enviado con Exito");
				 window.location.href="index.php";
				 </script>';
  ?>
