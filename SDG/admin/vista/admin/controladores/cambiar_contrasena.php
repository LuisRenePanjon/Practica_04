<?php
	include '../../../../config/conexionBD.php';

	$codigo = $_POST["cod"];
	date_default_timezone_set("America/Guayaquil");
	$fecha = date('Y-m-d H:i:s', time());
	
	$actual = isset($_POST["act"]) ? trim($_POST["act"]) : null;
	$nueva = isset($_POST["new"]) ? trim($_POST["new"]) : null;
	$confirmar = isset($_POST["rep"]) ? trim($_POST["rep"]) : null;

	$sql = "SELECT * FROM usuario WHERE usu_codigo = '$codigo' and usu_password = MD5('$actual')";
	$result = $conn -> query($sql);

	if ($result -> num_rows > 0) {
		$row = $result -> fetch_assoc();
		if ($nueva == $confirmar) {
			$sql = "UPDATE usuario SET usu_password = MD5('$nueva'), usu_fecha_modificacion='$fecha' WHERE usu_codigo = '$codigo'";
			if ($conn -> query($sql) === TRUE) {
				echo "Se ha cambiado la contraseña correctamente";
			} else {
				echo "ha ocurrido un error ):";
			}
		} else {
			echo "Las contraseñas no coinciden";
		}
	} else {
		echo "Contraseña incorrecta!";
	}
	echo "<br><a href='../vista/index.php'>Regresar</a>";
?>