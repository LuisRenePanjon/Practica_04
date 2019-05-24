<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php

		include '../../../../config/conexionBD.php';
		$destinatario = $_GET['destinatario'];

		$sql = "SELECT * FROM correo, usuario WHERE usu_correo LIKE '%$destinatario%' AND cor_destinatario = usu_codigo ORDER BY cor_codigo DESC";
		$result = $conn -> query($sql);

		if ($result -> num_rows > 0) {
			while ($row = $result -> fetch_assoc()) {

				$sql2 = "SELECT * FROM usuario WHERE usu_codigo = ".$row["cor_remitente"];
				$result2 = $conn -> query($sql2);
				$row2 = $result2 -> fetch_assoc();

				$sql3 = "SELECT * FROM usuario WHERE usu_codigo = ".$row["cor_destinatario"];
				$result3 = $conn -> query($sql3);
				$row3 = $result3 -> fetch_assoc();

				echo "<div class='btn' onclick=\"openMessage('".$row["cor_mensaje"]."','".$row2["usu_nombres"]." ".$row2['usu_apellidos']."','".$row2['usu_correo']."','".$row3["usu_nombres"]." ".$row3['usu_apellidos']."','".$row3['usu_correo']."', '".$row["cor_fecha"]."')\">";
				echo "<table class='informacion'>";
				echo "<tr>";
				echo "<th colspan='2'>".$row["cor_asunto"]."</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>".$row2["usu_nombres"]." ".$row2['usu_apellidos']."</td>";
				echo "<td>".$row["cor_fecha"]."</td>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";

			}
		}
		?>
	</body>
</html>
