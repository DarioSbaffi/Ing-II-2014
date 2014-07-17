<h2>Comprobante de Compra</h2>
<h3># </h3>

<p>Empresa: <strong><i>CookBooks</i></strong></p>
<p>Cliente: <strong><i><?=$this->session->userdata('nombre_completo')?></i></strong></p>

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
	<?foreach($this->cart->contents() as $items):?>
		<tr>
		  <td frame="rhs" border="10" class="text-center"><?=$items['qty']?></td>
		  <td frame="rhs" border="10"><?=$items['name']?></td>
		  <td frame="rhs" border="10" class="text-right">$<?=$this->cart->format_number($items['price'])?></td>
		  <td frame="rhs" border="10" class="text-right">$<?=$this->cart->format_number($items['subtotal'])?></td>
		</tr>
	<?$i++?>
	<?endforeach?>
	</tbody>
	
	<tr>
	  <td frame="rhs" border="10" style="background-color: white;"></td>
	  <td frame="rhs" border="10" style="background-color: white;"></td>
	  <td frame="rhs" border="10" style="background-color: white;"></td>
	  <td frame="rhs" border="10" class="text-right success"><strong>Total: </strong>$<?=$this->cart->format_number($this->cart->total())?></td>
	</tr>

</table>