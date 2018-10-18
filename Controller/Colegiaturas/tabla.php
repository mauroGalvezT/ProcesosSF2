<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location:../../index.php");
}

include_once '../../Model/Classe_colegiaturas.php';
$usu1 = new Classe();
$datos = $usu1->get_alum(null);
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
 <link href="../lib/jquery-ui.css" rel="stylesheet">
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
				<a class="navbar-brand" href="../Admin/index.php"><span>Sistema</span>escolar</a>
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
				<li class="active">Pago de Colegiaturas</li>
			</ol>
		</div><!--/.row-->

	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">

					<div class="panel-heading"></div>

					<div class="panel-body">

						<div class="col-md-6">

		<!--/.Formulario de Busqueda----------------------------------------------------------------------------------------------------->
		<form role="form" action="tabla.php" method="POST">
				<div class="form-group">
				 <div class="form-line">
				<label>Ingresa la Matricula</label>
			<input class="form-control" required name="matricula" placeholder="Matricula">
					 </div >
			</div>
			 <div class="form-line">
			<button type="submit" name="btnfiltrar" class="btn btn-primary">Buscar</button>
			</div >
		</form >
		</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->



		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading" align="right">
					<a href="tablapagos.php"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg>Todos los Pagos</a>
					<a href="tabladeudores.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></svg><font color="red">Deudores</font></a>
					<button class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"/></svg>Generar Reporte</button>

					</div>

					<div class="panel-body">
						<table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th  >Matricula</th>
						        <th >Nombre</th>
						        <th >Fecha/Nacimiento</th>
						        <th >Telefono</th>
								 <th>Direccion</th>

								  <th></th>

						    </tr>
						    </thead>
							 <tbody>
<?php
include_once '../../Model/Classe_colegiaturas.php';
$usu1 = new Classe();

	if(isset($_POST['btnfiltrar'])){
			$filtro=$_POST['matricula'];

$datos=$usu1->get_matricula($filtro);
}

?>

        <?php
            while($fila = $datos->fetchObject()){
            ?>
                                    <tr>
                                        <td><?php echo $fila->matricula; ?></td>
                                        <td><?php echo $fila->nombrealumno; ?></td>
										<td><?php echo $fila->fechanacimiento; ?></td>
                                        <td><?php echo $fila->telefonoa; ?></td>
										 <td><?php echo $fila->direcciona; ?></td>
										 <td><a href="formpago.php?id=<?php echo $fila->idalumnos; ?> " class="btn btn-success btn-md"> <i ></i>Pagar</a></td>


                                    </tr>
                            <?php
                    }
                  ?>


         </tbody>

						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->

							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Selecciona las Fechas</h4>
      </div>
      <div class="modal-body">
        <form action="fecha.php" method="POST">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Fecha de:</label>
            <input type="text" id="reuno" name="desde" required class="form-control"  >
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Fecha hasta:</label>
             <input type="text" id="redos"  name="hasta" required class="form-control"  >
          </div>
		                      <div class="form-group">
									<label>Tipo de Pago</label>
									<select  name="tipodepago" class="form-control" required>
									<option value=""></option>
                                       <option value="Inscripcion" >Inscripcion</option>
	                                   <option value="Fiscal" > Colegiatura Fiscal</option>
									   <option value="No Fiscal" > Colegiatura No Fiscal</option>
                                	</select>
								</div>
		    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" name="btnfiltrar" class="btn btn-primary">OK</button>
      </div>
        </form>
      </div>

    </div>
  </div>
</div>

	</div><!--/.main-->
  <script src="../lib/external/jquery/jquery.js"></script>
  <script src="../lib/jquery-ui.js"></script>
<script>


$( "#reuno" ).datepicker({

	dateFormat:'yy-mm-dd',

});

$( "#redos" ).datepicker({

	dateFormat:'yy-mm-dd',

});

</script>
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
