<?php

include_once('conn.php');

function incluirPresentes($dsPresente, $linkPresente, $idComodo, $imgNome, $valorPresente) {

	global $pdo;



	$sql = "INSERT INTO presentes (
		dsPresente,
		linkPresente,
		idComodo,
		imgPresente,
		valorPresente
		) VALUES (
		:dsPresente,
		:linkPresente,
		:idComodo,
		:imgPresente,
		:valorPresente
	)";

		$stmt = $pdo->prepare($sql);

		$stmt->execute([
			':dsPresente' => $dsPresente,
			':linkPresente' => $linkPresente,
			':idComodo' => $idComodo,
			':imgPresente' => $imgNome,
			':valorPresente' => $valorPresente
		]);

		return true;
	}

?>