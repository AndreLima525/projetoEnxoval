<?php require_once('../controller/mainController.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tela Principal</title>
	<link rel="stylesheet" type="text/css" href="../styles/styleMain.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
	<div class="page-header">
		<h2>
			Lista de Produtos
		</h2>
	</div>


	<div class="card-pesquisa">


		<form class="form-grid" method="POST">

			<div class="form-group">
				<label>Descrição do Presente</label>
				<input type="text" name="dsProduto">
			</div>

			<div class="form-group">
				<label>Cômodo</label>

				<select name="categoria">
					<option value="" disabled selected> -- Selecione -- </option>



				</select>

			</div>

			<div class="form-actions">
				<button type="submit" class="btn btn-secondary" name="pesquisar">
					<i class="fa-solid fa-magnifying-glass"></i> Pesquisar
				</button> &nbsp;
				<button type="submit" class="btn btn-secondary" name="novo">
					<i class="fa-solid fa-plus"></i></i> Incluir Presente
				</button>
			</div>
			
		</form>

	</div>
	<div class="card-presentes">

	<div class="presente-item">
		<img src="../images/fotoCasal.jpeg">
		<p>Jogo de Panelas</p>
		<a href="" class="btn-presentear">
			<i class="fa-solid fa-gift"></i> Presentear
		</a>
	</div>

	<div class="presente-item">
		<img src="../images/fotoCasal.jpeg">
		<p>Liquidificador</p>
		<a href="" class="btn-presentear">
			<i class="fa-solid fa-gift"></i> Presentear
		</a>
	</div>

	<div class="presente-item">
		<img src="../images/fotoCasal.jpeg">
		<p>Toalhas</p>
		<a href="" class="btn-presentear">
			<i class="fa-solid fa-gift"></i> Presentear
		</a>
	</div>

</div>
</body>
</html>