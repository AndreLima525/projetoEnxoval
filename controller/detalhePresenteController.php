<?php
include_once('../model/detalhePresenteModel.php');
include_once('../model/getAuxModel.php');

session_start();

$idPresente = $_GET['id'];

$presente = getPresenteById($idPresente);

$dadoPresente = $presente[0];
	
$_SESSION['linkPresente'] = $presente[0]['linkPresente'];
$_SESSION['idPresente'] = $presente[0]['idPresente'];



if (empty($presente)) {
	
	header("location:../view/main.php");
}

?>