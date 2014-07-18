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
					<?if(!$resultados) {
					echo ("No hay nada que mostrar");
					}else{?>
					<?foreach($resultados as $fila){?>
						
					<div class="row">
						<article class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
						<form method="post" action="<?=$reg_form_action?>" role="form">
						<fieldset>
							<!-- Sección de datos personales -->
							<legend><?=lang('reg_personales_legend')?></legend>
			
							<div class="form-group">
								<label for="reg_nombre"><?=lang('reg_nombre_label')?> </label>
								<input name="reg_nombre" type="text" id="reg_nombre"placeholder="<?=lang('reg_nombre_placeholder')?>"
								value="<?=$fila->nom?>" class="form-control"> </div>
							<div class="form-group">

							<label for="reg_apellido"><?=lang('reg_apellido_label')?> </label>
							<input name="reg_apellido" type="text" id="reg_apellido" placeholder="<?=lang('reg_apellido_placeholder')?>"
							value="<?=$fila->apellido?>" class="form-control"> </div>
	
							<div class="form-group">
								<label for="reg_telefono"><?=lang('reg_telefono_label')?> </label>
								<input name="reg_telefono" type="number" id="reg_telefono"placeholder="<?=lang('reg_telefono_placeholder')?>"
								value="<?=$fila->telefono?>" class="form-control"> </div>
						</fieldset>
	
						<fieldset>
							<!-- Sección de datos de envío -->
							<legend><?=lang('reg_direccion_legend')?></legend>
		
							<!-- Selector de Provincia -->
							<div class="form-group">
								<label for="reg_provincia"><?=lang('reg_provincia_label')?> </label>
								<select id="reg_provincia" name="reg_provincia">
									<option value="-1" selected="selected">--------------</option>
									<?foreach($provincias as $provincia):?>
										<option value="<?=$provincia->id?>"><?=$provincia->nombre?></option>
									<?endforeach;?>
								</select>
							</div>
		
							<!-- Selector de Ciudad -->
							<!-- Se actualiza dinamicamente con la seleccion de provincia -->
							<div class="form-group">
								<label for="reg_ciudad"><?=lang('reg_ciudad_label')?> </label>
								<select id="reg_ciudad" name="reg_ciudad">
									<option value="-1" selected="selected">--------------</option>
								</select>
							</div>
		
							<!-- Datos de dirección -->
							<label for="reg_calle"><?=lang('reg_calle_label')?> </label>
							<input name="reg_calle" type="text" id="reg_calle"
							placeholder="<?=lang('reg_calle_placeholder')?>"
							value="<?=$fila->calle?>">
		
							<label for="reg_numero"><?=lang('reg_numero_label')?> </label>
							<input name="reg_numero" type="number" id="reg_numero" size="6"
							placeholder="<?=lang('reg_numero_placeholder')?>"
							value="<?=$fila->numero?>">
		
							<label for="reg_piso"><?=lang('reg_piso_label')?> </label>
							<input name="reg_piso" type="number" id="reg_piso" size="1"
							placeholder="<?=lang('reg_piso_placeholder')?>"
							value="<?=$fila->piso?>">
			
							<label for="reg_depto"><?=lang('reg_depto_label')?> </label>
							<input name="reg_depto" type="text" id="reg_depto" size="2"
							placeholder="<?=lang('reg_depto_placeholder')?>"
							value="<?=$fila->departamento?>"> <br>
					</fieldset>
					<p><?=lang('reg_aclaraciones')?></p>
					<button type="submit" name="Actualizar Datos">Actualizar Datos</button>
			</form>
		</article>
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
	<script src="<?=base_url()?>assets/js/registro.js"></script>
</body>
</html>
