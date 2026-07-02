<?php

session_start();

include_once('../model/confirmaPresenteModel.php');



$email = $_GET['email'];
$idPresente = $_GET['idPresente'];

$confirma = confirmaPresente($email,$idPresente);


?>