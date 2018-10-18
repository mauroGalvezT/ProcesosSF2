<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Sistema escolar </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />
<link href="View/front/css/bootstrap.min.css" rel="stylesheet" />
<link href="View/front/plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />
<link href="View/front/css/cubeportfolio.min.css" rel="stylesheet" />
<link href="View/front/css/style.css" rel="stylesheet" />
<link id="t-colors" href="View/front/skins/default.css" rel="stylesheet" />
<link id="bodybg" href="View/front/bodybg/bg1.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<header>
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<ul class="topleft-info">
								<li><i class="fa fa-phone"></i>Colegio Castalia | (064) 221033</li>
							</ul>
						</div>
						<div class="col-md-6">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Buscar" type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search" title="Click to start searching"></span>
							</form>
						</div>


						</div>
					</div>
				</div>
			</div>

        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="View/front/index.html"><img src="View/front/img/castalia.png" alt="" width="100" height="52" /></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="dropdown active">

						   <li class="dropdown active">
							<a href="View/front/#" class="btn ubutia-btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Admin</a>
                           </li>


                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="featured" class="bg">
	<!-- start slider -->


	<!-- start slider -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
	<!-- Slider -->
        <div id="main-slider" class="main-slider flexslider">
            <ul class="slides">
              <li>
                <img src="View/front/img/slides/flexslider/1.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Administración de Calificaciones</h3>
					<p>los profesores pueden ingresar calificaciones y los alumnos consutar</p>

                </div>
              </li>
              <li>
                <img src="View/ront/img/slides/flexslider/2.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Adminstación de Colegiaturas</h3>
					<p>lleva el control de tus ingresos</p>

                </div>
              </li>
              <li>
                <img src="View/front/img/slides/flexslider/4.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Administración y control de asistencias de los alumnos</h3>
					<p>lleva el control de asistencia y mucho mas, el sistema se puede modificar a tu necesidad</p>

                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
			</div>
		</div>
	</div>


	</section>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Inicia Sesion Como Alumno</h4>
      </div>
      <div class="modal-body">
        <form action="LoginAlumno/login.php" method="POST">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Matricula:</label>
            <input type="password" class="form-control" name="usuario" required  >
          </div>
          <!--div class="form-group">
            <label for="message-text" class="control-label">Contraseña:</label>
             <input type="text" name="password" required class="form-control"  >
          </div-->
		    <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" name="validar" class="btn btn-primary">OK</button>
      </div>
        </form>
      </div>

    </div>
  </div>
</div>
	<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Inicia Sesion Como Profesor</h4>
      </div>
      <div class="modal-body">
        <form action="LoginProfesor/login.php" method="POST">
          <div class="form-group">
            <label for="recipient-name"  class="control-label">Cedula:</label>
            <input type="password" class="form-control" name="usuario" required   >
          </div>
          <!--div class="form-group">
            <label for="message-text" class="control-label">Contraseña:</label>
             <input type="text" name="password" required class="form-control"  >
          </div-->
		    <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" name="validar" class="btn btn-primary">OK</button>
      </div>
        </form>
      </div>

    </div>
  </div>
</div>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="exampleModalLabel">Inicia Sesión como Administrador</h4>
		  </div>
		  <div class="modal-body">
			<form action="Controller/Login/login.php" method="POST">
			  <div class="form-group">
				<label for="recipient-name" class="control-label">Usuario:</label>
				<input type="text" class="form-control" name="username" required  >
			  </div>
			  <div class="form-group">
				<label for="message-text" class="control-label">Contraseña:</label>
				<input type="password" class="form-control" name="password" required   >
			  </div>
				<div class="modal-footer">
				 <a href="Controller/formrecuperar.php">Recuperar Contraseña</a>
				 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				 <button type="submit" class="btn btn-primary">OK</button>
				</div>
			</form>
		  </div>

		</div>
	  </div>
</div>

	<footer>

	</footer>
</div>
<a href="View/front/#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Placed at the end of the document so the pages load faster -->
<script src="View/front/js/jquery.min.js"></script>
<script src="View/front/js/modernizr.custom.js"></script>
<script src="View/front/js/jquery.easing.1.3.js"></script>
<script src="View/front/js/bootstrap.min.js"></script>
<script src="View/front/plugins/flexslider/jquery.flexslider-min.js"></script>
<script src="View/front/plugins/flexslider/flexslider.config.js"></script>
<script src="View/front/js/jquery.appear.js"></script>
<script src="View/front/js/stellar.js"></script>
<script src="View/front/js/classie.js"></script>
<script src="View/front/js/uisearch.js"></script>
<script src="View/front/js/jquery.cubeportfolio.min.js"></script>
<script src="View/front/js/google-code-prettify/prettify.js"></script>
<script src="View/front/js/animate.js"></script>
<script src="View/front/js/custom.js"></script>


</body>
</html>
