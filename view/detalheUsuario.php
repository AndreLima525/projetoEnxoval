<?php
//require_once('../controller/detalheUsuarioController.php');
session_start();
?>

<link rel="stylesheet" type="text/css" href="../styles/styleNovoUsuario.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="card">
	<form method="POST" action="../controller/detalheUsuarioController.php" class="form-grid">

	<?php if (!isset($_SESSION['nome']) || !isset($_SESSION['email'])): ?>
		<h2 class="titulo-form">Informe seus Dados</h2>

		<div class="form-group full">
			<label>Nome:</label>
			<input type="text" name="nomeUsuario" required>
		</div>

		<div class="form-group full">
			<label>E-mail:</label>
			<input type="email" name="email" required>
		</div>

	<?php endif; ?>

	<center> <?php if (isset($_SESSION['nome'])) { echo $_SESSION['nome'];} ?> </center>
	
	<div class="form-actions">

		<button type="submit"  name="verPresente" class="btn btn-primary">
			<i class="fa-solid fa-cart-shopping"></i>
			Ver Presente
		</button>


		<button type="button" class="btn-fechar">
			Voltar
		</button>

	</div>

</form>
</div>

