<?php

include_once('conn.php');

function getPresentes($dsPresente = null, $idComodo = null){

	global $pdo;

	// $sqlUpdate = "UPDATE presentes
	// SET status = 'D',
	// reservadoAte = NULL
	// WHERE status = 'R'
	// AND reservadoAte <= NOW()";

	// $pdo->exec($sqlUpdate);

	
	
	$sql = "SELECT
	presentes.*,
	
	reservado.idPresente AS ID_Presente_Reservado,
    reservado.idUsuario AS ID_Usuario,

    usuarios.nomeUsuario AS NM_Usuario

	FROM presentes

	LEFT JOIN reservado
	ON reservado.idPresente = presentes.idPresente

	LEFT JOIN usuarios
	ON usuarios.idUsuario = reservado.idUsuario

	WHERE 1=1";

	$params = [];

	if ($dsPresente !== null && $dsPresente !== '') {
		$sql .= " AND presentes.dsPresente LIKE :dsPresente";
		$params[':dsPresente'] = "%$dsPresente%";
	}

	if ($idComodo !== null && $idComodo !== '') {
		$sql .= " AND presentes.idComodo = :idComodo";
		$params[':idComodo'] = (int)$idComodo;
	}

	$sql .= " ORDER BY presentes.dsPresente";

	$stmt = $pdo->prepare($sql);
	$stmt->execute($params);

	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>