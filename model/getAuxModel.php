<?php

include_once('conn.php');

function getComodos () {

	global $pdo;

	$sqlComodos = "SELECT * FROM comodos";
	$stmt = $pdo->prepare($sqlComodos);
	$stmt->execute();

	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$resultComodos = getComodos ();

?>