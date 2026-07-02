<?php
require_once('../controller/confirmaPresenteController.php');
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styles/styleDetalhe.css">
	<title>Confirmar Presente</title>
</head>
<body>

	<div class="card-presentes"> 

		<div class="card-detalhe">

			<div class="info-presente">

				<center>
					<img src="../images/gift.png" width="150px">  <br> <br>
					<h2> Presente Confirmado! <?php echo $_SESSION['nomeUsuario'] ;?> </h2> <br>

					<a href="../view/main.php"  class="btn-voltar" id="fecharModal">
						<i class="fa-solid fa-arrow-left"></i>
						Voltar à lista
					</a>
				</center>
			</div>

		</div>

	</div>
	
</body>
</html>