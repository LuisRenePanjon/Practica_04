<?php
	session_start();
	if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE)
		header("Location: /ProgramacionHipermedial/Practica_04/public/vista/login.html");

	if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 'admin')
		header("Location: /ProgramacionHipermedial/Practica_04/admin/vista/admin/vista/index.php");
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
								echo "<a href=''>".$row['usu_nombres']." ".$row['usu_apellidos']."</a>";
								echo "<img class='img' src='data:image/jpg;base64,".base64_encode($row["usu_imagen"])."'/>";
							}
						?>
						<ul>
							<li><a href="">Mi Cuenta</a></li>
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

		<section id="nuevo">
			<h1>Nuevo Mensaje</h1>

			<form method="POST" action="../controladores/nuevo.php">
				<table>
					<tr>
						<td colspan="2"><input type="submit" id="submit" name="submit" value="Enviar"></td>
					</tr>
					<tr>
						<th>Para: </th>
						<td><input type="text" class="btn_noborder" name="destinatario"></td>
					</tr>
					<tr>
						<th>Asunto: </th>
						<td><input type="text" class="btn_noborder" name="asunto"></td>
					</tr>
					<tr>
						<th>Mensaje: </th>
					</tr>
					<tr>
						<td colspan="2"><textarea id="mensaje" name="mensaje" rows="20"></textarea></td>
					</tr>
				</table>
			</form>
		</section>
	</body>
</html>