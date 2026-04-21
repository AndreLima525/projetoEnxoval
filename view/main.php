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
			Lista de Presentes
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
				<button type="button" class="btn btn-secondary" id="btnNovo">
					<i class="fa-solid fa-plus"></i></i> Incluir Presente
				</button>
			</div>
			
		</form>

	</div>


	<div class="card-presentes">

		<?php 

		if(empty($dadosPresentes)) {

			echo "Nenhum registro encontrado!";
		}
		?>
		<?php foreach ($dadosPresentes as $dados ): ?>
			<div class="presente-item">

				<img src="../images/<?= $dados['imgPresente'] ?>">

				<p><?= $dados['dsPresente'] ?></p>

				<?php if ($dados['status'] == 'D'):?>

					<a href="detalhePresente.php?id=<?= $dados['idPresente'] ?>" class="btn-presentear">
						<i class="fa-solid fa-gift"></i> Presentear
					</a>

				<?php endif; ?>

				<?php if ($dados['status'] == 'R'):?>

					<a class="btn-reservado">
						<i class="fa-solid fa-circle-check"></i> Presenteado
					</a>

				<?php endif; ?>	

				<?php if ($dados['status'] == 'C'):?>

					<a class="btn-aguardando">
						<i class="fa-solid fa-clock"></i> Reservado
					</a>

				<?php endif; ?>	
			</div>
		<?php endforeach;?>
	</div>

	<div id="modalPresente" class="modal">
		<div class="modal-content">
			<span class="fechar">
			</span>
			<div id="conteudoModal"></div>
		</div>
	</div>
	<script>
		const modal = document.getElementById("modalPresente");
		const btn = document.getElementById("btnNovo");
		const conteudo = document.getElementById("conteudoModal");
		const fechar = document.querySelector(".fechar");

		btn.onclick = () => {
			fetch("cadastroPresente.php")
			.then(response => response.text())
			.then(html => {
				conteudo.innerHTML = html;
				modal.classList.add("ativo");
			})
			.catch(() => {
				conteudo.innerHTML = "<p>Erro ao carregar formulário</p>";
			});
		};

		document.addEventListener("click", function(e) {

			if (e.target.closest(".btn-fechar")) {
				modal.classList.remove("ativo");
				conteudo.innerHTML = "";
			}
		});

	</script>
</body>
</html>

