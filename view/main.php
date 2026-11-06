<?php 
session_start();

include_once('../controller/mainController.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lista de Presentes</title>
	<link rel="stylesheet" type="text/css" href="../styles/styleMain.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
	<link rel="icon" type="image/jpeg" href="../images/logoAtomtech.jpeg">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@1.2.4/themes/blue/pace-theme-minimal.css">
	<script src="https://cdn.jsdelivr.net/npm/pace-js@1.2.4/pace.min.js"></script>
</head>
<body>
	


	<div class="card-pesquisa">



		<form class="form-pesquisa" method="POST">

			<div class="form-group">
				<label>Descrição do Presente</label>
				<input type="text" name="dsPresente">
			</div>

			<div class="form-group">
				<label>Cômodo</label>

				<select name="comodo">
					<option value="" disabled selected>
						-- TODOS --
					</option>

					<?php foreach ($resultComodos as $result): ?>
						<option value="<?= $result['idComodo']; ?>">
							<?= $result['dsComodo']; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="acoes-pesquisa">

				<button
				type="submit"
				class="btn btn-secondary"
				name="pesquisar">

				<i class="fa-solid fa-magnifying-glass"></i>
				Pesquisar
			</button>

			<?php if (
				!empty($_SESSION['idUsuarioAdm']) &&
				!empty($_SESSION['nomeUsuarioAdm'])
			): ?>

			<button
			type="button"
			class="btn btn-secondary"
			id="btnNovo">

			<i class="fa-solid fa-plus"></i>
			Incluir Presente
		</button>

		<button
		type="button"
		class="btn btn-secondary"
		id="btnConfig">

		<i class="fa-solid fa-gear"></i>
		Configurações
	</button>

	<a href="../controller/sairController.php" class="btn btn-exit">
		Sair <i class="fa-solid fa-right-from-bracket"></i>
	</a>

<?php endif; ?>

</form>

</div>



</form>

</div>

<div class="page-header">
	<h2>
		Lista de Presentes
	</h2>
</div>


<div class="card-presentes">

	<?php foreach ($dadosPresentes as $dados ): ?>
		<div class="presente-item">

			<img src="../images/<?= $dados['imgPresente'] ?>">

			<p><?= $dados['dsPresente'] ?></p>

			<?php if (isset($_SESSION['idUsuarioAdm'])):?>

				<?php if ($dados['status'] == 'D'):?>
					<a href="detalhePresente.php?id=<?=$dados['idPresente'] ?>" class="btn-presentear">
						<i class="fa-solid fa-gift"></i> &nbsp; Visualizar
					</a>
				<?php endif; ?>

				<?php if ($dados['status'] == 'R'):?>

					<a class="btn-aguardando" title="Reservado">
						<i class="fa-solid fa-clock"></i> &nbsp; Reservado
					</a>

				<?php endif; ?>

				<?php if ($dados['status'] == 'C'):?>

					<a class="btn-reservado" title="Presenteado">
						<i class="fa-solid fa-circle-check"></i> &nbsp; <?= $dados['NM_Usuario'] ?>
					</a>

				<?php endif; ?>	

			<?php endif; ?>

			<?php if ($dados['status'] == 'D' && !isset($_SESSION['idUsuarioAdm'])):?>

				<a href="detalhePresente.php?id=<?= $dados['idPresente'] ?>" class="btn-presentear">
					<i class="fa-solid fa-gift"></i> &nbsp; Presentear
				</a>

			<?php endif; ?>

			<?php if ($dados['status'] == 'C' && !isset($_SESSION['idUsuarioAdm'])):?>

				<a class="btn-reservado">
					<i class="fa-solid fa-circle-check"></i> &nbsp; Presenteado
				</a>

			<?php endif; ?>	

			<?php if ($dados['status'] == 'R' && !isset($_SESSION['idUsuarioAdm'])):?>

				<a class="btn-aguardando">
					<i class="fa-solid fa-clock"></i> &nbsp; Reservado
				</a>

			<?php endif; ?>	
		</div>
	<?php endforeach;?>
</div>


<div id="modalPresente" class="modal">
	<div class="modal-content">
		<span class="fechar">
		</span>
		<div id="conteudoModalPresente"></div>
	</div>
</div>

<div id="modalConfig" class="modal">
	<div class="modal-content">
		<span class="fechar">
		</span>
		<div id="conteudoModalConfig"></div>
	</div>
</div>

<script>
	
	const modalPresente = document.getElementById("modalPresente");
	const modalConfig = document.getElementById("modalConfig");

	const btnNovo = document.getElementById("btnNovo");
	const btnConfig = document.getElementById("btnConfig");

	const conteudoPresente = document.getElementById("conteudoModalPresente");
	const conteudoConfig = document.getElementById("conteudoModalConfig");

// Abrir modal de cadastro de presente
	if (btnNovo) {
		btnNovo.addEventListener("click", async () => {
			try {
				const response = await fetch("cadastroPresente.php");

				if (!response.ok) {
					throw new Error("Erro HTTP: " + response.status);
				}

				conteudoPresente.innerHTML = await response.text();
				modalPresente.classList.add("ativo");
			} catch (error) {
				conteudoPresente.innerHTML =
				"<p>Erro ao carregar formulário de presente.</p>";

				console.error(error);
			}
		});
	}

// Abrir modal de configurações
	if (btnConfig) {
		btnConfig.addEventListener("click", async () => {
			try {
				const response = await fetch("configEvento.php");

				if (!response.ok) {
					throw new Error("Erro HTTP: " + response.status);
				}

				conteudoConfig.innerHTML = await response.text();
				modalConfig.classList.add("ativo");
			} catch (error) {
				conteudoConfig.innerHTML =
				"<p>Erro ao carregar configurações.</p>";

				console.error(error);
			}
		});
	}

// Fechar o modal correspondente
	document.addEventListener("click", function (e) {
		if (e.target.closest(".btn-fechar")) {
			modalPresente.classList.remove("ativo");
			modalConfig.classList.remove("ativo");

			conteudoPresente.innerHTML = "";
			conteudoConfig.innerHTML = "";
		}
	});

</script>

</body>
</html>

