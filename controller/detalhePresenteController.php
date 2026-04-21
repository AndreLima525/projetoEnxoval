<?php
include_once('../model/detalhePresenteModel.php');
include_once('../model/getAuxModel.php');

$idPresente = $_GET['id'];

$presente = getPresenteById($idPresente);

if (empty($presente)) {
	
	header("location:../view/main.php");
}

?>