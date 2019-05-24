<?php
	include '../../../../config/conexionBD.php';

	$codigo = $_GET['codigo'];
	$sql = "UPDATE usuario SET usu_eliminado = 'S' WHERE usu_codigo = '$codigo'";

	if ($conn -> query($sql) === TRUE) {
		echo "Se ha eliminado el usuario correctamente";
	} else {
		echo "ha ocurrido un error ):";
	}
	echo "<br><a href='../vista/index.php'>Regresar</a>";
?>