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

		<section id="sec1">

			<h1>Mensajes Enviados</h1>

			<form>
				<input type="text" id="destinatario" class="btn_noborder" name="destinatario" value="" placeholder="Buscar por correo" onkeyup="buscarPorDestinatario()">
			</form>
			<br>

			<div id="informacion">
				<?php
					$sql = "SELECT * FROM correo WHERE cor_remitente = ".$_SESSION['codigo']. " ORDER BY cor_codigo DESC";
					$result = $conn -> query($sql);

					if ($result -> num_rows > 0) {
						
						while ($row = $result -> fetch_assoc()) {

							$sql2 = "SELECT CONCAT(usu_nombres, ' ', usu_apellidos) AS res FROM usuario WHERE usu_codigo = ".$row["cor_destinatario"];
							$result2 = $conn -> query($sql2);
							$row2 = $result2 -> fetch_assoc();
								
							echo "<div class='btn' onclick=\"openMessage('".$row["cor_mensaje"]."','".$row2["res"]."', '".$row["cor_fecha"]."')\">";
							echo "<table class='informacion'>";
							echo "<tr>";
							echo "<th colspan='2'>".$row["cor_asunto"]."</th>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>".$row2['res']."</td>";
							echo "<td>".$row["cor_fecha"]."</td>";
							echo "</tr>";
							echo "</table>";
							echo "</div>";
						}

					} else {
						echo "<table class='informacion'>";
						echo "<tr>";
						echo "<th colspan=4>No tiene correos</th>";
						echo "</tr>";
						echo "</table>";
					}

					$conn -> close();
				?>
			</div>

		</section>

		<section id="sec2">
			<div id="from"></div>
			<div id="mensaje"></div>
		</section>
	</body>
</html>