<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Administracion Productos - Sourcezilla</title>
		<?php foreach($css_files as $file): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
		<?php endforeach; ?>
		<?php foreach($js_files as $file): ?>
			<script src="<?php echo $file; ?>"></script>
		<?php endforeach; ?>
		<style type='text/css'>
			body {font-family: Arial;font-size: 14px;}
			a {color: blue;text-decoration: none;font-size: 14px;}
			a:hover {text-decoration: underline;}
		</style>
	</head>

	<body>
		<h1>Administración de ABM</h1>
		<div>
			<a href='<?php echo site_url('abm/Usuarios')?>'>Usuario</a> |
			<a href='<?php echo site_url('abm/Libros')?>'>Libros</a> |
			<a href='<?php echo site_url('abm/Categorias')?>'>Categorias</a> |
			<a href='<?php echo site_url('abm/Editorial')?>'>Editorial</a> | 
			<a href='<?php echo site_url('abm/Autores')?>'>Autores</a> |		 
		</div>
		<div style='height:20px;'></div>  
		<div><?php echo $output; ?></div>
	</body>

</html>
