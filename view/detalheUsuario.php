<?php


?>

<link rel="stylesheet" type="text/css" href="../styles/styleNovoUsuario.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<form method="POST">
	<label>Nome:</label>
	<input type="text" name="nomeUsuario">

	<label>E-mail:</label>
	<input type="email" name="email">

	<a href="https://<?= $dadosPresentes['linkPresente'] ?>" class="btn-comprar" class="btn-verProduto">
		
	</a>
</form>
