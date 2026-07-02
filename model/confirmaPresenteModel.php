<?php
include_once('conn.php');

function confirmaPresente($email,$idPresente){

	global $pdo;

	$sqlUsuario = "SELECT * FROM usuarios WHERE email = :email";
	$stmt = $pdo->prepare($sqlUsuario);
	$stmt->execute(['email' => $email]);
	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($resultado as $dado) {
		
		$idUsuario = $dado['idUsuario'];
		$nomeUsuario = $dado['nomeUsuario'];

	}

	if (!empty($resultado)) {

		$_SESSION['nomeUsuario'] = $nomeUsuario;

		$sqlPostReservado = "INSERT INTO reservado (

			idPresente,
			idUsuario,
			data

			) VALUES (

			:idPresente,
			:idUsuario,
			:data
		)";

			$stmt = $pdo->prepare($sqlPostReservado);

			$stmt->execute([

				':idPresente' => $idPresente,
				':idUsuario' => $idUsuario,
				':data' => date('Y-m-d')

			]);

			if ($stmt->rowCount() > 0) {

				$sqlUpdate = "UPDATE presentes
				SET status = :status
				WHERE idPresente = :idPresente";

				$stmt = $pdo->prepare($sqlUpdate);

				$stmt->execute([
					':status' => 'C',
					':idPresente' => $idPresente
				]);

			}

		}

	}
?>