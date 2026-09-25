<?php

include_once('../model/mainModel.php');
include_once('../model/getAuxModel.php');

// session_start();

$dadosPresentes = getPresentes($dsPresente = null, $idComodo = null);

if (isset($_POST['novo'])) {

	header('location:../view/cadastroPresente.php');
}

if (isset($_POST['pesquisar'])) {

	$dsPresente = $_POST['dsPresente'] ?? null;
	$idComodo = $_POST['comodo'] ?? null ;

	$dadosPresentes = getPresentes($dsPresente, $idComodo);
}

if ( empty($dadosPresentes)) {
    echo "
        <script>
            alert('Nenhum Presente Encontrado!');
        </script>
    ";
}

?>