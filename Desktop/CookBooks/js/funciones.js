$(document).ready(function(){
    //utilizamos el evento keyup para coger la información
    //cada vez que se pulsa alguna tecla con el foco en el buscador
    $(".poblacion").keyup(function(){
 		console.log($(this).html())
        //en info tenemos lo que vamos escribiendo en el buscador
        var info = $(this).val();
        //hacemos la petición al método poblaciones del controlador buscador
        //pasando la variable info
        $.post('buscador/poblaciones',{ info : info }, function(data){
 
            //si autocompletado nos devuelve algo
            if(data != '')
            {
 
                //en el div con clase contenedor mostramos la info
                $(".muestra_poblaciones").show();
                $(".muestra_poblaciones").html(data);
 				
            }else{
 
                $(".muestra_poblaciones").html('');
 
            }
        })
 
    })
 

 	$(".muestra_poblaciones").find("a").live('click',function(e){
		e.preventDefault();
		$(".muestra_poblaciones").hide();
	});
	
	//al hacer submit al formulario comprobamos que
	//los 3 campos no vengan vacíos
	$(".formulario").submit(function(){
		
		var poblacion = $(".poblacion").val();
		var sector = $(".sector").val();
		var descripcion = $(".descripcion").val();
		
		if(poblacion == '' && sector == '' && descripcion == '')
		{
			
			alert('Escoge algún filtro para tu búsqueda');
			return false;
			
		}
	})
})

