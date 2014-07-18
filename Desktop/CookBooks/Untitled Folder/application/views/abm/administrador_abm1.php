<DOCTYPE html>
<html lang="es">
<head>
	<title>CookBook's Online</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrapCustom.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/signin.css">
	<script src="<?=base_url()?>css/jquery-1.11.1.min.js"></script>
	<script src="<?=base_url()?>css/bootstrap.min.js"></script>
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
					<a class="navbar-brand" href="<?=base_url()?>home_abm">CookBook's</a>
				</div>

			  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
			       otro elemento que se pueda ocultar al minimizar la barra -->
			  	<div class="collapse navbar-collapse navbar-ex1-collapse">
				    <ul class="nav navbar-nav">
					    <li class="active"><a href="<?=base_url()?>home_abm">Inicio</a></li>
				    	<li><a href="<?=base_url()?>abm">ABM</a></li>
				    	<li><a href="<?=base_url()?>home/cat">Catalogo</a></li>
				      	<li><a href="#">Preguntas Frecuentes</a></li>
				      	<li><a href="#">Ayuda</a></li>		    	  		
					</ul>
              		<ul class="nav navbar-nav navbar-right"> 
						
						<li class="dropdown">
						<button class="btn btn-primary dropdown-toggle botonesMargin" data-toggle="dropdown" id="botonIngreso">Usuario <? echo $this->session->userdata('username');?></button>
              				<ul class="dropdown-menu">
              					<li>
									<h4>Bienvenido <? echo $this->session->userdata('username');?> </h4>
              						<table class="table striped-table table-hover" id="carroTabla">
              							<tr><td><a href="<?=base_url()?>info_usuario/perfil">Perfil</a></td></tr>
              							<tr><td><a href="<?=base_url()?>info_usuario/baja_adm">Realizar baja de usuarios</a></td></tr>
              							<tr><td><a href="<?=base_url()?>info_usuario/cambiar_contrasenia">Cambiar Contrase&ntilde;a</a></td></tr>
										<tr><td><a href="<?=base_url()?>info_usuario/cambiar_estados">Cambiar estados de los pedidos</a></td></tr>
										<tr><td></td></tr>
  									</table>
              						<button class="btn btn-primary" onclick="window.location='<?=base_url()?>home/logout_ci'">Cerrar sesion</button>
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

					</div>
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

		<!-- Footer de la pagina con datos de los desarrolladores y propietario/s del software -->
		<div class="container footer">
			<div class="row">
				<div class="col-md-3">
					Grupo De Desarrollo RSG:
					<ul>
						<li>Sergio Ariel Reynoso</li>
						<li>Jorge Oscar Gianotti</li>
						<li>Dario Sbaffi</li>
					</ul>
				</div>
				<div class="col-md-3 col-md-offset-6">
					<ul>
						<li>Cookbooks SA</li>
						<li>Calle falsa 123</li>
						<li><a href="#">contacto@cookbooks.com.ar</a></li>
						<li>+54 221 456 6543</li>
					</ul>
				</div>
			</div>
		</div>

	</div>
</body>
</html>
