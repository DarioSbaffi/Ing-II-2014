<DOCTYPE html>
<html lang="es">
<head>
	<title>CookBook's Online</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrapCustom.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/signin.css">
	<meta charset="utf-8" />
		<title>Administracion Productos - Sourcezilla</title>
		<?php foreach($css_files as $file): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
		<?php endforeach; ?>
		<?php foreach($js_files as $file): ?>
			<script src="<?php echo $file; ?>"></script>
		<?php endforeach; ?>
</head>
<body>
	<div class="container">	

		<div id="header" name="header">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?=base_url()?>home_abm"><img class="logo" src="<?=base_url()?>css/img/mini-logo.png"></a>
				</div>

			  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
			       otro elemento que se pueda ocultar al minimizar la barra -->
			  	<div class="collapse navbar-collapse navbar-ex1-collapse">
				    <ul class="nav navbar-nav">
						<li class="active"><a href="<?=base_url()?>home_abm">Inicio</a></li>
					    <li><a href='<?php echo site_url('abm/Usuarios')?>'>Usuarios</a></li>
				    	<li><a href='<?php echo site_url('abm/Libros')?>'>Libros</a></li>
				      	<li><a href='<?php echo site_url('abm/Categorias')?>'>Categorias</a></li>
				      	<li><a href='<?php echo site_url('abm/Editorial')?>'>Editorial</a></li>
				      	<li><a href='<?php echo site_url('abm/Autores')?>'>Autores</a></li>
				      	<li><a href='<?php echo site_url('abm/Pedido')?>'>Estadisticas de venta</a></li>
				      	<li><a href='<?php echo site_url('abm/Stock')?>'>Stock de Libros</a></li>		    	  		
			<!--			<li><a href='<?php echo site_url('home/logout_ci')?>'>Cerrar Sesion</a></li>		    	  		
              -->	</ul>
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
				<p>Altas, Modificaciones y Bajas</p>
				<div style='height:20px;'></div>  
				<div><?php echo $output; ?></div>
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
	<script type="text/javascript" src="<?=base_url()?>css/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/agregar.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/repetidos.js"></script>
</body>
</html>
