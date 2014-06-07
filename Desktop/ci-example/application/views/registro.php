<div class="container">
<div class="row">
<article class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
<form method="post" action="<?=$reg_form_action?>" role="form">
	<fieldset>
		<!-- Sección de datos de cuenta -->
		<legend><?=lang('reg_cuenta_legend')?></legend>
		
		<div class="form-group <?if(form_error('reg_usuario')) echo'has-error'?>">
		<label class="control-label" for="reg_usuario"><?=lang('reg_usuario_label')?> </label>
		<input name="reg_usuario" type="text" id="reg_usuario"
			placeholder="<?=lang('reg_usuario_placeholder')?>"
			value="<?=set_value('reg_usuario')?>" class="form-control">
			<?=form_error('reg_usuario','<div class="alert alert-danger">','</div>')?>
		</div>
		<div class="form-group <?if(form_error('reg_email')) echo'has-error'?>">
		<label class="control-label" for="reg_email"><?=lang('reg_email_label')?> </label>
		<input name="reg_email" type="email" id="reg_email"
			placeholder="<?=lang('reg_email_placeholder')?>"
			value="<?=set_value('reg_email')?>" class="form-control">
			<?=form_error('reg_email','<div class="alert alert-danger">','</div>')?>	
		</div>
		<div class="form-group <?if(form_error('reg_clave')) echo'has-error'?>">
		<label class="control-label" for="reg_clave"><?=lang('reg_clave_label')?> </label>
		<input name="reg_clave" type="password" id="reg_clave"
			placeholder="<?=lang('reg_clave_placeholder')?>" class="form-control">
			<?=form_error('reg_clave','<div class="alert alert-danger">','</div>')?>
		</div>
		<div class="form-group <?if(form_error('reg_confirm')) echo'has-error'?>">
		<label class="control-label" for="reg_confirm"><?=lang('reg_confirm_label')?> </label>
		<input name="reg_confirm" type="password" id="reg_confirm"
			placeholder="<?=lang('reg_confirm_placeholder')?>" class="form-control">
			<?=form_error('reg_confirm','<div class="alert alert-danger">','</div>')?>
		</div>
	</fieldset>
	
	<fieldset>
		<!-- Sección de datos personales -->
		<legend><?=lang('reg_personales_legend')?></legend>
		
		<div class="form-group <?if(form_error('reg_dni')) echo'has-error'?>">
		<label class="control-label" for="reg_dni"><?=lang('reg_dni_label')?> </label>
		<input name="reg_dni" type="text" id="reg_dni"
			placeholder="<?=lang('reg_dni_placeholder')?>"
			value="<?=set_value('reg_dni')?>" class="form-control">
			<?=form_error('reg_dni','<div class="alert alert-danger">','</div>')?>
		</div>
		<div class="form-group <?if(form_error('reg_nombre')) echo'has-error'?>">
		<label for="reg_nombre"><?=lang('reg_nombre_label')?> </label>
		<input name="reg_nombre" type="text" id="reg_nombre"
			placeholder="<?=lang('reg_nombre_placeholder')?>"
			value="<?=set_value('reg_nombre')?>" class="form-control">
		<?=form_error('reg_nombre','<div class="alert alert-danger">','</div>')?>
		</div>
		<div class="form-group <?if(form_error('reg_apellido')) echo'has-error'?>">
		<label for="reg_apellido"><?=lang('reg_apellido_label')?> </label>
		<input name="reg_apellido" type="text" id="reg_apellido"
			placeholder="<?=lang('reg_apellido_placeholder')?>"
			value="<?=set_value('reg_apellido')?>" class="form-control">
		<?=form_error('reg_apellido','<div class="alert alert-danger">','</div>')?>
		</div>
		<div class="form-group <?if(form_error('reg_telefono')) echo'has-error'?>">
		<label for="reg_telefono"><?=lang('reg_telefono_label')?> </label>
		<input name="reg_telefono" type="text" id="reg_telefono"
			placeholder="<?=lang('reg_telefono_placeholder')?>"
			value="<?=set_value('reg_telefono')?>" class="form-control">
			<?=form_error('reg_telefono','<div class="alert alert-danger">','</div>')?>
		</div>
	</fieldset>
	<fieldset>
		<!-- Sección de datos de envío -->
		<legend><?=lang('reg_direccion_legend')?></legend>
		
		<div class="row">
			<div class="col-xs-8">
			<div class="row">
			<!-- Selector de Provincia -->
			<div class="form-group <?if(form_error('reg_provincia')) echo'has-error'?>">
			<label for="reg_provincia"><?=lang('reg_provincia_label')?> </label>
			<select id="reg_provincia" name="reg_provincia" class="form-control">
				<option value="-1" selected="selected">--------------</option>
			<?foreach($provincias as $provincia):?>
				<option value="<?=$provincia->id?>" <?=set_select('reg_provincia',$provincia->id)?>><?=$provincia->nombre?></option>
			<?endforeach;?>
			</select>
			<?=form_error('reg_provincia','<p class="alert alert-danger">','</p>')?>
			</div>
			
			<!-- Selector de Ciudad -->
			<!-- Se actualiza dinamicamente con la seleccion de provincia -->
			<input type="hidden" value="<?=$this->input->post('reg_ciudad_temporal')?>" id="reg_ciudad_temporal" name="reg_ciudad_temporal" >
			<div class="form-group <?if(form_error('reg_ciudad')) echo'has-error'?>">
			<label for="reg_ciudad"><?=lang('reg_ciudad_label')?></label>
			<select id="reg_ciudad" name="reg_ciudad" class="form-control">
				<option value="-1" selected="selected">--------------</option>
			</select>
			<?=form_error('reg_ciudad','<p class="alert alert-danger">','</p>')?>
			</div>
			
			<!-- Datos de dirección -->
			<div class="form-group <?if(form_error('reg_calle')) echo'has-error'?>">
				<div class="col-xs-2">
					<label class="control-label" for="reg_calle"><?=lang('reg_calle_label')?></label>
				</div>
				<div class="col-xs-10">
					<input class="form-control input-sm" name="reg_calle" type="text" id="reg_calle"
						placeholder="<?=lang('reg_calle_placeholder')?>"
						value="<?=set_value('reg_calle')?>">
				</div>
				<?=form_error('reg_calle','<p class="alert alert-danger">','</p>')?>
			</div>
			</div>
			</div>
			
			<div class="col-xs-4">
			<div class="row">
			<div class="form-group <?if(form_error('reg_numero')) echo'has-error'?>">
				<div class="col-xs-5">
					<label class="control-label" for="reg_numero"><?=lang('reg_numero_label')?> </label>
				</div>
				<div class="col-xs-7" style="margin-bottom: 15px;">
					<input class="form-control input-sm" name="reg_numero" type="number" id="reg_numero"
						placeholder="<?=lang('reg_numero_placeholder')?>"
						value="<?=set_value('reg_numero')?>">
				</div>
				<?=form_error('reg_numero','<p class="alert alert-danger">','</p>')?>
			</div>
		</div>
		<div class="row">
			<div class="form-group <?if(form_error('reg_piso')) echo'has-error'?>">
				<div class="col-xs-5">
					<label class="control-label" for="reg_piso"><?=lang('reg_piso_label')?> </label>
				</div>
				<div class="col-xs-7" style="margin-bottom: 15px;">
					<input class="form-control input-sm" name="reg_piso" type="number" id="reg_piso" size="1"
						placeholder="<?=lang('reg_piso_placeholder')?>"
						value="<?=set_value('reg_piso')?>">
				</div>
				<?=form_error('reg_piso','<p class="alert alert-danger">','</p>')?>
			</div>
			<div class="form-group <?if(form_error('reg_depto')) echo'has-error'?>">
				<div class="col-xs-7">
					<label class="control-label" for="reg_depto"><?=lang('reg_depto_label')?> </label>
				</div>
				<div class="col-xs-5" style="margin-bottom: 15px;">
					<input class="form-control input-sm" name="reg_depto" type="text" id="reg_depto" size="2"
						placeholder="<?=lang('reg_depto_placeholder')?>"
						value="<?=set_value('reg_depto')?>">
				</div>
				<?=form_error('reg_depto','<p class="alert alert-danger">','</p>')?>
			</div>
			</div>
			</div>
		</div>	
	</fieldset>
	<p><?=lang('reg_aclaraciones')?></p>
	<button type="submit">
		<?=lang('reg_submit')?>
	</button>
	<button type="reset">
		<?=lang('reg_reset')?>
	</button>
</form>
</article>
</div>
</div>
