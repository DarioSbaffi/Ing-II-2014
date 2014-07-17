<DOCTYPE html>
<html lang="es">
<head>
	<title>CookBook's Online</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrapCustom.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/signin.css">
	<script src="<?=base_url()?>css/jquery-1.11.1.min.js"></script>
	<script src="<?=base_url()?>css/bootstrap.min.js"></script>
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
					    <li class="active"><a href="<?=base_url()?>home">Inicio</a></li>
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
              							<tr><td><a href="<?=base_url()?>info_usuario/estado_pedido">Estado de pedidos</a></td></tr>
              							<tr><td><a href="<?=base_url()?>info_usuario/historial_compras">Historias de compras</a></td></tr>
										<tr><td><a href="<?=base_url()?>info_usuario/cambiar_contrasenia">Cambiar Contrase&ntilde;a</a></td></tr>
										<tr><td><a href="<?=base_url()?>info_usuario/baja">Solicitar baja</a></td></tr>
										<tr><td></td></tr>
  									</table>
              						<button class="btn btn-primary" onclick="window.location='<?=base_url()?>home/logout_ci'">Cerrar sesion</button>
              					</li>
              				</ul>
              			</li>               			
						
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
			    
					<div class="">
						
						<form method="post" action="<?=base_url()?>home/suscripcion" role="form">				
							<div class="col-md-2 margen-buscador">
								<div class="form-group <?if(form_error('reg_email')) echo'has-error'?>">
									<input name="reg_email" type="email" id="reg_email" class="form-control input-size" placeholder="Ingrese su mail"><?=form_error('reg_email','<div class="alert alert-danger">','</div>')?>	
								</div>	
							</div>
							<div class="col-md-2 margen-buscador">
								<button type="Submit" name="submit" id="submit" class="btn btn-primary">Suscribirse</button> 
							
								<button type="Cancel" name="cancel" id="cancel" class="btn btn-default">Cancelar Suscripcion</button>
							</div>
						</form>
						
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

					</div></br></br></br>
			    		
	
			    <h1>Novedades</h1>
			    
			    <?if(!$resultados) {
					echo ("No hay nada que mostrar");
				}else{ 
					foreach($resultados as $fila) {?>
						<div class="col-md-3">
							<a href="" class="thumbnail"><img src="http://localhost/ci-example/assets/Image/<?=$fila->portada?>"></a>
							<div class="caption">
								<h3><?=$fila->titulo?></h3>
								<p class="descrip"><?=$fila->descripcion?></p>
								<p>
									<button class="btn btn-default btn-agregar-carrito" role="button" data-id=<?=$fila->id?>>Agregar al carro</button>
									<a href="#" class="btn btn-primary" role="button">+Info</a>
								</p>
							</div>
						</div>
					<?}
				}?></br></br></br>
				
			  </div>
			</div>
		</div>

	</div>
</body>
</html>
