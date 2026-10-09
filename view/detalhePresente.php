<?php require_once('../controller/detalhePresenteController.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detalhe Presente</title>
	<link rel="stylesheet" type="text/css" href="../styles/styleDetalhe.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
	<link rel="icon" type="image/jpeg" href="../images/logoAtomtech.jpeg">
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

					<!-- <a href="https://<?= $dadosPresentes['linkPresente'] ?>" target="_blank"> </a> -->

					<?php if (!isset($_SESSION['idUsuarioAdm'])):?>

						<button type="button"  class="btn-comprar" id="comprar">
							<i class="fa-solid fa-gift"></i>
							Presentear
						</button>

					<?php endif; ?>

					<?php if (isset($_SESSION['idUsuarioAdm'])):?>

						<button  title="Editar" class="btn-editar"

						data-id="<?= $dadoPresente['idPresente']; ?>"
						data-descricao="<?= $dadoPresente['dsPresente']; ?>"
						data-link="<?= $dadoPresente['linkPresente']; ?>"
						data-comodo="<?= $dadoPresente['idComodo']; ?>" 
						data-img="<?= htmlspecialchars($dadoPresente['imgPresente']); ?>"
						data-valor="<?= $dadoPresente['valorPresente']; ?>"
						id="editar">

						<i class="fa-solid fa-pen"></i>
						Editar Item
					</button>

				<?php endif; ?>



				<a href="main.php"  class="btn-voltar" id="fecharModal">
					<i class="fa-solid fa-arrow-left"></i>
					Voltar à lista
				</a>
			</div>
		<?php endforeach; ?>

	</div>
</div>


<div id="modalConfirmar" class="modal">
	<div class="modal-content">
		<span class="fechar">
		</span>
		<div id="conteudoModal"></div>
	</div>
</div>


</body>

<div id="modalEditar" class="modal">
	<div class="modal-content">
		<center><h3>Editar Presente</h3></center>

		<form action="../model/updatePresenteModel.php"
		method="POST"
		enctype="multipart/form-data">

		<input type="hidden" name="id" id="edit-id">

		<!-- LINHA INTEIRA -->
		<div class="form-group full">
			<label>Descrição</label>
			<input type="text" name="descricao" id="edit-descricao">
		</div>

		<!-- COLUNA 1 -->
		<div class="form-group">
			<label>Valor</label>
			<input type="text" name="valor" id="edit-valor">
		</div>

		<!-- COLUNA 2 -->
		<div class="form-group">
			<label>Cômodo</label>

			<select name="comodo" id="edit-comodo" required>
				<option value="" disabled>-- Selecione --</option>

				<?php foreach ($resultComodos as $result): ?>
					<option value="<?= $result['idComodo']; ?>">
						<?= $result['dsComodo']; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>

		<!-- LINHA INTEIRA -->
		<div class="form-group full">
			<label>Link do presente</label>
			<input
			type="text"
			name="link"
			id="edit-link"
			placeholder="https://..."
			>
		</div>

		<!-- LINHA INTEIRA -->
		<div class="form-group full">
			<label>Imagem do Presente</label>

			<img
			id="edit-preview"
			src=""
			style="display:none;"
			>

			<input
			type="file"
			name="imgPresente"
			id="edit-img"
			accept="image/*"
			>
		</div>

		<div class="form-actions">
			
			<button
			type="button"
			onclick="fecharModal()"
			class="btn btn-secondary">
			<i class="fa-solid fa-xmark"></i>
			Cancelar
		</button>

		
		<button
		type="submit"
		class="btn btn-primary">
		<i class="fa-solid fa-pen"></i>
		Salvar
	</button>
</div>

</form>
</div>
</div>

<script>
	const modalEditar = document.getElementById("modalEditar");

document.querySelectorAll(".btn-editar").forEach(btn => {

    btn.addEventListener("click", function() {

        document.getElementById("edit-id").value =
            this.dataset.id;

        document.getElementById("edit-descricao").value =
            this.dataset.descricao;

        document.getElementById("edit-valor").value =
            this.dataset.valor.replace('.', ',');

        document.getElementById("edit-link").value =
            this.dataset.link;

        document.getElementById("edit-comodo").value =
            this.dataset.comodo;

        // Mostrar imagem atual
        const preview = document.getElementById("edit-preview");

        if (this.dataset.img) {
            preview.src = "../images/" + this.dataset.img;
            preview.style.display = "block";
        } else {
            preview.src = "";
            preview.style.display = "none";
        }

        // ABRIR MODAL
        modalEditar.classList.add("ativo");
    });

});

function fecharModal() {
    modalEditar.classList.remove("ativo");
}

// Fechar clicando fora do modal
window.addEventListener("click", function(e) {

    if (e.target === modalEditar) {
        fecharModal();
    }

});
</script>

<script>
const modal = document.getElementById("modalConfirmar");
const conteudo = document.getElementById("conteudoModal");


document.querySelectorAll(".btn-comprar").forEach(btn => {

    btn.addEventListener("click", function(e){

        e.preventDefault();

        alert("Caso escolha esse presente, confirme por e-mail para garantir a reserva!");

        fetch("detalheUsuario.php")
        .then(res => res.text())
        .then(html => {

            conteudo.innerHTML = html;
            modal.classList.add("ativo");

        });

    });

});


// captura o formulário mesmo sendo carregado pelo fetch
document.addEventListener("submit", function(e){

    if(e.target.id === "formPresente"){

        e.preventDefault();

        const dados = new FormData(e.target);


        fetch("detalheUsuario.php", {
            method: "POST",
            body: dados
        })
        .then(res => res.text())
        .then(link => {

            link = link.trim();

            window.location.href = link;

        });

    }

});


// fechar modal
document.addEventListener("click", function(e){

    if(e.target.closest(".btn-fechar")){

        modal.classList.remove("ativo");
        conteudo.innerHTML = "";

    }

});
</script>
</html>
