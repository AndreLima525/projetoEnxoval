<?php

include_once("../controller/telaEventoController.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página Inicial</title>
	<link rel="icon" type="image/jpeg" href="../images/logoAtomtech.jpeg">
	<link rel="stylesheet" type="text/css" href="../styles/styleTelaEvento.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
	<div class="main">
		<div class="card">
			

			<?php if($tpEvento == 'C'): ?>

				<div class="title">

					<h1> <?php echo($nomeCasalH); ?> e <?php echo($nomeCasalM); ?> </h1>

					<p class="sub"><?php echo($nomeEvento); ?> • Lista de Presentes</p>

				</div>

			<?php endif; ?>

			<?php if($tpEvento == 'B'): ?>

				<div class="title">

					<h1> <?php echo($nomeBebe); ?> </h1>

					<p class="sub"><?php echo($nomeEvento); ?> • Lista de Presentes</p>

				</div>

			<?php endif; ?>

			<?php if($tpEvento == 'E'): ?>

				<div class="title">

					<h1> 
						<?php if (!empty($nomeCasalH)) {
							
							 echo($nomeCasalH);
						} else {

							echo($nomeCasalM);
						} ?> s
					</h1>

					<p class="sub"><?php echo($nomeEvento); ?> • Lista de Presentes</p>

				</div>

			<?php endif; ?>

			
			<div class="img">
				<img src="../images/fotoCasal.jpeg">
			</div>
			<div class="form">
				<form method="POST">

					<a href="main.php" name="avancar">
						<span> Avançar  </span> 
						<i class="fa fa-arrow-right"></i>
					</a>
				</form>
			</div>
		</div>		
	</div>
</body>
</html>