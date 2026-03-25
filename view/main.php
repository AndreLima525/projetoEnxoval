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
				<input type="text" name="dsPresente">
			</div>

			<div class="form-group">
				<label>Cômodo</label>

				<select name="comodo">

					<option value="" disabled selected> -- Selecione -- </option>

					<?php foreach ($resultComodos as $result ): ?>	
						<option value="<?= $result['idComodo']; ?>"> <?= $result['dsComodo']; ?></option>
					<?php endforeach;?>	

				</select>

			</div>

			<div class="form-actions">
				<button type="submit" class="btn btn-secondary" name="pesquisar">
					<i class="fa-solid fa-magnifying-glass"></i> Pesquisar
				</button> &nbsp;
				<button type="button" class="btn btn-secondary" class="btn-presentear" id="btnNovo">
					<i class="fa-solid fa-plus"></i></i> Incluir Presente
				</button>
			</div>
			
		</form>

	</div>
	<div class="card-presentes">

		<?php foreach ($dadosPresentes as $dados ): ?>
			<div class="presente-item">

				<img src="../images/fotoCasal.jpeg">

				<p><?= $dados['dsPresente'] ?></p>

				<?php if ($dados['status'] == 'D'):?>

					<a href="" class="btn-presentear">
						<i class="fa-solid fa-gift"></i> Presentear
					</a>

				<?php endif; ?>

				<?php if ($dados['status'] == 'R'):?>

					<button href="" class="btn-reservado" disabled>
						<i class="fa-solid fa-gift"></i> Reservado
					</button>

				<?php endif; ?>		
			</div>
		<?php endforeach;?>
	</div>

	<div id="modalPresente" class="modal">
		<div class="modal-content">			

			<div id="conteudoModal"></div> <!-- conteúdo vem aqui -->
		</div>
	</div>

	<script>
		const modal = document.getElementById("modalPresente");
		const btn = document.getElementById("btnNovo");
		const fechar = document.querySelector(".fechar");
		const conteudo = document.getElementById("conteudoModal");

		btn.onclick = () => {
			modal.style.display = "flex";

	// carrega a outra página
			fetch("cadastroPresente.php")
			.then(res => res.text())
			.then(html => {
				conteudo.innerHTML = html;
			});
		};

		fechar.onclick = () => {
			modal.style.display = "none";
	conteudo.innerHTML = ""; // limpa ao fechar
	};

	modal.addEventListener("click", (e) => {
		if (e.target === modal) {
			modal.style.display = "none";
			conteudo.innerHTML = "";
		}
	});
</script>
</body>
</html>

