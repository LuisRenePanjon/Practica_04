<?php
	session_start();
	if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
		header("Location: 55/public/vista/login.html");
	}

	if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 'user')
		header("Location: 55/admin/vista/admin/vista/index.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Gestión de usuarios</title>
		<script type="text/javascript" src="../controladores/javascript.js"></script>
		<link rel="stylesheet" type="text/css" href="css/menu.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	
	<body>

		<header>
			<nav class="header">
				<ul>
					<li>
						
						<?php
							include '../../../../config/conexionBD.php';
							$sql = "SELECT * FROM usuario WHERE usu_codigo = ".$_SESSION['codigo'];
							$result = $conn -> query($sql);
							while ($row = $result -> fetch_assoc()) {
								echo "<a>".$row['usu_nombres']." ".$row['usu_apellidos']."</a>";
								echo "<img class='img' src='data:image/jpg;base64,".base64_encode($row["usu_imagen"])."'/>";
							}
						?>
						<ul>
							<li><a href="../controladores/cerrar_sesion.php">Cerrar Sesión</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</header>
		
		<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
		<label for="openSidebarMenu" class="sidebarIconToggle">
			<div class="spinner diagonal part-1"></div>
			<div class="spinner horizontal"></div>
			<div class="spinner diagonal part-2"></div>
		</label>


		<nav id="sidebarMenu">
			<ul class="sidebarMenuInner">
				<li><a href="index.php">Correos</a></li>
				<li><a href="usuario.php">Usuarios</a></li>
			</ul>
		</nav>

		<section id="nuevo">
			<h1>Usuarios</h1>

			<form>
				<input type="text" id="cedula" name="cedula" value="" onkeyup="buscarPorCedula()">
			</form>
			<br>

			<table id="informacion">
				<tr>
					<th>Cedula</th> 
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Correo</th>
					<th>Nacimiento</th>
					<th>Eliminar</th>
					<th>Modificar</th>
					<th>Contraseña</th>
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
					} else {
						echo "<tr>";
						echo "<td colspan=7>No existen usuarios registrados en el sistema</td>";
						echo "</tr>";
					}

					$conn -> close();
				?>
				<br>
			</table>
		</section>
	</body>
</html>