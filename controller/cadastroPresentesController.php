<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once('../model/cadastroPresenteModel.php');
include_once('../model/getAuxModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$dsPresente = $_POST['dsPresente'];
	$linkPresente = $_POST['linkPresente'];
	$comodo = $_POST['comodo'];
	$valorPresente = $_POST['valorPresente'];
	$idEvento = $_SESSION['idEvento'];
	$imgNome = null;

	if (isset($_FILES['imgPresente']) && $_FILES['imgPresente']['error'] == 0) {

		$ext = pathinfo($_FILES['imgPresente']['name'], PATHINFO_EXTENSION);

// força minúsculo
		$ext = strtolower($ext);

		$extensoesPermitidas = ['jpg', 'jpeg', 'png', 'webp'];

		if (!in_array($ext, $extensoesPermitidas)) {
			die("Formato inválido!");
		}

		$imgNome = uniqid() . "." . $ext;

		move_uploaded_file(
			$_FILES['imgPresente']['tmp_name'],
			"../images/" . $imgNome
		);
	}

	$inserir = incluirPresentes($dsPresente, $linkPresente, $comodo, $imgNome, $valorPresente, 	$idEvento );

	if ($inserir) {

		echo "
		<script>
		alert('Presente incluído com sucesso!');
		window.location.href = '../view/main.php';
		</script>
		";

	} else {
		echo "<script>alert('Erro ao cadastrar presente!');</script>";
	}
}
?>