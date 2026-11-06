<?php

include_once('../model/usuarioDetalheModel.php');
include_once('../model/getAuxModel.php');

session_start();



if (isset($_POST['verPresente'])) {

    $nome = trim($_POST['nomeUsuario'] ?? $_SESSION['nome']);
    $email = trim($_POST['email'] ?? $_SESSION['email']);

    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;

    $link = trim($_SESSION['linkPresente'] ?? '');

    if (!preg_match('/^https?:\/\//i', $link)) {
        $link = 'https://' . $link;
    }
    
    echo "<script>
            alert('Confirme o presente pelo seu E-mail!');
        </script>";

    echo '<script>
        window.open(' . json_encode($link) . ', "_blank");
    </script>';
    
    $reserva = reservaPresente($nome, $email);
}


?>