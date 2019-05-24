<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modificar Usuario</title>
		<script type="text/javascript" src="../controladores/javascript.js"></script>
		<link rel="stylesheet" type="text/css" href="css/menu.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="css/modificar.css">
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
								echo "<a href=''>".$row['usu_nombres']." ".$row['usu_apellidos']."</a>";
								echo "<img class='img' src='data:image/jpg;base64,".base64_encode($row["usu_imagen"])."'/>";
							}
						?>
						<ul>
							<li><a href="modificar_usuario.php">Mi Cuenta</a></li>
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
				<li><a href="index.php">Buzón de Entrada</a></li>
				<li><a href="enviados.php">Mensajes Enviados</a></li>
				<li><a href="nuevo.php">Mensaje Nuevo</a></li>
			</ul>
		</nav>

		<section id="sec0">
			<?php
				include '../../../../config/conexionBD.php';
				$sql = "SELECT * FROM usuario WHERE ".$_SESSION['codigo']." = usuario.usu_codigo";
				$result = $conn -> query($sql);
				$row = $result -> fetch_assoc();

				echo "<a onclick='chooseFile()'><img src='data:image/jpg;base64,".base64_encode($row["usu_imagen"])."'/></a>";
				echo "<input type='file' id='file'>";
			?>
		</section>

		<section id="sec2">
			<div>
				<?php
					echo "<form method='POST' action='../controladores/cargar_datos.php'>";
					echo "<input type='hidden' name='cod' value='".$_SESSION['codigo']."'>";
					echo "<table>";
					echo "<tr>";
					echo "<td colspan='2'><input id='change' type='button' onclick='editar()' value='Cambiar datos'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Nombres</th>";
					echo "<td><input id='nom' name='nom' value= '".$row['usu_nombres']."' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Apellidos</th>";
					echo "<td><input id='ape' name='ape' value= '".$row['usu_apellidos']."' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Cédula</th>";
					echo "<td><input id='ced' name='ced' value= '".$row['usu_cedula']."' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Dirección</th>";
					echo "<td><input id='dir' name='dir' value= '".$row['usu_direccion']."' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Teléfono</th>";
					echo "<td><input id='tel' name='tel' value= '".$row['usu_telefono']."' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Fecha de Nacimiento</th>";
					echo "<td><input id='fec' name='fec' type='date' value= '".$row['usu_fecha_nacimiento']."' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td colspan='2'><input type='hidden' id='modificar' value='Guardar Cambios'>";
					echo "<input type='hidden' id='cancelar' value='Cancelar' onclick='cancelar()'></td>";
					echo "</tr>";
					echo "</table>";
					echo "</form>";
				?>
			</div>

			<br>
			<br>

			<div>
				<?php
					echo "<form method='POST' action='../controladores/cambiar_contrasena.php'>";
					echo "<input type='hidden' name='cod' value='".$_SESSION['codigo']."'>";
					echo "<table>";
					echo "<tr>";
					echo "<td>Contraseña actual:</td>";
					echo "<td><input type='password' name='act'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Nueva contraseña:</td>";
					echo "<td><input type='password' name='new'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Confirmar contraseña:</td>";
					echo "<td><input type='password' name='rep'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td colspan='2'><input id='change' type='submit' value='Cambiar Contraseña'></td>";
					echo "</tr>";
					echo "</table>";
					echo "</form>";
				?>
			</div>
		</section>
	</body>
</html>