<!DOCTYPE html>

<html id="main_theme">
   
	<head>
        
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/style.css" />
		<?= $_styles ?><!--cargamos los css-->
		<?= $_scripts ?><!--cargamos los js-->
		<title><?= $title ?></title>

	</head>
   
	<body>
    
		<div id="wrapper">
			
			<header id="header">
				<?= $header ?>
				&nbsp;
			</header>
			
			<nav id="nav">
				<a href="#">Inicio</a> |
				<a href="#">Catalogo</a> |
				<a href="#">Preguntas Frecuentes</a> |
				<a href="#">Ayuda</a>
				&nbsp;
			</nav><br><br><br><br><br>
			
         
			<div id="main2">
				<div id="content">
					<h2><?= $title ?></h2>
					<div class="post">
						<?= $content ?>
					</div>
				</div>
         
				<div id="sidebar">
					<?= $sidebar ?>
				</div>
			</div>
    
			<footer id="footer">
				<?= $footer ?>
			</footer>
      
		</div>
	
	</body>

</html>
