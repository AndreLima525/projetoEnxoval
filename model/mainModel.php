<?php

include_once('conn.php');

function getPresentes($dsPresente = null, $idComodo = null){

	global $pdo;
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