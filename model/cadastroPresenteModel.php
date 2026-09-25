<?php

include_once('conn.php');

function incluirPresentes($dsPresente, $linkPresente, $idComodo, $imgNome, $valorPresente, $idEvento) {

	global $pdo;



	$sql = "INSERT INTO presentes (
		dsPresente,
		linkPresente,
		idComodo,
		imgPresente,
		valorPresente,
		idEvento
		) VALUES (
		:dsPresente,
		:linkPresente,
		:idComodo,
		:imgPresente,
		:valorPresente,
		:idEvento
	)";

		$stmt = $pdo->prepare($sql);

		$stmt->execute([
			':dsPresente' => $dsPresente,
			':linkPresente' => $linkPresente,
			':idComodo' => $idComodo,
			':imgPresente' => $imgNome,
			':valorPresente' => $valorPresente,
			':idEvento' => $idEvento
		]);

		return true;
	}

?>