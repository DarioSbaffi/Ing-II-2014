$(document).ready(function(){
	ciudades = function(){
		$.ajax({
			async: true,
			type: "POST",
			url: "http://cientocatorce.com.ar/registro/ciudades",
			data: {
				'id_provincia' : $('#reg_provincia').val(),
				'ciu' : $('#reg_ciudad_temporal').val(),
			},
			beforeSend: function(){
				$('#reg_ciudad').append('<option value"-1" selected="selected">Cargando...</option>');
			},
			success: function(ciudades) {
				$('#reg_ciudad').html(ciudades);
			}
		});
	};
	if($('#reg_provincia').val() > 0){
		ciudades();
	}
	$('#reg_provincia').on('change',ciudades);
	$('#reg_ciudad').on("change", function(){
		$('#reg_ciudad_temporal').val($('#reg_ciudad').val());
	});
});
