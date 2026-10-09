<?php

include_once('conn.php');

function getEvento(){

	global $pdo;

	$sqlEvento = "SELECT * FROM infoevento WHERE stAtivo = 'S'";

	$stmt = $pdo->prepare($sqlEvento);
	$stmt->execute();

	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>