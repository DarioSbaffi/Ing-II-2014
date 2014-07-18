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
					<?foreach($resultados as $fila){?>
						
					<div class="row">
						<article class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
						<form method="post" action="<?=$reg_form_action?>" role="form">
							<fieldset>
							<!-- Sección de datos de cuenta -->
							<legend><?=lang('reg_cuenta_legend')?></legend>
							<div class="form-group"><label for="reg_nombre"><?=lang('reg_nombre_label')?> </label>
								<input name="reg_nombre" type="text" id="reg_nombre"placeholder="<?=lang('reg_nombre_placeholder')?>"
								value="<?=$fila->nombre?>" class="form-control"> </div>
								<?=form_error('reg_nombre','<div class="alert alert-danger">','</div>')?>
							<div class="form-group">
							<label for="reg_apellido"><?=lang('reg_apellido_label')?> </label>
							<input name="reg_apellido" type="text" id="reg_apellido"placeholder="<?=lang('reg_apellido_placeholder')?>"
							value="<?=$fila->apellido?>" class="form-control"> </div>
							<?=form_error('reg_apellido','<div class="alert alert-danger">','</div>')?>
							</fieldset>
							<p><?=lang('reg_aclaraciones')?></p>
							<button type="submit"><?=lang('reg_submit')?></button>
							<button type="reset"><?=lang('reg_reset')?></button>
						</form>
						</article>
					</div>
				</div>
				<?}}?>
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
