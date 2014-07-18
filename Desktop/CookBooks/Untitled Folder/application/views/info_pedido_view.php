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
					<a class="navbar-brand" href="<?=base_url()?>home">CookBook's</a>
				</div>

			  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
			       otro elemento que se pueda ocultar al minimizar la barra -->
			  	<div class="collapse navbar-collapse navbar-ex1-collapse">
				    <ul class="nav navbar-nav">
					    <li class="active"><a href="<?=base_url()?>home">Inicio</a></li>
					    <?if(($this->session->userdata('tipo')=='a')||($this->session->userdata('tipo')=='A')){?>
							<li><a href="<?=base_url()?>abm">ABM</a></li>
						<?}?>
				    	<li><a href="<?=base_url()?>home/cat">Catalogo</a></li>
				      	<li><a href="#">Preguntas Frecuentes</a></li>
				      	<li><a href="#">Ayuda</a></li>		    	  		
				<!--		<li><a href='<?php echo site_url('home/logout_ci')?>'>Cerrar Sesion</a></li>		    	  		 -->
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
				  
					<?if(!$resultados) {
						echo ("No hay nada que mostrar");
					}else{?>
						<table class="table table-bordered table-hover" id="catalogo">
							<tr><td>Fecha</td><td>Estado</td><td>Cambiar Estado</td></tr>
							<?foreach($resultados as $fila){?>
								<tr><td><?=$fila->fecha?></td><td><?=$fila->estado?></td><td>
										<button onclick="if(confirm('Esta seguro de cambiar el estado del pedido?')){window.location='<?=base_url()?>info_usuario/cambiar/<?=$fila->id_pedido?>'}">Cambiar</button>
								</td></tr>
							<?}}?> 
						</table>
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
