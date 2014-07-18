<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-md-10 col-md-offset-1" >

	<h2>Comprar / Validar Tarjeta</h2>
	
	<form role="form" method="POST">
		<?=form_error('numeroTarjeta','<div class="alert alert-danger">','</div>')?>
		<div class="form-group">
			<label for="numeroTarjeta">Número de Tarjeta</label>
			<input type="number" class="form-control" id="numeroTarjeta" name="numeroTarjeta" placeholder="0000111122223333">
		</div>
		
		<a href="<?=site_url('')?>" class="btn btn-default">Cancelar</a> 
		<button type="submit" class="btn btn-default">Enviar</button>
	</form>

</div>
</div>
</div>
