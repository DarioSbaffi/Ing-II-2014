/**
 * 
 */
$(document).ready(function($var){
	if($var=2){
		var caja = $('#autores_input_box');
		caja.append('<input id="nueva-cat" type="button" value="Nueva" class="btn">');
		caja.append('<div id="div-agregar"><p>Nuevo Autor:</p><input type="text"><input id="agregar-cat" type="button" value="Agregar" class="btn"></div>');
		var divAgregar = $('#div-agregar');
		divAgregar.css('display','none');
		divAgregar.css('position','relativa');
		divAgregar.css('top','30px');
		divAgregar.css('lef','30px');
		
		var botonNueva = $('#nueva-cat');
		botonNueva.css('vertical-align','top');
		botonNueva.click(function(){
			$('#div-agregar').css('display','block');
		});
	
		var botonAgregar = $('#agregar-cat');
		botonAgregar.click(function(){
			$('#div-agregar').css('display','none');
		})
	}
});
