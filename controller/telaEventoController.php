<?php

session_start();

include_once('../model/telaEventoModel.php');
include_once('../model/getAuxModel.php');

$dadosEvento = getEvento();


foreach ($dadosEvento as $dado) {

	$idEvento = $dado['idEvento'];
	$nomeCasalH = $dado['nomeCasalH'];
	$nomeCasalM = $dado['nomeCasalM'];
	$imgEvento = $dado['imgEvento'];
	$nomeEvento = $dado['nomeEvento'];
	$nomeBebe = $dado['nomeBebe'];
	$tpEvento = $dado['tpEvento'];
	$dataEvento = $dado['dataEvento'];
	$idUsuarioAdm = $dado['idUsuarioAdm'];

}

?>