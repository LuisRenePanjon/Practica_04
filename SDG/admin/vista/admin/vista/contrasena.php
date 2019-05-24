<?php
	session_start();
	if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE)
		header("Location: 55/public/vista/login.html");

	if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 'user')
		header("Location: 55/admin/vista/admin/vista/index.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cambiar Contraseña</title>
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

		<section id="cambiar">
			<?php
			echo "<form method='POST' action='../controladores/cambiar_contrasena.php'>";
			echo "<input type='hidden' name='cod' value='".$_GET['codigo']."'>";
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
			echo "<td colspan='2'><input class='btn2' type='submit' value='Cambiar'><a href='usuario.php'><input type='button' class='btn2' value='Cancelar'></a></td>";
			echo "</tr>";
			echo "</table>";
			echo "</form>";
			?>
		</section>
	</body>
</html>