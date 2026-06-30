<?php
include_once('conn.php');

function reservaPresente($nome,$email){

	$idPresente = $_SESSION['idPresente'];

	global $pdo;

	$sql = "SELECT * FROM presentes WHERE idPresente = '$idPresente';";

	$stmt = $pdo-> query($sql) or die("Falha na execção!"); 
	$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);;

	if (!empty($resultados)) {

		foreach($resultados as $resultado) {

			$idPresente = $resultado['idPresente'];
			$dsPresente = $resultado['dsPresente'];
			$valorPresente = $resultado['valorPresente'];
		}

	} else {

		echo "

		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL='../view/detalhePresente.php?id=$idPresente'>
		<script type=\"text/javascript\">
		alert(\"Algum erro ocorreu!\");
		</script>                           
		";

	}

	$para = $email;
	$assunto = 'Confirmação de presente';
	$mensagem = "Olá, $nome!\n\n";
	$mensagem .= "Obrigado pelo seu carinho!\n";
	$mensagem = 'Acesse o link para confirmar o seu presente: href="https://blue-woodpecker-158635.hostingersite.com/projetoEnxoval/view/confirmarPresente.php.';
	$cabecalhos = 'From: andre525luis@gmail.com' . "\r\n" .
	'Reply-To: andre525luis@gmail.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

	if (mail($para, $assunto, $mensagem, $cabecalhos)) {

		echo "<script>alert('E-mail enviado com sucesso!');</script>";
		//header("Refresh:0; url=../view/detalhePresente.php?id=$idPresente");
		exit;

	} else {

		echo "<script>alert('Erro ao enviar e-mail!');</script>";
		//header("Refresh:0; url=../view/detalhePresente.php?id=$idPresente");
		exit;

	}
}
?>