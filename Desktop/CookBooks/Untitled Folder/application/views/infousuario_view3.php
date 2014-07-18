<DOCTYPE html>
<html lang="es">
<head>
	<meta charset='utf-8'>
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
					<a class="navbar-brand" href="#">CookBook's</a>
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

				    </ul>
				</div>
			</nav>
		</div>
		<!-- Seccion principal de la pagina. Por ahora solo estan incluidas las novedades -->
		<div id="main">
			<div class="jumbotron">
			  <div class="container">
				<div class="row">
				<article class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<form method="post" action="<?=$reg_form_action?>" role="form">
						<fieldset>
							<!-- Sección de datos de cuenta -->
							<legend><?=lang('reg_cuenta_legend')?></legend>
		
							<div class="form-group <?if(form_error('reg_clave_actual')) echo'has-error'?>">
								<label class="control-label" for="reg_clave_actual">Contrase&ntilde;a Actual</label>
								<input name="reg_clave_actual" type="password" id="reg_clave_actual" placeholder="<?=lang('reg_clave_placeholder')?>" class="form-control">
								<?=form_error('reg_clave_actual','<div class="alert alert-danger">','</div>')?>
							</div>

							<div class="form-group <?if(form_error('reg_clave')) echo'has-error'?>">
								<label class="control-label" for="reg_clave"><?=lang('reg_clave_label')?> </label>
								<input name="reg_clave" type="password" id="reg_clave" placeholder="<?=lang('reg_clave_placeholder')?>" class="form-control">
								<?=form_error('reg_clave','<div class="alert alert-danger">','</div>')?>
							</div>
		
							<div class="form-group <?if(form_error('reg_confirm')) echo'has-error'?>">
								<label class="control-label" for="reg_confirm"><?=lang('reg_confirm_label')?> </label>
								<input name="reg_confirm" type="password" id="reg_confirm" placeholder="<?=lang('reg_confirm_placeholder')?>" class="form-control">
								<?=form_error('reg_confirm','<div class="alert alert-danger">','</div>')?>	
							</div>
						</fieldset>
						<p><?=lang('reg_aclaraciones')?></p>
						<button type="submit" name="Actualizar Datos">Actualizar Contrase&ntilde;a</button>
						<button type="reset"> <?=lang('reg_reset')?> </button>
					</form>
				</article>
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
	<script src="<?=base_url()?>assets/js/registro.js"></script>
</body>
</html>
