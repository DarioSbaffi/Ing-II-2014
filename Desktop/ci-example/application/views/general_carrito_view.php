<DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>CookBook's Online</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrapCustom.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/signin.css">
	<script type="text/javascript" src="<?=base_url()?>css/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>css/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/carrito.js" ></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/agregar-carrito.js"></script>
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
					<a class="navbar-brand" href="<?=base_url()?>home">CookBook's</a>
				</div>

			  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
			       otro elemento que se pueda ocultar al minimizar la barra -->
			  	<div class="collapse navbar-collapse navbar-ex1-collapse">
				    <ul class="nav navbar-nav">
					    <li class="active"><a href="<?=base_url()?>">Inicio</a></li>
					    <?if(($this->session->userdata('tipo')=='a')||($this->session->userdata('tipo')=='A')){?>
							<li><a href="<?=base_url()?>abm">ABM</a></li>
						<?}?>
				    	<li><a href="<?=base_url()?>home/cat">Catalogo</a></li>
				      	<li><a href="#">Preguntas Frecuentes</a></li>
				      	<li><a href="#">Ayuda</a></li>		    	  		
             		</ul>
					
					
						
              		<ul class="nav navbar-nav navbar-right"> 

						<?if ($this->session->userdata('logueo')){?>
							<li class="dropdown">
							<button class="btn btn-primary dropdown-toggle botonesMargin" data-toggle="dropdown" id="botonIngreso">Usuario <? echo $this->session->userdata('username');?></button>
							<ul class="dropdown-menu">
              					<li>
									<h4>Bienvenido <? echo $this->session->userdata('username');?> </h4>
              						<table class="table striped-table table-hover" id="carroTabla">
              							<tr><td><a href="<?=base_url()?>info_usuario/perfil">Perfil</a></td></tr>
              							<?if($this->session->userdata('tipo')=='U'){?>
											<tr><td><a href="<?=base_url()?>info_usuario/estado_pedido">Estado de pedidos</a></td></tr>
											<tr><td><a href="<?=base_url()?>info_usuario/historial_compras">Historias de compras</a></td></tr>
											<tr><td><a href="<?=base_url()?>info_usuario/baja">Solicitar baja</a></td></tr>
										<?}?>
										<tr><td><a href="<?=base_url()?>info_usuario/cambiar_contrasenia">Cambiar Contrase&ntilde;a</a></td></tr>
										<?if(($this->session->userdata('tipo')=='a')||($this->session->userdata('tipo')=='A')){?>
											<tr><td><a href="<?=base_url()?>info_usuario/baja_adm">Realizar baja de usuarios</a></td></tr>
											<tr><td><a href="<?=base_url()?>info_usuario/cambiar_estados">Cambiar estados de los pedidos</a></td></tr>			
										<?}?>
										<tr><td></td></tr>
  									</table>
              						<button class="btn btn-primary" onclick="window.location='<?=base_url()?>home/logout_ci'">Cerrar sesion</button>
              					</li>
              				</ul>
              			</li>   
              			<?}
              			else{?> 
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
											</label><?=form_hidden('token',$token)?><button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
										</form>
									</li>
								</ul>
							</li>
							
              			   <?}?> 
              			</li>
              			<button style="margin-top: 8px" class="btn btn-nav btn-primary botonesMargin" id="botonCarrito">
              				<span class="glyphicon glyphicon-shopping-cart"></span>
              				<span class="carr-cantidad" >#<?=count($this->cart->contents())?></span>
              				<span class="carr-precio" >$<?=$this->cart->total()?></span>
              			</button>
              			
              			</li>           			

				    </ul>
				</div>
			</nav>
		</div>

		<!-- Seccion principal de la pagina. Por ahora solo estan incluidas las novedades -->
		<div id="main">
			<div class="jumbotron">
				<div class="container">
			    
				<?=$contenido?>

				</div>
			</div>
		</div>
</body>
</html>

