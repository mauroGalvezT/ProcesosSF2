<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location:../admin/index.php");
}

include_once '../../Model/Classe_alumnos.php';
$usu1 = new Classe();
$datos = $usu1->get_alum(null);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Alumnos</title>

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

							<li><a href="../Login/logout.php"><svg class="glyph stroked cancel"<?php echo $_SESSION['login']; ?>><use xlink:href="#stroked-cancel"></use></svg>Cerrar Sesion</a></li>
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
				<li class="active">Alumnos</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<a type="button" href="form.php" class="btn btn-primary">Nuevo Registro</a>
			</div>
		</div><!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Alumnos Registrados</div>
					<div class="panel-body">
						<table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
							    <th></th>
						        <th  >Matricula</th>
						        <th >Nombre</th>
						        <th >Fecha/Nacimiento</th>
						        <th >Telefono</th>
								<th >Tel: Emergencia</th>
								 <th>Direccion</th>
								  <th>Tutor</th>
								  <th >Registrado el:</th>
								  <th >Documentos:</th>
								  <th>Estatus</th>

						          <th></th>

						    </tr>
						    </thead>
							 <tbody>

                 <?php
                     while($fila = $datos->fetchObject()){
                     ?>
                                             <tr>
         									 <td> <img width="120" height="120" src="<?php echo $fila->foto; ?>"></td>
                                                 <td><img src="../barcodegen/test_1D.php?cod=<?php echo $fila->matricula; ?>"></td>
                                                 <td><?php echo $fila->nombrealumno; ?></td>
         										<td><?php echo $fila->fechanacimiento; ?></td>
                                                 <td><?php echo $fila->telefonoa; ?></td>
         										   <td><?php echo $fila->emergencia; ?></td>
         										 <td><?php echo $fila->direcciona; ?></td>
         										  <td><?php echo $fila->tutor; ?></td>
         										   <td><?php echo $fila->fecharegistro; ?></td>
         										    <td><?php echo $fila->documentos; ?></td>
         											  <td><?php echo $fila->estatuscol; ?></td>
         									  	<!--<td><a href="formeditar.php?id=<?php echo $fila->idalumnos; ?> " class="btn btn-info btn-xs"> <i class="fa fa-pencil"></i>Editar</a></td>
                                <td><a href="borrar.php?id=<?php echo $fila->idalumnos; ?>" class="btn btn-danger btn-xs ask" ><i class="fa fa-trash-o"></i>Borrar</a></td>--!>                                

                                             </tr>
                                     <?php
                             }
                           ?>


         </tbody>

		</table>

		<form action="h.php"method="post">

		<div class="col-sm-5 btn-group" data-toggle="buttons">
        <label class="btn btn-info">
            <input checked="checked" name="media_release" value="1" type="radio"> Yes
        </label>
        <label class="btn btn-info btn_red">
            <input name="media_release" value="0" type="radio"> No
        </label>
        </div>

		<form>
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
