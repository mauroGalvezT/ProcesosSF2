<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location:../../index.php");
}

include_once '../../Model/conexion/Conexion.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include_once '../../Model/Classe_colegiaturas.php';
        $usu1 = new Classe();
        $datos = $usu1->get_colegiaturas($id);
        $fila = $datos->fetchObject();
    }

	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Editar Pago</title>

<link href="../../View/css/bootstrap.min.css" rel="stylesheet">
<link href="../../View//css/datepicker3.css" rel="stylesheet">
<link href="../../View/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="../js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="../js/html5shiv.js"></script>
<script src="../js/respond.min.js"></script>
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
				<a class="navbar-brand" href="#"><span>Sistema</span>escolar</a>
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
				<li class="active">Editar Pago</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Editar Pago</h1>
			</div>
		</div><!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="POST" action="agregar.php"	>
                                <?php if(isset($id)){ echo "<input type='hidden' value='$fila->idcolegiaturas' name='id'>"; }?>
								<div class="form-group">
									<label>Matricula</label>
									<input type="text"  class="form-control" readonly="readonly" value="<?php  if(isset($id)){echo  $fila->matricula;} ?>">
								</div>

								<div class="form-group">
									<label>Nombre Completo</label>
									<input type="Text"  class="form-control" readonly="readonly" value="<?php  if(isset($id)){echo  $fila->nombrealumno;} ?>">
								</div>
								<input type='hidden'name="alumnos_idalumnos"  class="form-control" required value="<?php  if(isset($id)){echo  $fila->idalumnos;} ?>">
								<div class="form-group">
									<label>Cantidad</label>
									<input type="Text"  class="form-control" name="cantidad"  value="<?php  if(isset($id)){echo  $fila->cantidad;} ?>">
								</div>

								<div class="form-group">
									<label>Fecha de Pago</label>
									<input type="date" placeholder="$"  class="form-control" name="fechadepago"  value="<?php  if(isset($id)){echo  $fila->fechadepago;} ?>">
								</div>

								<div class="form-group">
									<label>Tipo de Pago</label>
									<select  name="tipodepago" class="form-control" required>
									<option value=""></option>
									<?php if(isset($id)){ echo $fila->tipodepago;
									 }

									  if($fila->tipodepago=="Inscripcion"){
                                       echo'<option value="Inscripcion" selected >Inscripcion</option>';
									   echo'<option value="Fiscal"> Colegiatura Fiscal</option>';
									   echo'<option value="No Fiscal" > Colegiatura No Fiscal</option>';
									   }
									   if($fila->tipodepago=="Fiscal"){
									   echo'<option value="Inscripcion"  >Inscripcion</option>';
                                       echo'<option value="Fiscal" selected > Colegiatura Fiscal</option>';
									   echo'<option value="No Fiscal" > Colegiatura No Fiscal</option>';
									   }
									     if($fila->tipodepago=="No Fiscal"){
									   echo'<option value="Inscripcion"  >Inscripcion</option>';
                                       echo'<option value="Fiscal"  > Colegiatura Fiscal</option>';
                                       echo'<option value="No Fiscal" selected> Colegiatura No Fiscal</option>';
									   }

									  ?>
                                	</select>
								</div>

										<div class="form-group">
									<label></label>
									<input type="hidden"  class="form-control" readonly="readonly" name="semana"  value="<?php  if(isset($id)){echo  $fila->semana;} ?>" >
								</div>
								<div class="form-group">
									<label>No.Recibo</label>
									<input type="number"   class="form-control" name="recibo"  value="<?php  if(isset($id)){echo  $fila->recibo;} ?>" >
								</div>

								<button type="submit" class="btn btn-primary">Guardar</button>

							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->

	</div><!--/.main-->

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
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
