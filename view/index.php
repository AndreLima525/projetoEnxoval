<?php
	require_once('../controller/loginController.php');
// $hash = password_hash('102030', PASSWORD_DEFAULT);
// echo $hash;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página Inicial</title>
	<link rel="icon" type="image/jpeg" href="../images/logoAtomtech.jpeg">
	<link rel="stylesheet" type="text/css" href="../styles/styleIndex.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
	<div class="container"> 
		
		<div class="card">

			<div class="logo">
				<center>
					<img src="../images/logoAtomtech.jpeg" width="120px">
				</center> 
			</div>

			<h1>Controle Enxoval</h1>

			<form method="POST">
				<label> Usuário </label>
				<input type="text" name="usuario" required>

				<label> Senha </label>
				<input type="password" name="senha" required>

				<button type="submit"> Entrar </button>

				<hr>
				<a href="esqueceuSenha.php" class="forgot"> Esqueceu sua senha? </a>
				<!-- <button id="btnInstalar" style="display:none;">
					📲 Instalar aplicativo
				</button> -->
			</form>

		</div>
	</body>
	</html>