$(document).ready(function(){
	var site_url = window.location.protocol +'//'+ window.location.host+'/'+'ci-example/';
	$('.btn-agregar-carrito').on("click",function(){
		var $id_libro = $(this).attr('data-id');
		$.ajax({
			async: true,
			type: "POST",
			dataType: "json",
			data:{'id_libro' : $id_libro},
			url: site_url+"carrito/agregar",
			success: function(datos) {
				if(datos.agregado){
					$('button#botonCarrito span.carr-cantidad').html('#'+datos.cantidad);
					$('button#botonCarrito span.carr-precio').html('$'+datos.precio);
					
					var alerta = $('<div/>', {'class' : 'alert alert-success'});
					alerta.css({
						'min-width':'200px',
						'position':'fixed',
						'top':'50px',
						'margin-left':'50%',
						'left':'-100px',
					});
					alerta.text("El libro se agrego al carrito.");
					$('body').append(alerta);
					alerta.fadeOut(4000);
					
				}else{
					alert('No hay suficiente stock.');
				}
			}
		});
	});
	
	$('#botonCarrito').on("click",function(){
		$(location).attr("href",site_url+'carrito/');
	});
});
