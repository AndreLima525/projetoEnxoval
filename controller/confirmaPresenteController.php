<?php

session_start();

include_once('../model/confirmaPresenteModel.php');

if (!isset($_SESSION['idPresente'])) {
	header("location:../view/main.php");
}

$email = $_GET['email'];
$idPresente = $_GET['idPresente'];

$confirma = confirmaPresente($email,$idPresente);


?>