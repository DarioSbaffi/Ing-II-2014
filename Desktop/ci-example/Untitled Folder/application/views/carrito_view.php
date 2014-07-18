<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-md-10 col-md-offset-1" >

<h2>Mi Carrito de Compras</h2>

<br>

<table class="table table-striped table-responsive">
<thead>
<tr>
  <th class="text-center">Título</th>
  <th class="text-center">Precio</th>
  <th class="text-center">Cantidad</th>
  <th class="text-center">Sub-Total</th>
  <th></th>
</tr>
</thead>

<tbody>
<?foreach($this->cart->contents() as $items):?>
	<tr>
	  <td><?=$items['name']?></td>
	  <td class="text-right">$<?=$this->cart->format_number($items['price'])?></td>
 	  <td class="text-center"><?=$items['qty']?></td>
	  <td class="text-right">$<?=$this->cart->format_number($items['subtotal'])?></td>
	  <td class="text-right">
	  	<button type="button" class="btn btn-warning btn-modificar" data-nombre="<?=$items['name']?>" data-qty="<?=$items['qty']?>"  data-rowid="<?=$items['rowid']?>" data-id="<?=$items['id']?>">
	      <span class="glyphicon glyphicon-edit"></span>
	    </button>
		  <button type="button" class="btn btn-danger btn-eliminar" data-nombre="<?=$items['name']?>" data-rowid="<?=$items['rowid']?>">
	      <span class="glyphicon glyphicon-remove"></span>
	    </button>
	  </td>
	</tr>
<?endforeach?>
</tbody>

<tr>
  <td></td>
  <td></td>
  <td></td>
  <td class="text-right success"><strong>Total: </strong>$<?=$this->cart->format_number($this->cart->total())?></td>
	<td></td>
</tr>

</table>
</div>
</div>

<div class="row">
	<div class="col-xs-6 col-md-offset-3 text-center">
		<a id="btn-comprar" class="btn btn-lg btn-success">Comprar</a>
		<a href="<?=site_url('carrito/vaciar')?>" class="btn btn-lg btn-warning">Vaciar</a>
	</div>
</div>

</div>

<!-- --- Dialogo --- -->
<div id="dialogo" class="modal">
<?=form_open('',array('id'=>'form-dialogo'))?>
<div class="modal-dialog">
  <div class="modal-content">
    
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">{Título}</h4>
    </div>
    
    <div class="modal-body">{Contenido}</div>
    
    <div class="modal-footer">
      <button id="btn-cancelar" type="button" class="btn btn-default" data-dismiss="modal">{Cancelar}</button>
      <button id="btn-aceptar" type="submit" class="btn btn-primary">{Aceptar}</button>
    </div>
    
  </div>
</div>
<?=form_close()?>
</div>
