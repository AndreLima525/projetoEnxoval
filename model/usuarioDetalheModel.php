<?php
include_once('conn.php');

function getPresentesUsuario($presente){

	global $pdo;
	
	$presente = $presente;
	
	$sql = "SELECT * FROM presentes WHERE idPresente = $presente";

	$sql .= " ORDER BY dsPresente";

	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>