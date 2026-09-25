<?php


include_once('../model/loginModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$usuarioLogin = $_POST['usuario'];
	$senhaLogin = $_POST['senha'];

	$dados = buscarLogin($usuarioLogin);

	if (!empty($dados)) {

		$idUsuario   = $dados['idUsuarioAdm'];
		$nome   = $dados['nomeUsuarioAdm'];
		$usuario = $dados['userLogin'];
		$senha   = $dados['senha'];
		$email  = $dados['email'];
		$ativo   = $dados['stAtivo'];

		if ($usuarioLogin == $usuario && password_verify($senhaLogin, $senha) && $ativo == 'S') {

			session_start();

			$evento = buscarEvento($idUsuario);

            if (!empty($evento)) {
                $idEvento = $evento['idEvento'];
            } else {
                $idEvento = null;
            }

			$_SESSION['idUsuarioAdm'] = $idUsuario;
			$_SESSION['nomeUsuarioAdm'] = $nome;
			$_SESSION['email'] = $email;
			$_SESSION['idEvento'] = $idEvento;

			header("location:main.php");
			
			
		} elseif ($ativo != 'S') {
			
			echo "<script>alert('Usuário sem permissão de acesso!');</script>";

		} elseif ($usuarioLogin != $usuario || $senhaLogin != $senha) {
			
			echo "<script>alert('Usuário ou senha incorretos!');</script>";

		} 
		
	} else {

		echo "<script>alert('Usuário ou senha incorretos!');</script>";
	}


}
?>