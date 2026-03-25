<?php
	
	include_once('../model/conn.php');
	include_once('../model/mainModel.php');

	if (isset($_POST['novo'])) {
		
		header('location:../view/cadastroPresente.php');
	}

?>