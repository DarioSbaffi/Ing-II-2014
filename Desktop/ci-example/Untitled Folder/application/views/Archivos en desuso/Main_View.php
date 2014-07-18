<DOCTYPE html>
<html lang="es">
<head>
	<title>CookBook's Online</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrapCustom.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/signin.css">
	<script src="<?=base_url()?>css/jquery-1.11.1.min.js"></script>
	<script src="<?=base_url()?>css/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=site_url('assets/js/agregar-carrito.js')?>"></script>
</head>
<body>
	
	<div class="container">	
		<div id="header" name="header">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-ex1-collapse" style="display: none">
						<span class="sr-only">Desplegar navegacion</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">CookBook's</a>
				</div>

			  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
			       otro elemento que se pueda ocultar al minimizar la barra -->
			  	<div class="collapse navbar-collapse navbar-ex1-collapse">
				    <ul class="nav navbar-nav">
					    <li class="active"><a href="<?=base_url()?>">Inicio</a></li>
				    	<li><a href="#">Catalogo</a></li>
				      	<li><a href="#">Preguntas Frecuentes</a></li>
				      	<li><a href="#">Ayuda</a></li>		    	  		
<!--			            <li class="dropdown">
			                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
			                <ul class="dropdown-menu">
			            	    <li><a href="#">Action</a></li>
			        	        <li><a href="#">Another action</a></li>
			    	            <li><a href="#">Something else here</a></li>
				                <li class="divider"></li>
			                	<li class="dropdown-header">Nav header</li>
			                	<li><a href="#">Separated link</a></li>
			                	<li><a href="#">One more separated link</a></li>
			                </ul>
              			</li>
-->              		</ul>
					
					
						
              		<ul class="nav navbar-nav navbar-right"> 

						<li class="dropdown">
              		
            			<button class="btn btn-primary dropdown-toggle botonesMargin" data-toggle="dropdown" id="botonIngreso" onclick="window.location='<?=base_url()?>registro'">Registrarse</button>

						</li>	
						
						<li class="dropdown">
              				<button class="btn btn-primary dropdown-toggle botonesMargin" data-toggle="dropdown" id="botonIngreso">Ingresar</button>
              				<ul class="dropdown-menu">
              					<li>
              					   <form class="form-signin" role="form" id="menuIngreso" action="<?=base_url()?>home/new_user" method="post">
    								    <h2 class="form-signin-heading">Por favor, Ingrese su correo y contrase&ntilde;a</h2>
      									<input type="text" name="username" class="form-control" placeholder="Nombre de Usuario" required autofocus>
    									<input type="password" name="password" class="form-control" placeholder="Contrase&ntilde;a" required>
        								<label class="checkbox">
       										<input type="checkbox" value="remember-me"> Recordarme
								        </label>
								        <?=form_hidden('token',$token)?>
        								<button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      								</form>
              					</li>
              				</ul>
              			</li>
              			<li class="dropdown">
              				<button class="btn btn-primary dropdown-toggle botonesMargin" data-toggle="dropdown" id="botonIngreso">Carro</button>
              				<ul class="dropdown-menu">
              					<li>

              						<!-- Reemplazar con consultas a la base de datos para realizar la carga de los elementos en la tabla-->              						
              						<h4>* * * ESTE CONTENIDO SERA REEMPLAZADO CON CONSULTAS * * *</h4>
          							<table class="table striped-table table-hover" id="carroTabla">
              							<tr>
  											<td><strong>#</strong></td>
											<td><strong>Titulo</strong></td>
  											<td><strong>Autor</strong></td>
  											<td><strong>Editorial</strong></td>
  											<td><strong>Precio</strong></td>
										</tr>
										<tr>
											<td>1</td>
											<td>Hoy yo cocino</td>
											<td>Fulano</td>
											<td>Everest</td>
											<td>80</td>
										</tr>
										<tr>
											<td>2</td>
											<td>Cocina vegetariana</td>
											<td>Mengano</td>
											<td>Oceano</td>
											<td>120</td>
										</tr>
              						</table>
              						<button class="btn btn-Default botonesMargin">Vaciar carro</button>
              						<button class="btn btn-primary">Comprar</button>
              					</li>
              				</ul>
              			</li>           			
				    </ul>
				</div>
			</nav>
		</div>

		<!-- Seccion principal de la pagina. Por ahora solo estan incluidas las novedades -->
		<div id="main">
			<div class="jumbotron">
			  <div class="container">
					
					<div class="row">
						<div class="col-md-4">
							<h1>Novedades</h1>
						</div>
						<form method="post" action="<?=base_url()?>buscador_simple" role="form">
						<div class="col-md-2 margen-buscador">
			    			<div class="form-group" id="divBuscador">
			    				<input type="text" name="descripcion" id="descripcion" class="form-control input-size" placeholder="Ingrese busqueda...">	
			    				<a href="<?=base_url()?>buscador">Busqueda avanzada</a>
			    			</div>
						</div>
						<div class="col-md-2 margen-buscador">		    				
								<button type="submit" name="buscar" id="buscar" class="btn btn-primary">Buscar</button>
						</div>
						</form>
						<div class="col-md-3 col-md-offset-1">
							<a href="#" class="thumbnail">
					    		<img id="logo" class="auto-size" src="<?=base_url()?>css/img/logo.jpg">
							</a>
						</div>

					</div>
					
					<form method="post" action="<?=base_url()?>home/suscripcion" role="form">
						<fieldset>
						<!-- Sección de datos de cuenta -->
						<div class="form-group <?if(form_error('reg_email')) echo'has-error'?>">
							<input name="reg_email" type="email" id="reg_email" placeholder="Ingrese su mail" class="form-control">
							<?=form_error('reg_email','<div class="alert alert-danger">','</div>')?>	
						</div>
						</fieldset>
						<button type="Submit" name="submit" id="submit">Suscribirse</button>
						<button type="Reset">Resetear Datos</button>
						<button type="Cancel" name="cancel" id="cancel">Cancelar Suscripcion</button>
					</form>
			 
			    <div class="row">
			    	<div class="col-md-3">
			    		<a href="" class="thumbnail">
			    			<img src="<?=base_url()?>css/img/cocina1.jpg">
			    		</a>
			    		<div class="caption">
			    			<h3>Hoy yo cocino</h3>
			    			<p class="descrip">Mas de 400 recetas para cocinar AHORRANDO.</p>
			    			<p>
			    				<a href="#" class="btn btn-default" role="button">Agregar al carro</a>
			    				<a href="#" class="btn btn-primary" role="button">+Info</a>
			    			</p>
			    		</div>
			    	</div>
			    	<div class="col-md-3">
			    		<a href="" class="thumbnail">
			    			<img src="<?=base_url()?>css/img/cocina2.jpg">
			    		</a>
			    		<div class="caption">
			    			<h4>Cocina vegetariana</h4>
			    			<p class="descrip">Guia completa de alimentacion, ingredientes y recetas naturales.</p>
			    			<p>
			    				<a href="#" class="btn btn-default" role="button">Agregar al carro</a>
			    				<a href="#" class="btn btn-primary" role="button">+Info</a>
			    			</p>
			    		</div>
			    	</div>
			    	<div class="col-md-3">
			    		<a href="" class="thumbnail">
			    			<img src="<?=base_url()?>css/img/cocina3.jpg">
			    		</a>
			    		<div class="caption">
			    			<h4>Comer bien a diario</h4>
			    			<p class="descrip">Recetas faciles para una dieta sana y variada.</p>
			    			<p>
			    				<a href="#" class="btn btn-default" role="button">Agregar al carro</a>
			    				<a href="#" class="btn btn-primary" role="button">+Info</a>
			    			</p>
			    		</div>
			    	</div>
			    	<div class="col-md-3">
			    		<a href="" class="thumbnail">
			    			<img src="<?=base_url()?>css/img/cocina4.jpg">
			    		</a>
			    		<div class="caption">
			    			<h4>Tecnicas de cocina para convertirse en un gran chef</h4>
			    			<p class="descrip">Con mas de 800 sencillos paso a paso.</p>
			    			<p>
			    				<a href="#" class="btn btn-default" role="button">Agregar al carro</a>
			    				<a href="#" class="btn btn-primary" role="button">+Info</a>
			    			</p>
			    		</div>
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-3">
			    		<a href="" class="thumbnail">
			    			<img src="<?=base_url()?>css/img/cocina5.jpg">
			    		</a>
			    		<div class="caption">
			    			<h4>Cocina mexicana</h4>
			    			<p class="descrip">Practico recetario con miles de convinaciones.</p>
			    			<p>
			    				<a href="#" class="btn btn-default" role="button">Agregar al carro</a>
			    				<a href="#" class="btn btn-primary" role="button">+Info</a>
			    			</p>
			    		</div>
			    	</div>
			    	<div class="col-md-3">
			    		<a href="" class="thumbnail">
			    			<img src="<?=base_url()?>css/img/cocina6.jpg">
			    		</a>
			    		<div class="caption">
			    			<h4>Escuela de cocina</h4>
			    			<p class="descrip">Aprende a cocinar en 24 horas.</p>
			    			<p>
			    				<a href="#" class="btn btn-default" role="button">Agregar al carro</a>
			    				<a href="#" class="btn btn-primary" role="button">+Info</a>
			    			</p>
			    		</div>
			    	</div>
			    	<div class="col-md-3">
			    		<a href="" class="thumbnail">
			    			<img src="<?=base_url()?>css/img/cocina7.jpg">
			    		</a>
			    		<div class="caption">
			    			<h4>Cocina asiatica</h4>
			    			<p class="descrip">La mejor seleccion de recetas asiaticas.</p>
			    			<p>
			    				<a href="#" class="btn btn-default" role="button">Agregar al carro</a>
			    				<a href="#" class="btn btn-primary" role="button">+Info</a>
			    			</p>
			    		</div>
			    	</div>
			    	<div class="col-md-3">
			    		<a href="" class="thumbnail">
			    			<img src="<?=base_url()?>css/img/cocina8.jpg">
			    		</a>
			    		<div class="caption">
			    			<h4>Pesadilla en la cocina</h4>
			    			<p class="descrip">Cocina sencilla de restaurante que puede hacer en casa.</p>
			    			<p>
			    				<a href="#" class="btn btn-default" role="button">Agregar al carro</a>
			    				<a href="#" class="btn btn-primary" role="button">+Info</a>
			    			</p>
			    		</div>
			    	</div>

			    </div>
			  </div>
			</div>
		</div>

	</div>
</body>
</html>
