<DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
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
					<a class="navbar-brand" href="<?=base_url()?>home"><img class="logo" src="<?=base_url()?>css/img/mini-logo.png"></a>
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
				      	<li><a href="<?=base_url()?>contacto">Contacto</a></li>		    	  		
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
              				<?if($this->session->userdata('tipo')=='U'):?>
										
              			<li>
              			<button style="margin-top: 8px" class="btn btn-nav btn-primary botonesMargin" id="botonCarrito">
              				<span class="glyphicon glyphicon-shopping-cart"></span>
              				<span class="carr-cantidad" >#<?=count($this->cart->contents())?></span>
              				<span class="carr-precio" >$<?=$this->cart->total()?></span>
              			</button>
              			
              			</li>     
                        <?endif?>
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
				    </ul>
				</div>
			</nav>
		</div>

		<!-- Seccion principal de la pagina. Por ahora solo estan incluidas las novedades -->
		<div id="main">
			<div class="jumbotron">
			 	<div class="container">
			    
					<div class="row">
						<div class="col-md-10">
							<h2>PREGUNTAS FRECUENTES</h2>
							<h4>En esta seccion se detallan las respuestas a posibles preguntas que pueden surgir a la hora de operar con el sistema de Cookbook's</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<a href="#compras"><h4>-¿Como realizar compras?</h4></a>							
							<a href="#registro"><h4>-¿Como registrarse en el sistema?</h4></a>
							<a href="#login"><h4>-¿Como ingreso haciendo uso de mi usuario al sistema?</h4></a>
							<a href="#modificar"><h4>-¿Como modifico mis datos personales?</h4></a>
							<a href="#busqueda1"><h4>-¿Como busco libros?</h4></a>
							<a href="#busqueda2"><h4>-¿Como buscar libros a traves de determinados criterios?</h4></a>
							<a href="#carrito"><h4>-¿Como llevar la cuenta de la compra que llevamos en el momento?</h4></a>
							<a href="#pedido"><h4>-¿Como se realiza la venta y cuando y como recibo mi pedido?</h4></a>
							<a href="#baja"><h4>-¿Como doy de bajo mi cuenta?</h4></a>
							<a href="#recuperar"><h4>-¿Como reestablezco mi cuenta de una baja?</h4></a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h3><a name="compras"></a>¿Como realizar compras?</h3>
							<h4>A la hora de realizar una compra se requiere que el usuario este registrado. 
								Para eso el mismo tiene que crear su cuenta. 
								Una vez creada puede recurrir a la busqueda de libros para agregarlos al carro de compras y asi ir armando el 
								pedido en cuestion.</h4>
							<h3><a name="registro"></a>¿Como registrarse en el sistema?</h3>
							<h4>Si usted no posee una cuenta, para realizar un registro en el sistema 
								debe dirigirse al boton "Registrar". </h4>								
							<h4>Puede encontrar este boton en la parte superior derecha de la pantalla:</h4>
							<img src="<?=base_url()?>css/img/faqs/botonRegistro.png">
							<h3><a name="login"></a>¿Como ingreso haciendo uso de mi usuario al sistema?</h3>
							<h4>Una vez que se haya registrado usted puede ingresar al sistema desde el boton "Ingresar".</h4>
							<h4>El mismo se encuentra en la parte superior derecha de la pagina:</h4>
							<img src="<?=base_url()?>css/img/faqs/botonIngresar.png">
							<h3><a name="modificar"></a>¿Como modifico mis datos personales?</h3>
							<h4>Una vez que usted ya ingreso al sistema, puede realizar modificaciones a su informacion de
								usuario de una manera simple.
								Para llevar a cabo esta tarea usted debe, una vez logueado, dar click en el boton con el 
								nombre de su usuario. Se deplegara un menu con varias opciones. La que necesitamos es ir a 
								nuestro perfil y una vez dentro clickear el boton "Editar Datos".</h4>
								<div class="row">
									<div class="col-md-6">
										<img src="<?=base_url()?>css/img/faqs/botonModificarPerfil1.png">
									</div>
									<div class="col-md-6">
										<img src="<?=base_url()?>css/img/faqs/botonModificarPerfil2.png">
									</div>
								</div>
							<h3><a name="busqueda1"></a>¿Como busco libros?</h3>
							<h4>Para buscar libros se dispone de un buscador en la parte lateral derecha de la pantalla 
								casi arriba de todo. Encontraremos un menu donde ingresar datos respecto al libro buscado.</h4>
								<img src="<?=base_url()?>css/img/faqs/buscador.png">
							<h3><a name="busqueda2"></a>¿Como buscar libros a traves de determinados criterios?</h3>
							<h4>Ademas del buscador visto anteriormente tambien tenemos la posibilidad de buscar por 
								medio de formas mas especificas con la opcion de busqueda avanzada:</h4>
								<div class="row">
									<div class="col-md-5">
										<img src="<?=base_url()?>css/img/faqs/buscadorAvanzado1.png">
									</div>
									<div class="col-md-6">
										<img src="<?=base_url()?>css/img/faqs/buscadorAvanzado2.png">
									</div>
								</div>
							<h3><a name="carrito"></a>¿Como llevar la cuenta de la compra que llevamos en el momento?</h3>						
							<h4>Para administrar nuestro pedido disponemos de un carro de compras, situado en la parte
								superior derecha de la pagina junto a otros menus. Previamente se requiere estar logueado
								En el se muestra el total en efectivo de la compra que se esta llevando a cabo de momento.
								Dandole click una vez que se haya añadido por lo menos un articulo se puede acceder a 
								traves del mismo boton a un resumen de cuenta como se muestra a continacion:</h4>
								<div class="row">
									<div class="col-md-12">
										<img src="<?=base_url()?>css/img/faqs/carro1.png">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<img src="<?=base_url()?>css/img/faqs/carro2.png">
									</div>
								</div>
							<h3><a name="pedido"></a>¿Como se realiza la venta y cuando y como recibo mi pedido?</h3>
							<h4>La venta tiene etapas. Una vez que usted selecciona la opcion de comprar el pedido
								entra en estado de "preparando". Una vez que el mismo este listo sera enviado y su
								estado se actualizara. Usted puede consultar los estados del pedido en cualquier 
								momento de la siguiente manera:</h4>
								<div class="row">
									<div class="col-md-12">
										<img src="<?=base_url()?>css/img/faqs/estadoPedido1.png">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<img src="<?=base_url()?>css/img/faqs/estadoPedido2.png">
									</div>
								</div>
							<h3><a name="baja"></a>¿Como doy de bajo mi cuenta?</h3>
							<h4>Para dar de baja la cuenta hay que dirigirse al menu de usuario y luego a la opcion
								de solicitar baja como se muestra a continuacion:</h4>
								<img src="<?=base_url()?>css/img/faqs/solicitarBaja.png">
							<h3><a name="recuperar"></a>¿Como reestablezco mi cuenta de una baja?</h3>
							<h4>Para reestablecer la cuenta de una baja debe ponerse en contacto con el amidnistrador
								del sistema al correo <a href="">contacto@cookbooks.com.ar</a></h4>
						</div>
					</div>

			  	</div>
			</div>
		</div>

	</div>
</body>
</html>

