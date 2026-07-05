<?php

session_start();

include_once('../model/confirmaPresenteModel.php');

if (!isset($_SESSION['idPresente']) || empty($_GET['idPresente'])) {
	header("location:../view/main.php");
}

$email = $_GET['email'];
$idPresente = $_GET['idPresente'];

$confirma = confirmaPresente($email,$idPresente);


?>