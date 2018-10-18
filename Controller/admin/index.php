<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location: SistemaEscolar/index.php");
}


include_once '../../Model/Classe_admin.php';
$usu1 = new Classe();
$datos = $usu1->get_colegiaturas(null);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistema escolar</title>

<link href="../../View/css/bootstrap.min.css" rel="stylesheet">
<link href="../../View/css/datepicker3.css" rel="stylesheet">
<link href="../../View/css/bootstrap-table.css" rel="stylesheet">
<link href="../../View/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="../js/lumino.glyphs.js"></script>

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Sistema</span>escolar</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Usuario<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">

							<li><a href="../Controller/Login/logout.php"><svg class="glyph stroked cancel"<?php echo $_SESSION['login']; ?>><use xlink:href="#stroked-cancel"></use></svg>Cerrar Sesion</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Buscar">
			</div>
		</form>
	<?php


include_once '../menu/menu.php';
?>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Inicio</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bienvenido Administrador</h1>
			</div>
		</div><!--/.row-->

			<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Alumnos Deudores del mes de <b> <?php echo date('M-Y'); ?></b> </div>

					<div class="panel-body">
						<table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
							   <th >Ultimo Pago</th>
						        <th  >Matricula</th>
						        <th >Nombre</th>


								  <th></th>
						    </tr>
						    </thead>
							 <tbody>


           <?php

		     $mess= date('m');
			 $anioo= date('Y');
            while($fila = $datos->fetchObject()){
            ?>

<?php
$fecha = $fila->ultimo;
list($anio, $mes, $dia) = explode("-",$fecha);
if($mes<$mess){
?>                                      <tr>
                                        <td class='alert alert-danger' ><?php echo $fila->ultimo; ?></td>
                                        <td class='alert alert-danger' ><?php echo $fila->matricula; ?></td>
                                        <td class='alert alert-danger' ><?php echo $fila->nombrealumno; ?></td>
										<td><a href="../Colegiaturas/formpago.php?id=<?php echo $fila->idalumnos; ?> " class="btn btn-success btn-md"><i></i>Pagar</a></td>
                                        </tr>
                    <?php
                    }elseif($anioo>$anio){
					?>
					                    <tr>
                                        <td class='alert alert-danger' ><?php echo $fila->ultimo; ?></td>
                                        <td class='alert alert-danger' ><?php echo $fila->matricula; ?></td>
                                        <td class='alert alert-danger' ><?php echo $fila->nombrealumno; ?></td>
										<td><a href="../Colegiaturas/formpago.php?id=<?php echo $fila->idalumnos; ?> " class="btn btn-success btn-md"> <i></i>Pagar</a></td>
                                        </tr>

					<?php
					}
					}
                    ?>


         </tbody>

						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->



	</div>	<!--/.main-->

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
</body>

</html>
