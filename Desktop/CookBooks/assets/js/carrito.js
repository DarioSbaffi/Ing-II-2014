$(document).ready(function(){
	var site_url = window.location.protocol +'//'+ window.location.host+'/'+'ci-example/';
	//OnClick del boton Modificar
	$(".btn-modificar").on("click",function(){
		$("div.modal-header h4.modal-title").html($(this).attr('data-nombre'));
		
		$("div.modal form").attr("action",site_url+"carrito/modificar/");
		
		$("div.modal-body").html("<label>Cantidad de Unidades: </label>");
		$("div.modal-body").append("<input maxlength='3' size='3' id='inp-cantidad' type='number' name='qty' value='"+$(this).attr('data-qty')+"'></input>");
		$("div.modal-body").append("<input type='hidden' name='rowid' value='"+$(this).attr('data-rowid')+"'>");
		$("div.modal-body").append("<input type='hidden' name='id' value='"+$(this).attr('data-id')+"'>");
		$("div.modal-body").append("<div class='alert alert-danger hidden'></div>");
		
		$("div.modal-footer button#btn-cancelar").html("Cancelar");
		$("div.modal-footer button#btn-aceptar").html("Modificar");
		$("div.modal-footer button#btn-aceptar").removeClass("btn-danger");
		$("div.modal-footer button#btn-aceptar").addClass("btn-primary");
		$("div.modal-footer button#btn-aceptar").attr("type", "submit");
		
		$("form#form-dialogo").attr('data-rol','modificar');
		
		$('#dialogo').modal('show');
	});
	
	//Acción Submit para Modificar
	$("form#form-dialogo[data-rol='modificar']").submit(function(event){
		var cantidad = $("input#inp-cantidad").val();
		cantidad = $.trim(cantidad);
		if(!/^([0-9])*$/.test(cantidad)){
			var alerta = $("div.modal-body div.alert");
			alerta.html("Debe ingresar un valor numérico");
			alerta.removeClass("hidden");
			return false;
		}else{
			return true;
		}
	});
	
	//OnClick del boton Eliminar
	$(".btn-eliminar").on("click",function(){
		$("div.modal-header h4.modal-title").html($(this).attr('data-nombre'));
		
		$("div.modal form").attr("action",$(location).attr('href')+"/eliminar");
		
		$("div.modal-body").html("<p>Esta acción eliminara el producto de su <i>Carrito de Compra</i> actual.</p>");
		$("div.modal-body").append("<p>Confirme la acción para eliminar el producto.</p>");
		$("div.modal-body").append("<input type='hidden' name='rowid' value='"+$(this).attr('data-rowid')+"'>");
		$("div.modal-body").append("<div class='alert alert-danger hidden'></div>");
		
		$("div.modal-footer button#btn-cancelar").html("Cancelar");
		$("div.modal-footer button#btn-aceptar").html("Eliminar");
		$("div.modal-footer button#btn-aceptar").removeClass("btn-primary");
		$("div.modal-footer button#btn-aceptar").addClass("btn-danger");
		$("div.modal-footer button#btn-aceptar").attr("type", "submit");
		
		$("form#form-dialogo").attr('data-rol','eliminar');
		
		$('#dialogo').modal('show');
	});
	
	//OnClick del boton Comprar
	$('a#btn-comprar').on("click",function(){
		$.ajax({
			async: true,
			type: "post",
			dataType: "json",
			url: site_url+"carrito/logueado/",
			success: function(datos){
				if(datos.logueado){
					$(location).attr('href',site_url+'carrito/comprar/validar');
				}else{
					var alerta = $('<div/>', {'class' : 'alert alert-warning'});
					alerta.css({
						'width':'200px',
						'position':'fixed',
						'top':'50px',
						'margin-left':'50%',
						'left':'-100px',
					});
					alerta.text("Usted debe iniciar sesion en el sistema para realizar una compra.");
					$('body').append(alerta);
					alerta.fadeOut(6000,function(){
						$(this).remove();
					});
				}
			}
		});
	});
	
	
/*	$('a#btn-comprar').on("click",function(){
		function compra(){
			$("div.modal-header h4.modal-title").html('Validar datos de compra');
			
			$("div.modal-body").html("<p>En este paso se deberían ingresar datos de tarjeta y cliente que se validad sobre algún sistema externo.</p>");
			$("div.modal-body").append("<p>Al confirmar este paso se efectúa la compra y se registra el pedido</p>");
			$("div.modal-body").append("<p>Luego visualizará su comprobante por la compra efectuada</p>");
			
			$("div.modal-footer button#btn-cancelar").html("Cancelar");
			$("div.modal-footer button#btn-aceptar").html("Confirmar");
			$("div.modal-footer button#btn-aceptar").removeClass("btn-danger");
			$("div.modal-footer button#btn-aceptar").addClass("btn-primary");
			$("div.modal-footer button#btn-aceptar").attr("type", "button");
			$("div.modal-footer button#btn-aceptar").on("click",function(){
				$.ajax({
					async: true,
					type: "POST",
					dataType: "json",
					url: site_url+"carrito/comprar",
					success: function(datos) {
						$("div.modal-header h4.modal-title").html('');
						$("div.modal-body").html(datos.comprobante);
						$("div.modal-footer button#btn-cancelar").html("Cancelar");
						$("div.modal-footer button#btn-aceptar").html("Guardar");
						$("div.modal-footer button#btn-aceptar").removeClass("btn-danger");
						$("div.modal-footer button#btn-aceptar").addClass("btn-primary");
						$("div.modal-footer button#btn-aceptar").attr("type", "button");
						$("div.modal-footer button#btn-aceptar").on("click",function(){
							$(location).attr("href",site_url+"carrito/comprobante/pdf");
							
						});
						$('#dialogo').modal('show');
					},
				});
			});
		
			$('#dialogo').modal('show');
		}
		
		$.ajax({
			async: true,
			type: "post",
			dataType: "json",
			url: site_url+"carrito/logueado/",
			success: function(datos){
				if(datos.logueado){
					compra();
				}else{
					var alerta = $('<div/>', {'class' : 'alert alert-warning'});
					alerta.css({
						'width':'200px',
						'position':'fixed',
						'top':'50px',
						'margin-left':'50%',
						'left':'-100px',
					});
					alerta.text("Usted debe iniciar sesion en el sistema para realizar una compra.");
					$('body').append(alerta);
					alerta.fadeOut(6000,function(){
						$(this).remove();
					});
				}
			}
		});  
	});*/
});



