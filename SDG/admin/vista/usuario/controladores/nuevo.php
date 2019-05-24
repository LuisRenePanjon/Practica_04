<?php
session_start();

include '../../../../config/conexionBD.php';

$sql = "SELECT usu_codigo FROM usuario WHERE usu_correo = '". trim($_POST['destinatario'])."';";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();

$remitente = $_SESSION['codigo'];
$destinatario = $row['usu_codigo'];
$asunto = isset($_POST['asunto']) ? trim($_POST['asunto']) : null;
$mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : null;

$sql = "INSERT INTO correo VALUES(0, CURRENT_TIMESTAMP, '$remitente', '$destinatario', '$asunto', '$mensaje')";

if ($conn -> query($sql) == TRUE) {
	echo "Tu mensaje ha sido enviado exitosamente!";
} else {
	echo "<p class = 'error'>Error: ".mysqli.error($conn)."<p/>";
}

echo "<a href='../vista/index.php'>Regresar</a>";

?>