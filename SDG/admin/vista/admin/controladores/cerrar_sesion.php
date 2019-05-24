<?php
	session_start();
	$_SESSION['isLogged'] = FALSE;
	$_SESSION['rol'] = '';
	$_SESSION['codigo'] = '';
	session_destroy();
	header("Location: 55/public/vista/login.html");
?>