<?php
include_once '../../Model/Classe_colegiaturas.php';
$usu1 = new Classe();
if(isset($_POST['btnfiltrar'])){
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$tipodepago = $_POST['tipodepago'];
$item = 0;
$totaluni = 0;

if(isset($desde)==false){
	        $desde = $hasta;
            }
if(isset($hasta)==false){
	        $hasta = $desde;
            }



$datos=$usu1->get_cole($desde,$hasta,$tipodepago);
}else{
				header("Location: tabla.php");
			}

?>



<HTML>
<HEAD>
<SCRIPT language="javascript">
function imprimir()
{ if ((navigator.appName == "Netscape")) { window.print() ;
}
else
{ var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); WebBrowser1.ExecWB(6, -1); WebBrowser1.outerHTML = "";
}
}
</SCRIPT>
</HEAD>
<BODY  onload="imprimir();" >
<table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 75%;">
            </td>
            <td style="width: 25%; color: #444444;">


            </td>
        </tr>
    </table>

    <br>
   <h1>Reporte Colegiaturas</h1>
    <br>

 <table cellspacing="0" style="width: 100%; text-align: left;font-size: 10pt">
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%; ">Reporte  Generado en <?php  echo "Fecha ". date('d/m/Y'); ?></td>
        </tr>
    </table>
 <br>
<table border="1" cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
<tr>
                                                 <th style="width: 12%">Matricula</th>
												<th  style="width: 12%">Nombre Completo</th>

                                                <th style="width: 5%">cantidad</th>

												<th style="width: 12%">Fecha de Pago</th>

												<th style="width: 12%">Descripcion de Pago</th>
												<th style="width: 12%">Semana Pagada</th>

</tr>

<?php

while($fila = $datos->fetchObject()){
		$item = $item+1;
	    $totaluni = $totaluni + $fila->cantidad;
 ?>
          <tr>
          <td><?php echo $fila->matricula;?></td>
		  <td><?php echo $fila->nombrealumno;?></td>
		  <td>$<?php echo $fila->cantidad;?></td>
		  <td><?php echo $fila->fechadepago;?></td>
          <td><?php echo $fila->tipodepago;?></td>
		  <td><?php echo $fila->semana;?></td>


		  </tr>
<?php
}
?>
  <tr>
			 <th  colspan="8" align="right">------------------------</th>
			 </tr>
			 <tr>
			 <th  colspan="8" align="right">Cantidad Total</th>
			 </tr>
			 <tr>
			 <td colspan="8" align="right">$<?php  echo $totaluni;?> </td>
			</tr>


         </table>
 <br>
    	<br>Este reporte incluye los pagos efectuados entre las fechas que selecciono<br>
          <table align="center">
		 <tr>
		 <th>Del</th><td><?php echo $desde;?></td>
		 <th>-------------------------------</th><td></td>
		 <th>Al</th><td><?php echo $hasta;?></td>
		 </tr>

		 </table>
</BODY >
</HTML>
