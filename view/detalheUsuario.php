<?php


?>

<link rel="stylesheet" type="text/css" href="../styles/styleNovoUsuario.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="card">
	<form method="POST" class="form-grid">

		<h2 class="titulo-form">Informe seus Dados</h2>

		<div class="form-group full">
			<label>Nome:</label>
			<input type="text" name="nomeUsuario" required>
		</div>

		<div class="form-group full">
			<label>E-mail:</label>
			<input type="email" name="email" required>
		</div>

		 <!-- href="https://<?= $dadosPresentes['linkPresente'] ?>" -->

		<div class="form-actions">
			<button type="submit" class="btn btn-primary">
				<i class="fa-solid fa-cart-shopping"></i>
				Ver Produto
			</button>

			<button type="button" class="btn-fechar">
				
				Voltar à Lista
			</button>
		</div>

	</form>
</div>

