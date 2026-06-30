<?php
include_once('../model/detalhePresenteModel.php');
include_once('../model/getAuxModel.php');

session_start();

$idPresente = $_GET['id'];

$presente = getPresenteById($idPresente);

//echo $_SESSION['nome'] ;

foreach ($presente as $dado) {
	
	$_SESSION['linkPresente'] = $dado['linkPresente'];
	$_SESSION['idPresente'] = $dado['idPresente'];
}

if (empty($presente)) {
	
	header("location:../view/main.php");
}

?>