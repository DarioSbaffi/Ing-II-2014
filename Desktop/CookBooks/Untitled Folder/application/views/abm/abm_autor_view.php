<DOCTYPE html>
<html lang="es">
<head>
		<meta charset="utf-8" />
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
					    <li><a href='<?php echo site_url('abm/Usuarios')?>'>Usuarios</a></li>
				    	<li><a href='<?php echo site_url('abm/Libros')?>'>Libros</a></li>
				      	<li><a href='<?php echo site_url('abm/Categorias')?>'>Categorias</a></li>
				      	<li><a href='<?php echo site_url('abm/Editorial')?>'>Editorial</a></li>
				      	<li><a href='<?php echo site_url('abm/Autores')?>'>Autores</a></li>
				      	<li><a href='<?php echo site_url('abm/Pedido')?>'>Estados de Libros</a></li>
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
				
				<?if(!$resultados) {
					echo ("No hay nada que mostrar");
					}else{?>
						<table class="table striped-table table-hover">
							<tr><td><button onclick="window.location='<?=base_url()?>abm/call_Agregar_autor'">Agregar Un nuevo Autor</button></td></tr>
							<tr><td><h3>Nombre</h3></td><td><h3>Apellido</h3></td><td></td><td></td><td></td></tr>
							<?foreach($resultados as $fila){?>
								<tr><td><?=$fila->nombre?></td><td><?=$fila->apellido?></td><td><button onclick="window.location='<?=base_url()?>abm/call_Modificar_autor/<?=$fila->id_autor?>'"><span class="glyphicon glyphicon-edit"></span></button></td><td><button onclick="if(confirm('Esta seguro que quiere eliminar el autor?')){window.location='<?=base_url()?>abm/call_delete_autor/<?=$fila->id_autor?>'}"><span class="glyphicon glyphicon-remove"></span></button></td></tr>
							<?}?>
						</table>
					<?}?>
				
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
	<script type="text/javascript" src="<?=base_url()?>assets/js/agregar.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/repetidos.js"></script>
	<script src="<?=base_url()?>assets/js/registro.js"></script>
</body>
</html>
