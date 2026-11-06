<?php 
	// require_once('../controller/configEventoController.php'); 
require_once("../controller/telaEventoController.php");
require_once('../controller/protected.php');
?>


<link rel="stylesheet" type="text/css" href="../styles/styleNovoPresente.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="icon" type="image/jpeg" href="../images/logoAtomtech.jpeg">

<center> <h3>Configurações do Evento</h3> </center> <br> 

<form class="form-grid" action="../controller/configEvento.php"  method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label>Nome do Evento</label>
		<input type="text" name="dsPresente" value="<?php echo($nomeEvento); ?> " required>
	</div>

	<div class="form-group">
		<label>Data do Evento</label>
		<input
		type="date"
		name="linkPresente"
		value="<?php echo date('Y-m-d', strtotime($dataEvento)); ?>"
		required
		>
	</div>

	<div class="form-group">
		<label>Imagem do Evento</label>
		<input type="file" name="imgPresente" required>
	</div>

	<div class="form-actions">

		<button type="button" class="btn-fechar" id="fecharModal">
			<i class="fa-solid fa-xmark"></i> Fechar
		</button> &nbsp;&nbsp;

		<button type="submit" class="btn btn-secondary" name="cadastrar">
			<i class="fa-solid fa-pen"></i> Editar Evento
		</button>


	</div>

</form>
