<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modificar Usuario</title>
	</head>
	<body>
		<section>
			<?php
				include '../../../../config/conexionBD.php';
				$sql = "SELECT * FROM usuario WHERE ".$_GET['codigo']." = usuario.usu_codigo";
				$result = $conn -> query($sql);

				if ($result -> num_rows == 1) {
					$row = $result -> fetch_assoc();
					echo "<form method='POST' action='../controladores/cargar_datos.php'>";
					echo "<input type='hidden' name='cod' value='".$_GET['codigo']."'>";
					echo "<table>";
					echo "<tr>";
					echo "<td>Nombres</td>";
					echo "<td><input name='nom' value= '".$row['usu_nombres']."'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Apellidos</td>";
					echo "<td><input name='ape' value= '".$row['usu_apellidos']."'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Cédula</td>";
					echo "<td><input name='ced' value= '".$row['usu_cedula']."'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Dirección</td>";
					echo "<td><input name='dir' value= '".$row['usu_direccion']."'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Teléfono</td>";
					echo "<td><input name='tel' value= '".$row['usu_telefono']."'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Fecha de Nacimiento</td>";
					echo "<td><input name='fec' type='date' value= '".$row['usu_fecha_nacimiento']."'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td colspan='2'><input type='submit' id='modificar' value='Guardar Cambios'></td>";
					echo "</tr>";
					echo "</table>";
					echo "</form>";
				} else {
					echo "ha ocurrido un error ):";
				}
			?>
		</section>
	</body>
</html>