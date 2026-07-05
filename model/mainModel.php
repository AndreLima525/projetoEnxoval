<?php

include_once('conn.php');

function getPresentes($dsPresente = null, $idComodo = null){

	global $pdo;

	$sqlUpdate = "UPDATE presentes
	SET status = 'D',
	reservadoAte = NULL
	WHERE status = 'R'
	AND reservadoAte <= NOW()";

	$pdo->exec($sqlUpdate);

	$params = [];
	
	$sql = "SELECT * FROM presentes WHERE 1=1";

	if ($dsPresente !== null && $dsPresente !== '') {
		$sql .= " AND dsPresente LIKE :dsPresente";
		$params[':dsPresente'] = "%$dsPresente%";
	}

	if ($idComodo !== null && $idComodo !== '') {
		$sql .= " AND idComodo = :idComodo";
		$params[':idComodo'] = (int)$idComodo;
	}

	$sql .= " ORDER BY dsPresente";

	$stmt = $pdo->prepare($sql);
	$stmt->execute($params);

	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>