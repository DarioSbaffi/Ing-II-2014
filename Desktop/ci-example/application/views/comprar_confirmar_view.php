<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-md-10 col-md-offset-1" >

	<h2>Comprar / Confirmar</h2>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<td>Articulo</td>
				<td>Cantidad</td>
				<td>Precio</td>
				<td>Subtotal</td>
			</tr>
		</thead>
		<tbody>
		<?foreach($items as $it):?>
			<tr>
				<td><?=$it['name']?></td>
				<td><?=$it['qty']?></td>
				<td><?=$it['price']?></td>
				<td><?=$it['subtotal']?></td>
			</tr>
		<?endforeach?>
		</tbody>
		<tr></tr>
		<tr>
			<td>Total: </td>
			<td><?=$this->cart->format_number($this->cart->total())?></td>
		</tr>
	</table>
	
	<form role="form" method="POST">
		<input type="hidden" name="seConfirmoCompra" value="TRUE">		
		<a href="<?=site_url('')?>" class="btn btn-default">Cancelar</a> 
		<button type="submit" class="btn btn-default">Aceptar</button>
	</form>
</div>
</div>
</div>
