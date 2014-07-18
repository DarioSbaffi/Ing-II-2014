<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
 
<?foreach($css_files as $file):?>
    <link type="text/css" rel="stylesheet" href="<?=$file;?>" />
<?endforeach;?>

<?foreach($js_files as $file):?>
    <script src="<?=$file;?>"></script>
<?endforeach;?>
	<script src="http://cientocatorce.com.ar/assets/js/agregados.js"></script>
 
<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
</style>
</head>
<body>
	<nav>
		<a href='<?php echo site_url('administrar/libros')?>'>Libros</a> |
		<a href='<?php echo site_url('administrar/categorias')?>'>Categorias</a>
	</nav>
	<div style="height:20px;"></div>  
    <div>
        <?=$output;?>
    </div>
</body>
</html>
