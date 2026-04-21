<?php
include_once('conn.php');

function getPresenteById($idPresente) {

	global $pdo;
	
	$sql = "SELECT * FROM presentes WHERE idPresente = :id AND status = 'D'";


	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(':id', (int)$idPresente, PDO::PARAM_INT);
	$stmt->execute();

	return $stmt->fetchAll(PDO::FETCH_ASSOC);

	
}
?>