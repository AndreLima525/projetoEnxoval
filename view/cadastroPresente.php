<?php require_once('../controller/cadastroPresentesController.php'); ?>


<link rel="stylesheet" type="text/css" href="../styles/styleNovoPresente.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="card">
	<form class="form-grid" action="../controller/cadastroPresentesController.php"  method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label>Descrição do Presente</label>
			<input type="text" name="dsPresente" required>
		</div>

		<div class="form-group">
			<label>Link</label>
			<input type="text" name="linkPresente" required>
		</div>

		<div class="form-group">
			<label>Cômodo</label>

			<select name="comodo" required>

				<option value="" disabled selected> -- Selecione -- </option>

				<?php foreach ($resultComodos as $result ): ?>	
					<option value="<?= $result['idComodo']; ?>"> <?= $result['dsComodo']; ?></option>
				<?php endforeach;?>	

			</select>
		</div>
		<div class="form-group">
			<label>Imagem do Presente</label>
			<input type="file" name="imgPresente" required>
		</div>

		<div class="form-group">
			<label>Valor</label>
			<input type="text" name="valorPresente" placeholder="R$ 0,00" required>
		</div>

		<div class="form-actions">

			<button type="button" class="btn-fechar" id="fecharModal">
				<i class="fa-solid fa-xmark"></i> Fechar
			</button> &nbsp;&nbsp;

			<button type="submit" class="btn btn-secondary" name="cadastrar">
				<i class="fa-solid fa-plus"> </i> Cadastrar Presente
			</button>


		</div>
	</form>
</div>
