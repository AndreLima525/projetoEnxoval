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

					<!-- <a href="https://<?= $dadosPresentes['linkPresente'] ?>" target="_blank"> </a> -->
						<button  class="btn-comprar" id="comprar">
							<i class="fa-solid fa-gift"></i>
							Presentear
						</button>


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

<script>
const modal = document.getElementById("modalConfirmar");
const conteudo = document.getElementById("conteudoModal");


document.querySelectorAll(".btn-comprar").forEach(btn => {

    btn.addEventListener("click", function(e){

        e.preventDefault();

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
