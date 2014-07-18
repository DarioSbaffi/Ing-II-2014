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
				    	<li><a href="<?=base_url()?>home/cat">Catalogo</a></li>
				      	<li><a href="#">Preguntas Frecuentes</a></li>
				      	<li><a href="#">Ayuda</a></li>		    	  		
              		</ul>
              		<ul class="nav navbar-nav navbar-right"> 

			
						
						<li class="dropdown">
              			
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
		
		<div class="container">
<div class="row">
<article class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
<form method="post" action="<?=$reg_form_action?>" role="form">
	<fieldset>
		<!-- Sección de datos de cuenta -->
		<legend><?=lang('reg_cuenta_legend')?></legend>
		
		<div class="form-group <?if(form_error('reg_usuario')) echo'has-error'?>">
		<label class="control-label" for="reg_usuario"><?=lang('reg_usuario_label')?> </label>
		<input name="reg_usuario" type="text" id="reg_usuario"
			placeholder="<?=lang('reg_usuario_placeholder')?>"
			value="<?=set_value('reg_usuario')?>" class="form-control">
			<?=form_error('reg_usuario','<div class="alert alert-danger">','</div>')?>
		</div>
		<div class="form-group <?if(form_error('reg_email')) echo'has-error'?>">
		<label class="control-label" for="reg_email"><?=lang('reg_email_label')?> </label>
		<input name="reg_email" type="email" id="reg_email"
			placeholder="<?=lang('reg_email_placeholder')?>"
			value="<?=set_value('reg_email')?>" class="form-control">
			<?=form_error('reg_email','<div class="alert alert-danger">','</div>')?>	
		</div>
		<div class="form-group <?if(form_error('reg_clave')) echo'has-error'?>">
		<label class="control-label" for="reg_clave"><?=lang('reg_clave_label')?> </label>
		<input name="reg_clave" type="password" id="reg_clave"
			placeholder="<?=lang('reg_clave_placeholder')?>" class="form-control">
			<?=form_error('reg_clave','<div class="alert alert-danger">','</div>')?>
		</div>
		<div class="form-group <?if(form_error('reg_confirm')) echo'has-error'?>">
		<label class="control-label" for="reg_confirm"><?=lang('reg_confirm_label')?> </label>
		<input name="reg_confirm" type="password" id="reg_confirm"
			placeholder="<?=lang('reg_confirm_placeholder')?>" class="form-control">
			<?=form_error('reg_confirm','<div class="alert alert-danger">','</div>')?>	
		</div>
	</fieldset>
	
	<fieldset>
		<!-- Sección de datos personales -->
		<legend><?=lang('reg_personales_legend')?></legend>
		
		<div class="form-group <?if(form_error('reg_dni')) echo'has-error'?>">
		<label class="control-label" for="reg_dni"><?=lang('reg_dni_label')?> </label>
		<input name="reg_dni" type="number" id="reg_dni"
			placeholder="<?=lang('reg_dni_placeholder')?>"
			value="<?=set_value('reg_dni')?>" class="form-control">
			<?=form_error('reg_dni','<div class="alert alert-danger">','</div>')?>
		</div>
		<div class="form-group">
		<label for="reg_nombre"><?=lang('reg_nombre_label')?> </label>
		<input name="reg_nombre" type="text" id="reg_nombre"
			placeholder="<?=lang('reg_nombre_placeholder')?>"
			value="<?=set_value('reg_nombre')?>" class="form-control"> </div>
		<div class="form-group">
		<label for="reg_apellido"><?=lang('reg_apellido_label')?> </label>
		<input name="reg_apellido" type="text" id="reg_apellido"
			placeholder="<?=lang('reg_apellido_placeholder')?>"
			value="<?=set_value('reg_apellido')?>" class="form-control"> </div>
		<div class="form-group">
		<label for="reg_telefono"><?=lang('reg_telefono_label')?> </label>
		<input name="reg_telefono" type="number" id="reg_telefono"
			placeholder="<?=lang('reg_telefono_placeholder')?>"
			value="<?=set_value('reg_telefono')?>" class="form-control"> </div>
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
			value="<?=set_value('reg_calle')?>">
		
		<label for="reg_numero"><?=lang('reg_numero_label')?> </label>
		<input name="reg_numero" type="number" id="reg_numero" size="6"
			placeholder="<?=lang('reg_numero_placeholder')?>"
			value="<?=set_value('reg_numero')?>">
		
		<label for="reg_torre"><?=lang('reg_torre_label')?> </label>
		<input name="reg_torre" type="number" id="reg_torre" size="1"
			placeholder="<?=lang('reg_torre_placeholder')?>"
			value="<?=set_value('reg_torre')?>">
		
		<label for="reg_piso"><?=lang('reg_piso_label')?> </label>
		<input name="reg_piso" type="number" id="reg_piso" size="1"
			placeholder="<?=lang('reg_piso_placeholder')?>"
			value="<?=set_value('reg_piso')?>">
			
		<label for="reg_depto"><?=lang('reg_depto_label')?> </label>
		<input name="reg_depto" type="text" id="reg_depto" size="2"
			placeholder="<?=lang('reg_depto_placeholder')?>"
			value="<?=set_value('reg_depto')?>"> <br>
	</fieldset>
	<p><?=lang('reg_aclaraciones')?></p>
	<button type="submit">
		<?=lang('reg_submit')?>
	</button>
	<button type="reset">
		<?=lang('reg_reset')?>
	</button>
</form>
</article>
</div>
</div>
</div></div></div>
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
