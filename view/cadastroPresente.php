<?php require_once('../controller/cadastroPresentesController.php') ?>


	<link rel="stylesheet" type="text/css" href="../styles/styleNovoPresente.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

	<div class="card">
		<form class="form-grid" method="POST">
			<div class="form-group">
				<label>Descrição do Presente</label>
				<input type="text" name="dsPresente">
			</div>

			<div class="form-group">
				<label>Link</label>
				<input type="text" name="linkPresente">
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
			<div class="form-group">
				<label>Imagem do Presente</label>
				<input type="file" name="imgPresente">
			</div>

			<div class="form-group">
				<label>Valor</label>
				<input type="text" name="valorPresente" placeholder="R$ 0,00">
			</div>

			<div class="form-actions">

				<button class="btn-fechar" class="fechar" >
					<i class="fa-solid fa-xmark"></i> </i> Fechar
				</button> &nbsp;&nbsp;

				<button type="submit" class="btn btn-secondary" name="cadastrar">
					<i class="fa-solid fa-plus"> </i> Cadastrar Presente
				</button>

				
			</div>
		</form>
	</div>
