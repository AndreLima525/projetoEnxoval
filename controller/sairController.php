<?php

if (isset($_GET['sair'])) {
	
	session_unset();
	session_destroy();

	header("location:../view/index.php");
	exit;

} elseif (empty($_SESSION['idUsuarioAdm']) &&
	empty($_SESSION['nomeUsuarioAdm'])) {

	header("location:../view/index.php");
	exit;
} 
?>