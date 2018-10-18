<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location:../../index.php");
}

include_once '../conexion/Conexion.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include_once 'Classe.php';
        $usu1 = new Classe();
        $datos = $usu1->get_formalum($id);
        $fila = $datos->fetchObject();
    }
		include_once 'Classe.php';
	
	
	$estatus = new Classe();
	$filas = $estatus->get_estatus();
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nuevo</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">

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
				<a class="navbar-brand" href="../index.php"><span>Sistema</span>escolar</a>
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
				<li class="active">Nuevo</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Nuevo Alumno</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="POST" action="editar.php" enctype="multipart/form-data">	
                               <?php if(isset($id)){ echo "<input type='hidden' value='$fila->idalumnos' name='id'>"; }?>							
								<div class="form-group">
									<label>Fotografia</label>
									<input type="text" name="archivo" class="form-control" readonly="readonly"  value="<?php  if(isset($id)){echo  "$fila->foto";} ?>" >
								</div>
								<div class="form-group">
									<label>Matricula</label>
									<input type="text" name="matricula" class="form-control" required value="<?php  if(isset($id)){echo  $fila->matricula;} ?>">
								</div>
																
								<div class="form-group">
									<label>Nombre Completo</label>
									<input type="Text" name="nombre" class="form-control" required value="<?php  if(isset($id)){echo  $fila->nombrealumno;} ?>">
								</div>
								
								<div class="form-group">
									<label>Fecha de Nacimiento</label>
									<input type="date" name="fechan" class="form-control" required value="<?php  if(isset($id)){echo  $fila->fechanacimiento;} ?>">
								</div>
								<div class="form-group">
									<label>Telefono</label>
									<input type="Text" name="telefono" class="form-control" required value="<?php  if(isset($id)){echo  $fila->telefonoa;} ?>">
								</div>
									<div class="form-group">
									<label>Tel de Emergencia</label>
									<input type="Text" name="emergencia" class="form-control" required value="<?php  if(isset($id)){echo  $fila->emergencia;} ?>">
								</div>
								<div class="form-group">
									<label>Direccion</label>
									<input type="Text" name="direccion" class="form-control" required value="<?php  if(isset($id)){echo  $fila->direcciona;} ?>">
								</div>
								<div class="form-group">
									<label>Tutor</label>
									<input type="Text" name="tutor" class="form-control" required value="<?php  if(isset($id)){echo  $fila->tutor;} ?>">
								</div>
								<div class="form-group">
									<label>Fecha de Registro</label>
									<input type="date" name="fecha" class="form-control" required value="<?php  if(isset($id)){echo  $fila->fecharegistro;} ?>">
								</div>
								<div class="form-group">
									<label>Documentos que entrega</label>
									<input type="Text" name="documentos" class="form-control" required value="<?php  if(isset($id)){echo  $fila->documentos;} ?>">
								</div>
								
								<div class="form-group">
									<label>Estatus</label>
									<select  name="estatus" required class="form-control">
										  <option value="" ></option>
                                       	<?php while($data=$filas->fetchObject()){ ?>
		                                 
		
	                                   <option value="<?php echo $data->idestatus; ?>" <?php if(isset($id)){if ($fila->estatus_idestatus == $data->idestatus){?>selected<?php }} ?>><?php echo $data->estatuscol; ?></option>
                                         <?php } ?>
									</select>
								</div>
								
														
								<button type="submit" value="subir" name="subir" class="btn btn-primary">Guardar</button>
								
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
