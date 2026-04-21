<?php require_once('../controller/detalhePresenteController.php'); ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detalhe Presente</title>
	<link rel="stylesheet" type="text/css" href="../styles/styleDetalhe.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

	<div class="card-presentes">
		<div class="card-detalhe">

			<?php foreach($presente as $dadosPresentes): ?>
				<img src="../images/<?= $dadosPresentes['imgPresente'] ?>" class="img-presente">

				<div class="info-presente">
					<h2><?= $dadosPresentes['dsPresente'] ?></h2>

					<p class="valor">
						<i class="fa-solid fa-tag"></i>
						R$ <?= number_format($dadosPresentes['valorPresente'], 2, ',', '.') ?>
					</p>

					<a href="https://<?= $dadosPresentes['linkPresente'] ?>" target="_blank" class="btn-comprar">
						<i class="fa-solid fa-gift"></i>
						Presentear
					</a>

					<a href="main.php"  class="btn-voltar">
						<i class="fa-solid fa-arrow-left"></i>
						Voltar à lista
					</a>
				</div>
			<?php endforeach; ?>

		</div>
	</div>

</body>
</html>