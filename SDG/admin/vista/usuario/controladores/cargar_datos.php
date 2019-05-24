<?php
	include '../../../../config/conexionBD.php';

	$codigo = $_POST["cod"];
	date_default_timezone_set("America/Guayaquil");
	$fecha = date('Y-m-d H:i:s', time());

	$cedula = isset($_POST["ced"]) ? trim($_POST["ced"]) : null;
	$nombres = isset($_POST["nom"]) ? mb_strtoupper(trim($_POST["nom"]), 'utf-8') : null;
	$apellidos = isset($_POST["ape"]) ? mb_strtoupper(trim($_POST["ape"]), 'utf-8') : null;
	$direccion = isset($_POST["dir"]) ? mb_strtoupper(trim($_POST["dir"]), 'utf-8') : null;
	$telefono = isset($_POST["tel"]) ? trim($_POST["tel"]) : null;
	$fNacimiento = isset($_POST["fec"]) ? trim($_POST["fec"]) : null;

	$sql = "UPDATE usuario SET usu_nombres='$nombres',usu_apellidos='$apellidos',usu_cedula='$cedula',usu_direccion='$direccion',usu_telefono='$telefono',usu_fecha_nacimiento='$fNacimiento', usu_fecha_modificacion='$fecha'  WHERE usu_codigo = '$codigo'";

	if ($conn -> query($sql) === TRUE) {
		echo "Se han modificado los datos correctamente";
	} else {
		echo "ha ocurrido un error ):";
	}
	echo "<br><a href='../vista/index.php'>Regresar</a>";
?>