<?php

include_once('../model/usuarioDetalheModel.php');
include_once('../model/getAuxModel.php');

session_start();

$link = 'https://'. $_SESSION['linkPresente'];

//echo $_SESSION['linkPresente'] ;

if (!isset($_SESSION['nome']) && !isset($_SESSION['email'])) {
	
	
} else {


}

?>