<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>slide demo</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		<style>
			#toggle {
			width: 100px;
			height: 100px;
			background: #ccc;
		}
		</style>
  
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	</head>

<body>
 
	<p>Click anywhere to toggle the box.</p>
	<div id="toggle"></div>
 
	<script>
		$( document ).click(function() {
		$( "#toggle" ).toggle( "slide" );
		});
	</script>
 
</body>

</html>
