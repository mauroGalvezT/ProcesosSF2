<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location:../../index.php");
}

include_once '../../Model/Classe_colegiaturas.php';
$usu1 = new Classe();
$datos = $usu1->get_colegiaturas(null);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Colegituras</title>

<link href="../../View/css/bootstrap.min.css" rel="stylesheet">
<link href="../../View/css/datepicker3.css" rel="stylesheet">
<link href="../../View/css/bootstrap-table.css" rel="stylesheet">
<link href="../../View/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="../js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

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
				<a class="navbar-brand" href="../admin/index.php"><span>Sistema</span>escolar</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Usuario<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">

							<li><a href="../../Login/logout.php"><svg class="glyph stroked cancel"<?php echo $_SESSION['login']; ?>><use xlink:href="#stroked-cancel"></use></svg>Cerrar Sesion</a></li>
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
				<li class="active">Listado de Pagos</li>
			</ol>
		</div><!--/.row-->

		<!--/.Formulario de Busqueda----------------------------------------------------------------------------------------------------->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Pagos Registrados</div>

					<div class="panel-body">
						<table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th  >Matricula</th>
						        <th >Nombre</th>
						        <th >Cantidad</th>
						        <th >Fecha de Pago</th>
								 <th>Tipo de Pago</th>
								 <th>No. Recibo</th>
								 <th></th>
								  <th></th>
						    </tr>
						    </thead>
							 <tbody>


           <?php
		   $item=0;
            while($fila = $datos->fetchObject()){

			 $item = $item+$fila->cantidad;
            ?>
                                    <tr>
                                        <td><?php echo $fila->matricula; ?></td>
                                        <td><?php echo $fila->nombrealumno; ?></td>
										<td><?php echo $fila->cantidad; ?></td>
                                        <td><?php echo $fila->fechadepago; ?></td>
										 <td><?php echo $fila->tipodepago; ?></td>
										 <td><?php echo $fila->recibo; ?></td>
										<td><a href="form.php?id=<?php echo $fila->idcolegiaturas; ?> " class="btn btn-info btn-xs"> <i class="fa fa-pencil"></i>Editar</a></td>
		                                <td><a href="borrar.php?id=<?php echo $fila->idcolegiaturas; ?>" class="btn btn-danger btn-xs ask" ><i class="fa fa-trash-o"></i>Borrar</a></td>


                                    </tr>
                            <?php
                    }
                  ?>


         </tbody>

						</table>
						<div>
						<b> Ingreso Total: <?php echo $item; ?></b>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->



	</div><!--/.main-->

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
