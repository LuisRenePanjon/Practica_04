<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<table>
			<tr>
				<th>Cedula</th> 
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Dirección</th>
				<th>Teléfono</th>
				<th>Correo</th>
				<th>Fecha Nacimiento</th>
				<th>Eliminar</th>
				<th>Modificar</th>
				<th>Cambiar Contraseña</th>
			</tr>

			<?php
				include '../../../../config/conexionBD.php';

				$sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N' AND usu_rol = 'user'";
				$result = $conn -> query($sql);

				if ($result -> num_rows > 0) {
					while ($row = $result -> fetch_assoc()) {
							echo "<tr>";
							echo "<td>".$row["usu_cedula"]."</td>";
							echo "<td>".$row["usu_nombres"]."</td>";
							echo "<td>".$row["usu_apellidos"]."</td>";
							echo "<td>".$row["usu_direccion"]."</td>";
							echo "<td>".$row["usu_telefono"]."</td>";
							echo "<td>".$row["usu_correo"]."</td>";
							echo "<td>".$row["usu_fecha_nacimiento"]."</td>";
							echo "<td><a href='../controladores/eliminar.php?codigo=".$row["usu_codigo"]."'>Eliminar</a></td>";
							echo "<td><a href='modificar_usuario.php?codigo=".$row["usu_codigo"]."'>Modificar</a></td>";
							echo "<td><a href='contrasena.php?codigo=".$row["usu_codigo"]."'>Cambiar</a></td>";
							echo "</tr>";
					}
				}
			?>
	</body>
</html>
