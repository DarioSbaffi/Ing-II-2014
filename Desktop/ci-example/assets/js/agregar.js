$(document).ready(function() {
	var agregarAsincronico = function(nombre,singular){
		var nom = (nombre.length > 0 && nombre.length > 3)? nombre.substring(0,3): 'abr'+nombre;
		
		//Agregar categoría
		$('#'+nombre+'_input_box').append('<input id="nueva-'+nom+'" type="button" value="Nueva" class="btn">');
		$('#'+nombre+'_input_box').append('<div id="div-agregar-'+nom+'"><p>Agregar '+singular+':</p><input id="input-'+nom+'" type="text"><input id="agregar-'+nom+'" type="button" value="Agregar" class="btn"></div>');
		
		$('#div-agregar-'+nom+'').css('display','none');
		$('#div-agregar-'+nom+'').css('position','relativa');
		$('#div-agregar-'+nom+'').css('top','30px');
		$('#div-agregar-'+nom+'').css('lef','30px');
	
		$('#nueva-'+nom+'').css('vertical-align','top');
		$('#nueva-'+nom+'').click(function(){
			if($('#div-agregar-'+nom+'').css('display') == 'none'){
				$('#div-agregar-'+nom+'').css('display','block');
			}else{
				$('#div-agregar-'+nom+'').css('display','none');
			}
		});
		
		$('#agregar-'+nom+'').click(function(){
			if($('#input-'+nom+'').val().length > 0){
				//Agrego mediante ajax categoría en la base de datos
				$.ajax({
					async: true,
					type: "POST",
					dataType: "JSON",
					url: "http://localhost/ci-example/registro/agregar_elemento",
					data: {
						'nombre' : singular,
						'elemento' : $('#input-'+nom+'').val(),
					},
					beforeSend: function(){
						$('#agregar-'+nom+'').val('Agregando...');
					},
					success: function(datos) {
						$('#agregar-'+nom+'').val('Agregar');
						if(datos.error){
							alert(datos.mensaje);
						}else{
							//Agrego el nuevo elemento a la lista
							$('#field-'+nombre).append('<option value="'+datos.elemento.id+'">'+datos.elemento.nombre+'</option>');
							
							//Ordeno select
							var valorSeleccionado = $('#field-'+nombre).val();
							$('#field-'+nombre).html($('#field-'+nombre+' option').sort(function(a, b) {
							    return a.text.toUpperCase() == b.text.toUpperCase() ? 0 : a.text.toUpperCase() < b.text.toUpperCase() ? -1 : 1;
							}));
							$('#field-'+nombre).val(valorSeleccionado);
							
							//Actualizo plugin Chosen
							$('.chosen-multiple-select, .chosen-select, .ajax-chosen-select').each(function(){
								$(this).trigger("liszt:updated");
							});
							
							//Vuelvo a estado inicial
							$('#div-agregar-'+nom).css('display','none');
							$('#input-'+nom).val('');
							
							//Aviso inserción con éxito
							alert('La '+singular+' se agrego correctamente.');
						}
					},
					error: function(){
						$('#div-agregar-'+nom).css('display','none');
						$('#input-'+nom).val('');
						$('#agregar-'+nom).val('Agregar');
						alert('Se produjo un error en el proceso.');
					}
				});
			}else{
				alert('No ingreso ningun valor.');
			}
		});
	};
	//Agregar categorias
	agregarAsincronico('categorias','categoria');
	//Agregar editoriales
	agregarAsincronico('editorial','editorial');
		
	//Agregar autores
	$('#autores_input_box').append('<input id="nuevo-aut" type="button" value="Nueva" class="btn">');
	$('#autores_input_box').append('<div id="div-agregar-aut"><p>Nuevo Autor:</p><label>Nombre</label><input id="input-nombre-autor" type="text"><br><label>Apellido</label><input id="input-apellido-autor" type="text"><br><input id="agregar-aut" type="button" value="Agregar" class="btn"></div>');
	$('#div-agregar-aut').css('display','none');
	$('#div-agregar-aut').css('position','relativa');
	$('#div-agregar-aut').css('top','30px');
	$('#div-agregar-aut').css('lef','30px');
	
	$('#nuevo-aut').css('vertical-align','top');
	$('#nuevo-aut').click(function(){
		$('#div-agregar-aut').css('display','block');
	});

	$('#agregar-aut').click(function(){
		if($('#input-nombre-autor').val().length > 0 && $('#input-apellido-autor').val().length > 0){
			//Agrego mediante ajax categoría en la base de datos
			$.ajax({
				async: true,
				type: "POST",
				dataType: "JSON",
				url: "http://localhost/ci-example/registro/agregar_autor",
				data: {
					'nombre' : $('#input-nombre-autor').val(),
					'apellido' : $('#input-apellido-autor').val(),
				},
				beforeSend: function(){
					$('#agregar-aut').val('Agregando...');
				},
				success: function(datos) {
					$('#agregar-aut').val('Agregar');
					if(datos.error){
						alert(datos.mensaje);
					}else{
						//Agrego el nuevo elemento a la lista
						$('#field-autores').append('<option value="'+datos.elemento.id+'">'+datos.elemento.nombre+'</option>');
						
						//Ordeno select
						var valorSeleccionado = $('#field-autores').val();
						$('#field-autores').html($('#field-autores option').sort(function(a, b) {
						    return a.text.toUpperCase() == b.text.toUpperCase() ? 0 : a.text.toUpperCase() < b.text.toUpperCase() ? -1 : 1;
						}));
						$('#field-autores').val(valorSeleccionado);
						
						//Actualizo plugin Chosen
						$('.chosen-multiple-select, .chosen-select, .ajax-chosen-select').each(function(){
							$(this).trigger("liszt:updated");
						});
						
						//Vuelvo a estado inicial
						$('#div-agregar-aut').css('display','none');
						$('#input-apellido-autor').val('');
						$('#input-nombre-autor').val('');
						
						//Aviso inserción con éxito
						alert('El autor se agrego correctamente.');
					}
				},
				error: function(){
					$('#div-agregar-aut').css('display','none');
					$('#input-aut').val('');
					$('#agregar-aut').val('Agregar');
					alert('Se produjo un error en el proceso.');
				}
			});
		}else{
			alert('Apellido y Nombre son obligatorios.');
		}
	});
});
