<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link href="<?=site_url('assets/bootstrap/css/bootstrap.min.css')?>"
</head>
<body>
<h2>Comprobante de Compra</h2>
<h3>#<?=$idcompra?></h3>

<p>Empresa: <strong><i>CookBooks</i></strong></p>
<p>Fecha: <strong><?=$fecha?></strong></p>

<table class="table">
	<thead align="left" >
	<tr>
	  <th frame="rhs" border="10" class="text-center">#</th>
	  <th frame="rhs" border="10" class="text-center">Título</th>
	  <th frame="rhs" border="10" class="text-center">Precio</th>
	  <th frame="rhs" border="10" class="text-center">Sub-Total</th>
	</tr>
	</thead>
	
	<tbody align="left" >
	<?$i=1?>
	<?foreach($items as $it):?>
		<tr>
		  <td frame="rhs" border="10" class="text-center"><?=$it['qty']?></td>
		  <td frame="rhs" border="10"><?=$it['name']?></td>
		  <td frame="rhs" border="10" class="text-right">$<?=$this->cart->format_number($it['price'])?></td>
		  <td frame="rhs" border="10" class="text-right">$<?=$this->cart->format_number($it['subtotal'])?></td>
		</tr>
	<?$i++?>
	<?endforeach?>
	</tbody>
	
	<tr>
	  <td frame="rhs" border="10" style="background-color: white;"></td>
	  <td frame="rhs" border="10" style="background-color: white;"></td>
	  <td frame="rhs" border="10" style="background-color: white;"></td>
	  <td frame="rhs" border="10" class="text-right success"><strong>Total: </strong>$<?=$total?></td>
	</tr>

</table>

</body>
</html>
