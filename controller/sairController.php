<?php

	if (isset($_GET['sair'])) {
		
		session_unset();
		session_destroy();

		header("location:../view/index.php");
		exit;

	} elseif (!isset($_SESSION['idUsuarioAdm'])) {

		header("location:../view/index.php");
		exit;
	} 
?>