<?php
//Busqueda exacta
if($_GET['lang'] == "es"){
$conexion = sqlite_open('../db/traductor.db');
$consulta = "SELECT * FROM espanolaleman WHERE espanol='".$_POST['termino']."' LIMIT 1";
$resultado = sqlite_query($conexion,$consulta);

while($fila = sqlite_fetch_array($resultado)){
	
	echo ' <div class="resultado">
            <div class="izquierda">
            	'.$fila['espanol'].'
            </div>
            <div class="derecha">
            	'.$fila['aleman'].'
            </div>
        </div>';
	
		}
sqlite_close($conexion);
//Busqueda aproximada

$conexion = sqlite_open('../db/traductor.db');
$consulta = "SELECT * FROM espanolaleman WHERE espanol LIKE '%".$_POST['termino']."%' LIMIT 5";
$resultado = sqlite_query($conexion,$consulta);

while($fila = sqlite_fetch_array($resultado)){
	echo ' <div class="resultado">
            <div class="izquierda">
            	'.$fila['espanol'].'
            </div>
            <div class="derecha">
            	'.$fila['aleman'].'
            </div>
        </div>';
	}
sqlite_close($conexion);
}
?>